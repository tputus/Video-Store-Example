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
use App\Customer;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

//customers
Route::get('/customers', 'CustomerController@listCustomers');

Route::post('/customers', 'CustomerController@addCustomer');

Route::delete('/customers/{customer}', 'CustomerController@deleteCustomer');

Route::get('/modify_customer/{customer_id}',  'CustomerController@modifyCustomerCreateForm');

Route::post('/modify_customer/{customer}', 'CustomerController@modifyCustomerPostData');

//dvds
Route::get('/dvds', 'DVDController@listDvds');

Route::post('/dvds', 'DVDController@addDvd');

Route::delete('/dvds/{dvd}', 'DVDController@deleteDvd');

Route::get('/modify_dvd/{dvd_id}',  'DVDController@modifyDvdCreateForm');

Route::post('/modify_dvd/{dvd}', 'DVDController@modifyDvdPostData');

//orders
//special case (below) - orders specific to a customer can be viewed from the customer page
Route::get('/customer_order/{customer}', 'OrderController@listCustomerOrders');

Route::get('/all_orders', 'OrderController@listAllOrders');

Route::get('/open_orders', 'OrderController@listAllOpenOrders');

//add, modify, delete orders
Route::post('/order', 'OrderController@addOrder');

Route::delete('/order/{order}', 'OrderController@deleteOrder');

Route::get('/modify_order/{order_id}',  'OrderController@modifyOrderCreateForm');

Route::post('/modify_order/{order}', 'OrderController@modifyOrderPostData');
