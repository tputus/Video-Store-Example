<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Order;
use App\Dvd;

class OrderController extends Controller
{
    public function listCustomerOrders($customer_id){

      $orders = DB::table('orders')->where('customer_id', $customer_id)->get();
      $dvds =  Dvd::orderBy('name', 'asc')->get();

      return view('/order_tasks.customer_orders', [
        'orders' => $orders, 'customer_id' => $customer_id, 'dvds' => $dvds,
      ]);
    }

    public function listAllOrders(){
      $orders = Order::orderBy('order_id', 'asc')->get();

      return view('order_tasks.list_orders', [
        'orders' => $orders,
      ]);

    }

    public function listAllOpenOrders(){

      $orders = Order::orderBy('order_id', 'asc')->where('returned', 0)->get();

      return view('order_tasks.list_orders', [
        'orders' => $orders,
      ]);
    }

    public function addOrder(Request $request){
      $validator = Validator::make($request->all(), [

          'dvd_id' => 'required',
          'customer_id' => 'required',
          'start_date' => 'required',
          'due_date' => 'required',

      ]);

      if ($validator->fails()){
        return redirect('/customers')
          ->withInput()
          ->withErrors($validator);
      }

      $order=new Order;
      $order->dvd_id = $request->dvd_id;
      $order->customer_id = $request->customer_id;
      $order->start_date = $request->start_date;
      $order->due_date = $request->due_date;
      $order->save();

      return redirect('/customers');
    }

    public function deleteOrder(Order $order){
      $order->delete();
      return redirect('/customers');
    }

    public function modifyOrderCreateForm($order_id){

      $orders = DB::table('orders')->where('order_id', $order_id)->get();
      $dvds =  Dvd::orderBy('name', 'asc')->get();

      return view('/order_tasks.modify_order', [
        'order' => $orders[0], 'dvds' => $dvds //get returns a "collection", must specify you want first element
      ]);

    }

    public function modifyOrderPostData(Order $order, Request $request){

      $validator = Validator::make($request->all(), [

          'dvd_id' => 'required',
          'customer_id' => 'required',
          'start_date' => 'required',
          'due_date' => 'required',

      ]);

      if ($validator->fails()){
        return redirect('/customers')
          ->withInput()
          ->withErrors($validator);
      }

      $input = $request->all();

      $order->fill($input)->save();

      return redirect('/customers');
    }

}
