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

		<br>
		<h3>Issues</h3>
		<table class="table table-bordered table-striped">
			<tr>
				<th>ID</th>
				<th>Subject</th>
				<th>Product</th>
				<th>Stauts</th>				
			</tr>
			@foreach($customer->issues as $issue)
			<tr>
				<td>{{ $issue->id }}</td>
				<td>					
					<a href="{{ url('/issues/view/'.$issue->id ) }}">
						{{ $issue->subject }}
					</a>
				</td>
				<td>
					<a href="{{ url('/products/view/'.$issue->product->id ) }}">
						{{ $issue->product->name }}
					</a>
				</td>
				<td>
					<span class="badge badge-{{ config('crm.badges')[$issue->status] }}">
						{{ config('crm.status')[$issue->status] }}
					</span> 
				</td>				
			</tr>

			@endforeach
		</table>
	</div>	
@endsection