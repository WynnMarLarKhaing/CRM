@extends("layouts/app")

@section("content")
	<div class="container">		
		<div class="card">
		  <div class="card-header">
		  	 <b>{{ $customer->name }}</b>
		  </div>
		  <div class="card-body">
		    <b>Email :</b> {{ $customer->email }}</br>
			<b>Email :</b> {{ $customer->phone }}</br>
			<p> {{ $customer->address }} </p>		
		</div>
		<div class="card-footer">
			<a href="{{ url('customers/edit/'.$customer->id) }}" class="btn btn-secondary">Edit</a>
			<a href="{{ url('customers/delete/'.$customer->id) }}" class="btn btn-warning"><i class="fa fa-trash"></i></a>
		</div>

	</div>	
@endsection