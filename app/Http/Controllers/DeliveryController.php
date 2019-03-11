<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('delivery.index', ['page_title' => 'deliveries', 'breadcrumb' => 'deliveries']);
    }

    public function create()
    {
//        return view('delivery.create', ['page_title' => 'New Delivery', 'breadcrumb' => 'deliveries.create']);
    }


    public function getReferenceNumber(Request $request)
    {

       $delivery = Delivery::all()->last();

        return str_pad($delivery->reference_no + 1, 5, '0', STR_PAD_LEFT);

    }


    public function getDeliveryLists(){

        $data = Delivery::with('customer');

        return Datatables::of($data)
//            ->editColumn('service_id', function($service){
//                return str_pad($service->service_id, 5, '0', STR_PAD_LEFT);ss
//            })
//            ->editColumn('created_at', function($service){
//                return date('Y-m-d h:i A', strtotime($service->created_at));
//            })
//            ->editColumn('service_status', function($service){
//                return '<span class=" ' . ($service->service_status == 'Pending' ? 'text-info' : 'text-success') . '">'. $service->service_status .'</span>';
//            })
//            ->filter(function ($query) use ($request) {
//
//                if ($request->has('created_at')){
////
//                    $date = explode('-', trim($request->created_at));
////                    print_r($date);
//                    $start = date('Y-m-d', strtotime($date[0]));
////                    $end = date('Y-m-d', strtotime($date[1]));
////
////                    $query->whereBetween('created_at', [$start, $end]);
//                }
//
//                if ($request->has('service_status')) {
//                    $query->where('service_status', 'like', "%{$request->get('service_status')}%");
//                }
//
//
//                if ($request->has('brand')) {
//                    $query->where('brand', 'like', "%{$request->get('brand')}%");
//                }
//
//
//                if ($request->has('customer_name')) {
//                    $query->whereHas('customer', function($q) use($request){
//                        $q->where('customer_name', 'like', "%{$request->customer_name}%");
//                    });
//                }
////
////                if ($request->has('customer_mobile')) {
////                    $query->where('customer.customer_mobile', 'like', "%{$request->get('customer_mobile')}%");
////                }
//            })
//            ->rawColumns(['service_status'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        return Delivery::destroy($delivery->delivery_id);
    }
}
