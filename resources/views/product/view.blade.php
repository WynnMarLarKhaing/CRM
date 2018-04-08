@extends("layouts/app")

@section("content")
	<div class="container">		
		<div class="card">
		  <div class="card-header">
		  	 <b>{{ $product->name }}</b>
		  </div>
		  <div class="card-body">
		    <b>Make :</b> {{ $product->make }}</br>
			<b>Model :</b> {{ $product->model }}</br>
		</div>
		<div class="card-footer">
			<a href="{{ url('products/edit/'.$product->id) }}" class="btn btn-secondary">Edit</a>
			<a href="{{ url('products/delete/'.$product->id) }}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
		</div>

	</div>	
@endsection