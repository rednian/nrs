<?php

namespace App\Http\Controllers;

use App\Service;
use PDF;
use QrCode;
use Session;

use App\Delivery;
use App\Customer;
use Carbon\Carbon;
use App\ServiceUploads;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
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

    public function upload_form()
    {
    	return view('services.upload');
    }

    public function upload(Request $request)
    {
	    if (!empty($request->images)){
		    foreach ($request->images as  $image){
			    $encoded_image = explode(",", $image)[1];
			    $decoded_image = base64_decode($encoded_image);

			    $now = Carbon::now();

			    $service_path = public_path('images/services/'.$now->year.'/'.strtolower($now->format('F')));

			    $raw_image = $request->service_id.'_'.rand(1111, 999999).'.png';

			    if(!File::exists($service_path)){
				    File::makeDirectory($service_path, $mode = 0777, true, true);
			    }

			    file_put_contents($service_path.'/'.$raw_image, $decoded_image);

			    $request['upload_path'] ='images/services/'.$now->year.'/'.strtolower($now->format('F')).'/'.$raw_image;

			    ServiceUploads::create($request->all());

		    }
	    }
    }

    public function printService($id)
    {
	    $services = Service::with('customer')
		   ->where('service_id', $id)->first();
	    $pdf = PDF::loadView('services.print', ['services'=>$services]);
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
      $service = Service::find($request->pk);
        $service->service_status = $request->value;
        $service->save();
      return $service;

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

        $request['receipt_no'] = empty($last_service) ? 1 :  $last_service->receipt_no + 1;

        $service = $customer->services()->create($request->all());

        if(!empty($request->delivery)){
            $request['customer_id'] = $customer->customer_id;

            if(empty($request->delivery_address)){
                $request['delivery_address'] = $request->customer_address;
            }

        }

	    if (!empty($request->images)){
		    foreach ($request->images as  $image){
			    $encoded_image = explode(",", $image)[1];
			    $decoded_image = base64_decode($encoded_image);

			    $now = Carbon::now();

			    $service_path = public_path('images/services/'.$now->year.'/'.strtolower($now->format('F')));

			    $raw_image = $service->service_id.'_'.rand(1111, 999999).'.png';

			    if(!File::exists($service_path)){
				    File::makeDirectory($service_path, $mode = 0777, true, true);
			    }

			    file_put_contents($service_path.'/'.$raw_image, $decoded_image);

			    $request['upload_path'] ='images/services/'.$now->year.'/'.strtolower($now->format('F')).'/'.$raw_image;
			    $request['service_id'] =$service->service_id;

			    ServiceUploads::create($request->all());

		    }
	    }
	    Session::flash('success', 'The service was successfully save.');
    }

    public function show(Service $service)
    {
      $services =  Service::with('customer', 'images')->find($service);

      $data = [];

      foreach ($services as $service){
      	$data[] = [
      		'service_status'=>$service->service_status,
      		'qr'=> '<img src="data:image/png;base64, '.base64_encode(QrCode::format('png')->size(150)->generate(url('service/'.$service->service_id.'/upload_form'))).'">'	,
      		'service_id'=>$service->service_id,
      		'customer_id'=>$service->customer_id,
      		'brand'=>$service->brand,
      		'model'=>$service->model,
      		'serial'=>$service->serial,
      		'laptop_broken_lcd'=>$service->laptop_broken_lcd,
      		'laptop_display_flickering'=>$service->laptop_display_flickering,
      		'laptop_casing_broken'=>$service->laptop_casing_broken,
      		'laptop_loose_hinges'=>$service->laptop_loose_hinges,
      		'laptop_missing_keys'=>$service->laptop_missing_keys,
      		'laptop_broken_sockets'=>$service->laptop_broken_sockets,
      		'laptop_hdd_defective'=>$service->laptop_hdd_defective,
      		'laptop_optical_drive_damage'=>$service->laptop_optical_drive_damage,
      		'lcd_scratches'=>$service->lcd_scratches,
      		'lcd_display_flickering'=>$service->lcd_display_flickering,
      		'lcd_casing_broken'=>$service->lcd_casing_broken,
      		'accessories_power_cord'=>$service->accessories_power_cord,
      		'accessories_battery'=>$service->accessories_battery,
      		'accessories_pcmcia'=>$service->accessories_pcmcia,
      		'accessories_optical_drive'=>$service->accessories_optical_drive,
      		'accessories_toner_cartridge'=>$service->accessories_toner_cartridge,
      		'accessories_ink_cartridge'=>$service->accessories_ink_cartridge,
      		'accessories_data_cable'=>$service->accessories_data_cable,
      		'recovery_hdd'=>$service->recovery_hdd,
      		'recovery_laptop'=>$service->recovery_laptop,
      		'recovery_scsi'=>$service->recovery_scsi,
      		'recovery_sata'=>$service->recovery_sata,
      		'recovery_sas'=>$service->recovery_sas,
      		'recovery_nas'=>$service->recovery_nas,
      		'recovery_flash'=>$service->recovery_flash,
      		'recovery_mobile'=>$service->recovery_mobile,
      		'revovery_tablet'=>$service->revovery_tablet,
      		'problem_reported'=>$service->problem_reported,
      		'remarks'=>$service->remarks,
      		'delivery'=>$service->delivery,
      		'delivery_date'=>$service->delivery_date,
      		'delivery_address'=>$service->delivery_address,
      		'receipt_no'=>$service->receipt_no,
      		'service_status'=>$service->service_status,
      		'created_at'=>$service->created_at,
		      'customer_id'=> $service->customer->customer_id,
		      'customer_name'=> $service->customer->customer_name,
		      'customer_mobile'=> $service->customer->customer_mobile,
		      'customer_phone'=> $service->customer->customer_phone,
		      'customer_email'=> $service->customer->customer_email,

	      ];
      	foreach ($service->images as $image){
      		$data[]['images'][] = [
      			'upload_id'=>$image->upload_id,
      			'upload_path'=>$image->upload_path,
      			'service_id'=>$image->service_id,
		      ];
	      }
      }
      return json_encode($data);
    }

    public function edit(Service $service)
    {
        return abort('404');
    }

    public function update(Request $request, Service $service)
    {
        //s
    }

    public function destroy(Request $request)
    {
    	$service = Service::find($request->service_id);
    	$service->delete();
    	return $service;
    }

    public function getServiceLists(Request $request)
    {
        $data = DB::table('services')
            ->join('customers', 'services.customer_id', '=', 'customers.customer_id')
            ->when($request->service_status , function ($query) use ($request){
                return $query->where('services.service_status', $request->service_status);
            })
            ->when($request->brand, function ($query) use ($request){
                $query->where('services.brand', 'like', "%{$request->brand}%");
            })
            ->when($request->customer_name, function ($query) use ($request){
                $query->where('customers.customer_name', 'like', "%{$request->customer_name}%");
            })
            ->when($request->customer_mobile, function ($query) use ($request){
                $query->where('customers.customer_mobile', $request->customer_mobile);
            })
            ->when($request->customer_email, function ($query) use ($request){
                $query->where('customers.customer_email', $request->customer_email);
            })
            ->when($request->created_at, function ($query) use ($request){
                $dates = explode('-', $request->created_at);

                $start = date('Y-m-d', strtotime($dates[0]));
                $end = date('Y-m-d', strtotime($dates[0]));

                $query->where('services.created_at', '>=', $start);
                $query->where('services.created_at', '=<', $end);
            })
	          ->whereNull('deleted_at')
            ->orderBy('services.created_at', 'DESC')
            ->get();

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
