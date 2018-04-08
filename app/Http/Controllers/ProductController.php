<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index(){
   		return view('product/index',[
   			'products' => Product::paginate(5)
   		]);
   }

   public function view($id){
   		return view('product/view',[
   			'product' => Product::find($id)
   		]);
   }

   public function add(){
   		return view('product/add');
   }

   public function create(){
   		$product = new Product();
   		$product->name = request()->name;
   		$product->make = request()->make;
   		$product->model = request()->model;   		
   		$product->save();

   		return redirect('products');
   }

   public function edit($id){
   		return view('product/edit',[
   			'product' => Product::find($id)
   		]);
   }

   public function update($id){
   		$product = Product::find($id);
   		$product->name = request()->name;
   		$product->make = request()->make;
   		$product->model = request()->model;   		
   		$product->save();
   		return redirect('products');
   }

   public function delete($id){
   		$product = Product::find($id);
   		$product->delete();
   		return redirect('products')->with('info','A Product deleted');
   }
}
