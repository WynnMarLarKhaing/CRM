<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Resources\Customer as CustomerResource;
use App\Http\Resources\CustomerCollection;

class CustomerController extends Controller
{
   public function index(){
   		// return view('customer/index',[
   		// 	'customers' => Customer::orderBy('id','DESC')->paginate(5)
   		// ]);
      return new CustomerCollection(Customer::paginate(5));
   }

   public function view($id){
   		// return view('customer/view',[
   		// 	'customer' => Customer::find($id)
   		// ]);
      return new CustomerResource(Customer::find($id));
   }

   public function add(){
   		return view('customer/add');
   }

   public function create()
   {

      $validator = validator(request()->all(),[
         "name" => "required",
         "email" => "required|email",
         "phone" => "required",
         "address" => "required",
      ]);

      if($validator->passes()){
         $customer = new Customer();
         $customer->name = request()->name;
         $customer->email = request()->email;
         $customer->phone = request()->phone;
         $customer->address = request()->address;
         $customer->save();

         return redirect('customers');
      }

		return back()->withErrors($validator);
   }

   public function edit($id){
   		return view('customer/edit',[
   			'customer' => Customer::find($id)
   		]);
   }

   public function update($id){
   		$customer = Customer::find($id);
   		$customer->name = request()->name;
   		$customer->email = request()->email;
   		$customer->phone = request()->phone;
   		$customer->address = request()->address;
   		$customer->save();
         return redirect('customers');
   }

   public function delete($id){
   		$customer = Customer::find($id);
   		$customer->delete();
   		return redirect('customers')->with('info','A customer deleted');
   }
}
