<?php
namespace App\Http\Controllers;

use PDF;
use Image;
use QrCode;
use Session;

use App\Service;
use App\ServiceFile;
use App\Delivery;
use App\Customer;
use Carbon\Carbon;
use App\ServiceUploads;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
		public function __construct()
		{
				$this->middleware('auth', [
					'except'=>['upload_form', 'upload']
				]);
		}

		public function index()
		{
				return view('services.index', [
						'page_title' => 'Services',
						'breadcrumb' => 'services'
				]);
		}


		public function checkStatus(Request $request)
		{
			if($request->service_id){
				$service = Service::find($request->service_id);
				if(strtolower($service->service_status) == 'new' || strtolower($service->service_status) == 'in progress'){
					return $service;
				}
				return;
			}
		}

		public function detail(Service $service)
		{
			$service = Service::with('customer', 'images', 'files')->find($service)->first();

			// $qr_generate = base64_encode(QrCode::format('png')->size(200)->generate($url));

			// $service->qr_code = '<img class="img img-thumbnail img-responsive pull-left" src="data:image/png;base64,'.$qr_generate.'">';

			$pdf = PDF::loadView('services.detail', ['service'=>$service]);
			$pdf->setPaper('A4');
			return $pdf->stream(str_pad($service->receipt_no, 6, '0', STR_PAD_LEFT).'.pdf');

			// return view('services.detail', ['service'=>$service]);
		}

		public function upload_file(Request $request)
		{
			$now = Carbon::now();
			$service_path = public_path('images/services/'.$now->year.'/'.strtolower($now->format('F')));

			if ($request->hasFile('files')) {

				// $files = $request->file('files');

				foreach ( $request->file('files') as $file ) {
			
					$filename = $request->service_id.'_'.$file->getClientOriginalName();

					$extension = $file->clientExtension();

					$file->move($service_path.'/file/', $filename);

					$request['file_path'] = 'images/services/'.$now->year.'/'.strtolower($now->format('F')).'/file/'.$filename;
					$request['filename'] = $file->getClientOriginalName();

					$service_file = ServiceFile::create($request->all());

				}
			
			}

		}

		public function upload_form(Request $request)
		{


			if (!$request->hasValidSignature()) {
						abort(401);
				}
				

			$service = Service::find($request->service_id);
		 
			return view('services.upload', ['service' => $service]);
		}

		public function upload(Request $request)
		{


			$now = Carbon::now();
		 	$service_path = public_path('images/services/'.$now->year.'/'.strtolower($now->format('F')));

			if (!empty($request->images)){

				foreach ($request->images as  $image){
						
				 	$original_path = $service_path.'/original';
				 	$thumbnail_path = $service_path.'/thumbnail';

					 if( !File::exists($original_path) || !File::exists($thumbnail_path)  ){
						 File::makeDirectory($original_path, $mode = 0777, true, true);
						 File::makeDirectory($thumbnail_path, $mode = 0777, true, true);
					 }


					 $image_parts = explode(";base64,", $image);

					 $image_type_aux = explode("image/", $image_parts[0]);

					 $image_type = $image_type_aux[1];


					 $image_base64 = base64_decode($image_parts[1]);


					 $file = $request->service_id.'_'.uniqid().'.png';

					  	//thumbnail file
					  Image::make($image)->resize(500, null, function($constraint){
					  		 $constraint->aspectRatio();
					  })->save($thumbnail_path.'/'.$file);
					  	
					  	// Image::make($image)->save($original_path.'/'.$file);

					 file_put_contents($original_path.'/'.$file, $image_base64);

					  $request['upload_path'] ='images/services/'.$now->year.'/'.strtolower($now->format('F')).'/original/'.$file;
					  $request['thumbnail_path'] ='images/services/'.$now->year.'/'.strtolower($now->format('F')).'/thumbnail/'.$file;
					  $request['service_id'] = $request->service_id;

					  $service_uploads = ServiceUploads::create($request->all());

				}
				
			

				
			}

			if ($request->hasFile('files') ) {	

				foreach ($request->file('files') as $file) {
			
					$filename = $request->service_id.'_'.$file->getClientOriginalName();

					$extension = $file->clientExtension();

					$file->move($service_path.'/file/', $filename);

					$request['file_path'] = 'images/services/'.$now->year.'/'.strtolower($now->format('F')).'/file/'.$filename;
					$request['filename'] = $file->getClientOriginalName();

					$service_file = ServiceFile::create($request->all());

				}
			
			}

			 return response()->json(['message'=> 'Service files has been saved succcessfully.' , 'success'=> true]);
		}

		public function printService(Request $request, $id)
		{
		

			$services = Service::with('customer')
			 ->where('service_id', $id)->first();
			 if($request->type == 'print'){
				$pdf = PDF::loadView('services.print', ['services'=>$services]);
			 }

			 else if($request->type == 'delivery'){
			 	$pdf = PDF::loadView('services.delivery', ['services'=>$services]);
			 }
			 else{
			 	$pdf = PDF::loadView('services.print', ['services'=>$services]);
			 	$pdf->setPaper('A4');
			 	return $pdf->stream(str_pad($services->receipt_no, 6, '0', STR_PAD_LEFT).'.pdf');
			 }


		
			$pdf->setPaper('A4');
			return $pdf->stream(str_pad($services->receipt_no, 6, '0', STR_PAD_LEFT).'.pdf');
		}

		public  function printOnCreate()
		{
			$services = Service::with('customer')
				->orderBy('created_at', 'DESC')->first();
			$pdf = PDF::loadView('services.print', ['services'=>$services]);
			$pdf->setPaper('A4');
			return $pdf->stream(str_pad($services->receipt_no, 6, '0', STR_PAD_LEFT).'.pdf');
		}

		public function create()
		{
				return view('services.create', [
						'page_title' => 'New Service',
						'breadcrumb' => 'services.create'
				]);
		}

		public function updateStatus(Request $request)
		{
			$service = Service::find($request->service_id);
				$service->service_status = $request->service_status;
				$service->service_status_reason = $request->service_status_reason;
				$service->save(); 
			return response()->json(['message'=>'Service status successfully updated', 'success'=>true, 'data'=>$service]);

		}

		public function store(Request $request)
		{

				$customerData = [
						'customer_name'=> $request->customer_name,
						'customer_email'=> $request->customer_email,
						'customer_phone' => $request->customer_phone,
						'customer_mobile' => $request->customer_mobile,
						'customer_address' => $request->customer_address,
				];

				$customer = Customer::firstOrCreate($customerData);

				$last_service = Service::all()->last();

				$request['receipt_no'] = empty($last_service) ? 201901 :  $last_service->receipt_no + 1;

				$service = $customer->services()->create($request->all());

				if(!empty($request->delivery)){
						$request['customer_id'] = $customer->customer_id;

						if(empty($request->delivery_address)){
								$request['delivery_address'] = $request->customer_address;
						}

				}

			if (!empty($request->images)){

				foreach ($request->images as  $image){
		
					$now = Carbon::now();
					
					$service_path = public_path('images/services/'.$now->year.'/'.strtolower($now->format('F')));
					$original_path = $service_path.'/original';
					$thumbnail_path = $service_path.'/thumbnail';


					 if(!File::exists($original_path) || !File::exists($thumbnail_path)  ){
						 File::makeDirectory($original_path, $mode = 0777, true, true);
						 File::makeDirectory($thumbnail_path, $mode = 0777, true, true);
					 }


					$image_parts = explode(";base64,", $image);

					$image_type_aux = explode("image/", $image_parts[0]);

					$image_type = $image_type_aux[1];

					$image_base64 = base64_decode($image_parts[1]);

				


					$file = $service->service_id.'_'.uniqid().'.png';
				

					Image::make($image_base64)->resize(600, null, function($constraint){
						$constraint->aspectRatio();
					})->save($thumbnail_path.'/'.$file);


					file_put_contents($original_path.'/'.$file, $image_base64);

					$request['upload_path'] ='images/services/'.$now->year.'/'.strtolower($now->format('F')).'/original/'.$file;
					$request['thumbnail_path'] ='images/services/'.$now->year.'/'.strtolower($now->format('F')).'/thumbnail/'.$file;

					$request['service_id'] =$service->service_id;
					ServiceUploads::create($request->all()); 


				}
			}
			return response()->json(['data'=>$service, 'success'=> true, 'message'=> 'Service successfully saved.']);

		}

		public function show(Service $service)
		{

			$services =  Service::with('customer', 'images', 'files')->find($service)->first();

			$url = URL::temporarySignedRoute('service.form_upload', now()->addMinutes(5), ['service_id'=>$services->service_id]);
		
			$qr_generate = base64_encode(QrCode::format('png')->size(200)->generate($url));

			$services->qr_code = '<img class="img img-thumbnail img-responsive pull-left" src="data:image/png;base64,'.$qr_generate.'">';

			return response()->json($services);
		}

		public function edit(Service $service)
		{
				return abort('404');
		}

		public function update(Request $request, Service $service)
		{
				//
		}

		public function destroy(Request $request)
		{

			  
			  $images = ServiceUploads::where('service_id', $request->service_id)->get();
			  
			  foreach ($images as $image) {
			  	 if(!File::exists($image->upload_path)){
			  	 	File::delete($image->upload_path);
			  		$image->delete();
			  	 }
			  	
			  }

			 return $service = Service::destroy($request->service_id);
		
		}

		public function mobileexist(Request $request)
		{
			$customer = Customer::where('customer_mobile', $request->customer_mobile)->first();
			 if ($customer) {
				return response()->json([
					'data'=> $customer,
					 'exist'=> 1
				]);
			}
			return [];
		}

		public function serialexist(Request $request)
		{
			$service = Service::where('serial', $request->serial)->first();


			if ($service) {
				return response()->json([
					'message'=> 'Serial number '.$service->serial. ' detected with the brand/item '.$service->brand.'.',
					'exist'=> 1
				]);
			}
			return [];
		}

		public function getServiceLists(Request $request)
		{

			if(empty($request->service_status)){
				$data = DB::table('services')
						->join('customers', 'services.customer_id', '=', 'customers.customer_id')
						->when($request->service_status , function ($query) use ($request){
							if($request->service_status != 'all'){
								return $query->where('services.service_status', $request->service_status);
							}
						})
						->when($request->brand, function ($query) use ($request){

							if($request->brand != 'all'){
								$query->where('services.brand', 'like', "%{$request->brand}%");
							}
						})
						->when($request->customer_name, function ($query) use ($request){
								$query->where('customers.customer_name', 'like', "%{$request->customer_name}%");
						})
						->when($request->customer_mobile, function ($query) use ($request){
							$query->where('customers.customer_mobile', 'like', "%{$request->customer_mobile}%");
						})
						->when($request->customer_email, function ($query) use ($request){
								$query->where('customers.customer_email', $request->customer_email);
						})
						->when($request->created_at, function ($query) use ($request){

					
								$dates = explode('-', $request->created_at);

								$query->where('services.created_at', '>=', date('Y-m-d', strtotime(trim($dates[0]))));
								$query->where('services.created_at', '<=', date('Y-m-d', strtotime(trim($dates[1]))));
				
				
						})
						->where('services.service_status', '!=', 'closed-returned')
						->where('services.service_status', '!=', 'closed-accomplished')
						->whereNull('deleted_at')
						->orderBy('services.service_id', 'DESC')
						->get();
			}
			else{
				$data = DB::table('services')
						->join('customers', 'services.customer_id', '=', 'customers.customer_id')
						->when($request->service_status , function ($query) use ($request){
							if($request->service_status != 'all'){
								return $query->where('services.service_status', $request->service_status);
							}
						})
						->when($request->brand, function ($query) use ($request){

							if($request->brand != 'all'){
								$query->where('services.brand', 'like', "%{$request->brand}%");
							}
						})
						->when($request->customer_name, function ($query) use ($request){
								$query->where('customers.customer_name', 'like', "%{$request->customer_name}%");
						})
						->when($request->customer_mobile, function ($query) use ($request){
							$query->where('customers.customer_mobile', 'like', "%{$request->customer_mobile}%");
						})
						->when($request->customer_email, function ($query) use ($request){
								$query->where('customers.customer_email', $request->customer_email);
						})
						->when($request->created_at, function ($query) use ($request){

					
								$dates = explode('-', $request->created_at);

								$query->where('services.created_at', '>=', date('Y-m-d', strtotime(trim($dates[0]))));
								$query->where('services.created_at', '<=', date('Y-m-d', strtotime(trim($dates[1]))));
				
				
						})
						->whereNull('deleted_at')
						->orderBy('services.service_id', 'DESC')
						->get();
			}



				return Datatables::of($data)

						->editColumn('receipt_no', function($service){
						return str_pad($service->receipt_no, 5, '0', STR_PAD_LEFT);
				})
						->editColumn('problem_reported', function ($service){
								return substr($service->problem_reported, 0, 50);
						})
						->editColumn('remarks', function ($service){
								return substr($service->remarks, 0, 50);
						})
						->editColumn('created_at', function($service){
						return date('d-M-Y', strtotime($service->created_at));
				})
//            ->rawColumns(['service_status'])
						->make(true);
		}
}
