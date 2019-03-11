<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//SERVICES
Route::post('service/status', 'ServiceController@updatestatus')->name('service.status');
Route::get('service/print', 'ServiceController@printService')->name('service.print');
Route::get('service/serviceLists', 'ServiceController@getServiceLists')->name('service.dataTable');
Route::resource('service', 'ServiceController');

//DELIVERYs
Route::get('delivery/deliveryLists', 'DeliveryController@getDeliveryLists')->name('delivery.dataTable');//DATATABLE
Route::get('delivery/getReferenceNumber', 'DeliveryController@getReferenceNumber')->name('delivery.reference_no');//DATATABLE
Route::resource('delivery', 'DeliveryController');