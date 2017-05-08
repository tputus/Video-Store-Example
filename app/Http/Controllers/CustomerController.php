<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Customer;

class CustomerController extends Controller
{
    public function listCustomers(){
      $customers = Customer::orderBy('customer_id', 'asc')->get();

      return view('customer_tasks.index', [
        'customers' => $customers,
      ]);
    }

    public function addCustomer(Request $request){
      $validator = Validator::make($request->all(), [

          'name' => 'required|max:255',
          'date_of_birth' => 'required',
          'address' => 'required',
          'phone' => 'required',
          'email' => 'required',

      ]);

      if ($validator->fails()){
        return redirect('/customers')
          ->withInput()
          ->withErrors($validator);
      }

      $customer=new Customer;
      $customer->name = $request->name;
      $customer->date_of_birth = $request->date_of_birth;
      $customer->address = $request->address;
      $customer->phone = $request->phone;
      $customer->email = $request->email;
      $customer->save();

      return redirect('/customers');
    }

    public function deleteCustomer(Customer $customer){
      $customer->delete();
      return redirect('/customers');
    }

    public function modifyCustomerCreateForm($customer_id){
      $customers = DB::table('customers')->where('customer_id', $customer_id)->get();


      return view('/customer_tasks.modify_customer', [
        'customer' => $customers[0], //get returns a "collection", must specify you want first element
      ]);

    }

    public function modifyCustomerPostData(Customer $customer, Request $request){
      $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'date_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);



        if ($validator->fails()){

          print_r($validator->errors());
          exit;
          return redirect('/customers')
            ->withInput()
            ->withErrors($validator);
        }

        $input = $request->all();

        $customer->fill($input)->save();

        return redirect('/customers');

    }
}
