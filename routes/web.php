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
    return redirect('service');
});

Route::get('/user','Auth\RegisterController@index')->name('user.index');
Route::post('/user/checkpassword','Auth\RegisterController@checkpassword')->name('user.checkpassword');
Route::post('/user/password','Auth\RegisterController@password')->name('user.password');
Route::get('/user/dataTable','Auth\RegisterController@dataTable')->name('user.datatable');
Route::post('/user/checkusername','Auth\RegisterController@checkusername')->name('user.checkusername');
Route::post('/user/store','Auth\RegisterController@store')->name('user.store');
Route::post('/user/delete','Auth\RegisterController@delete')->name('user.delete');
Route::post('/user/update','Auth\RegisterController@update')->name('user.update');
Route::get('/user/user_info','Auth\RegisterController@user_info')->name('user.user_info');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//SERVICES
//QR code
Route::any('service/mobileexist', 'ServiceController@mobileexist');
Route::any('service/serialexist', 'ServiceController@serialexist')->name('service.serialexist');

Route::get('service/upload_form', 'ServiceController@upload_form')->name('service.form_upload');
Route::post('service/upload_file', 'ServiceController@upload_file')->name('service.upload_file');

Route::post('service/upload', 'ServiceController@upload')->name('service.upload');
Route::get('service/{service}/qrcode', 'ServiceController@qrcode')->name('service.qrcode');
Route::post('service/status', 'ServiceController@updatestatus')->name('service.status');
Route::get('service/detail/{service}', 'ServiceController@detail')->name('service.detail');
Route::get('service/checkstatus', 'ServiceController@checkstatus')->name('service.checkstatus');

Route::get('service/print/{service}', 'ServiceController@printService')->name('service.print');
Route::get('service/delivery/{service}', 'ServiceController@printService')->name('service.delivery');
Route::get('service/printoncreate', 'ServiceController@printOnCreate')->name('service.printoncreate');

Route::get('service/serviceLists', 'ServiceController@getServiceLists')->name('service.dataTable');
Route::resource('service', 'ServiceController');

//DELIVERYs
Route::get('delivery/deliveryLists', 'DeliveryController@getDeliveryLists')->name('delivery.dataTable');//DATATABLE
Route::get('delivery/getReferenceNumber', 'DeliveryController@getReferenceNumber')->name('delivery.reference_no');//DATATABLE
Route::resource('delivery', 'DeliveryController');

//Customer
Route::get('customer/search', 'CustomerController@search')->name('customer.search');
Route::resource('customer', 'CustomerController');


