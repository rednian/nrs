<?php

namespace App\Http\Controllers;

use App\Service;
use PDF;
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
        $this->middleware('auth');
    }

    public function index()
    {
        return view('services.index', [
            'page_title' => 'Services',
            'breadcrumb' => 'services'
        ]);
    }

    public function printService(Request $request)
    {
	    $services = Service::with('customer')
		    ->when($request->service_id, function ($q) use ($request){
		    	$q->where('services.service_id', $request->service_id);
		    })
		    ->orderBy('created_at', 'DESC')->first();
	    $pdf = PDF::loadView('services.print', ['services'=>$services]);
	    $pdf->setPaper('A4');
	    return $pdf->stream();
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
            $num = 1;
            foreach ($request->images as  $image){
                $encoded_image = explode(",", $image)[1];
                $decoded_image = base64_decode($encoded_image);

                $now = Carbon::now();

                $service_path = 'services/'.$now->year.'/'.strtolower($now->format('F')).'/'.$service->service_id.'_'.time().'.png';
                Storage::put('public/'.$service_path, $decoded_image);

                $service->images()->create(['upload_path'=>$service_path]);

            }
        }
	    Session::flash('success', 'The service was successfully save.');
    }

    public function show(Service $service)
    {
    	return Service::with('customer', 'images')->find($service);
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

            ->editColumn('service_id', function($service){
            return str_pad($service->service_id, 5, '0', STR_PAD_LEFT);
        })
            ->editColumn('problem_reported', function ($service){
                return substr($service->problem_reported, 0, 50);
            })
            ->editColumn('remarks', function ($service){
                return substr($service->remarks, 0, 50);
            })
            ->editColumn('created_at', function($service){
            return date('Y-m-d', strtotime($service->created_at));
        })
//            ->rawColumns(['service_status'])
            ->make(true);
    }
}
