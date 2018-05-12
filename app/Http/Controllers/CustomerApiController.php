<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;

class CustomerApiController extends Controller
{
   	public function index()
   	{
   		// return Customer::all();
         return response(Customer::all())->header('Access-Control-Allow-Origin','*');
   	}

   	public function view($id)
   	{
   		return Customer::find($id);
   	}

   	public function create()
   	{
   		// if(!request()->token){
   		// 	return response(['msg'=>'Missing token'],403);
   		// }

   		// $user = User::where('api_token',request()->token)->first();
   		// if(!$user){
   		// 	return response(['msg'=>'Invalid token'],403);
   		// }
   		if(!$this->checkToken(request()->token)){
   			return response(['msg'=>'Invalid token'],403);
   		}

   		$customer = new Customer();
   		$customer->name = request()->name;
   		$customer->email = request()->email;
   		$customer->phone = request()->phone;   		
   		$customer->address = request()->address;
   		$customer->save();

   		return $customer;
   	}

   	public function update($id)
   	{
   		if(!$this->checkToken(request()->token)){
   			return response(['msg'=>'Invalid token'],403);
   		}
   		$customer = Customer::find($id);
   		$customer->name = request()->name;
   		$customer->email = request()->email;
   		$customer->phone = request()->phone;   		
   		$customer->address = request()->address;
   		$customer->save();

   		return $customer;
   	}

   	public function delete($id)
   	{
   		if(!$this->checkToken(request()->token)){
   			return response(['msg'=>'Invalid token'],403);
   		}
   		
   		$customer = Customer::find($id);
   		$customer->delete();

   		return response(['message'=>'A customer deleted.'],200);
   	}

   	public function auth(){
   		$email = request()->email;
   		$password = request()->password;

   		$auth = auth()->attempt([
   			"email" => $email,
   			"password" => $password,
   		]);

   		if($auth){
   			$token = str_random(16);
   			$user = User::where('email',$email)->first();
   			$user->api_token = $token;
   			$user->save();
   			return response(['token'=>$token],200);
   		}else{
   			return response(['msg'=> 'Incorrect Data'],403);
   		}
   	}

	public function checkToken($token){
   		if(!$token){
   			return false;
   		}

   		$user = User::where('api_token',$token)->first();
   		if(!$user){
   			return false;
   		}
   		return true;
   	}
}
