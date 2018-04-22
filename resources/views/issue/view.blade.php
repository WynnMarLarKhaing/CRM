@extends("layouts/app")

@section("content")
	<div class="container">		
		<div class="row">
			<div class="col-md-8">
				<div class="card text-white bg-{{ config('crm.badges')[$issue->status]}}" >
				  <div class="card-header">
				   <b style="font-size: 1.5em"><i class="fa fa-bug"></i>&nbsp;{{ $issue->subject }}</b>
				  </div>
				  <div class="card-body">
				  	<div class="card-text">{{ $issue->detail}}</div>
				  </div>
				  <div class="card-footer">
				  	<div class="row">
				  		<div class="col-md-6">
				  			{{ $issue->created_at }}
					  	</div>
					  	<div class="col-md-6 text-right" >
					  		<a href="{{url('/issues/edit/'.$issue->id)}}" class="btn btn-warning"><i class="fa fa-times-circle"></i>&nbsp;Close</a>
					  		<a href="{{url('/issues/edit/'.$issue->id)}}" class="btn btn-light">Edit</a>
					  		<a href="{{url('/issues/delete/'.$issue->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
					  	</div>	
				  	</div>
				  </div>
				</div>

				<hr>

				<h3><i class="fa fa-comments"></i>&nbsp;Comments</h3>
				<div class="card">
					<div class="card-body">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</div>
				</div>
				<br>
				<form method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<textarea name="comment" class="form-control"></textarea>
					</div>
					<input type="submit" value="Add Comment" class="btn btn-primary">
				</form>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<b><i class="fa fa-thermometer-empty"></i>&nbsp;Status</b>
					</div>
					<div class="card-body">
						<div class="btn-group">
						  <button type="button" class="btn btn-{{ config('crm.badges')[$issue->status]}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    {{ config('crm.status')[$issue->status] }}
						  </button>
						  <div class="dropdown-menu">
						  	@foreach(config('crm.status') as $status)
						  		@if($status != 'Closed')
						  			<a class="dropdown-item" href="#">{{ $status }}</a>
						  		@endif
						  	@endforeach						    
						  </div>
						</div>						
					</div>
				</div>
				<br>

				<div class="card">
					<div class="card-header">
						<b><i class="fa fa-usery"></i>&nbsp;Assigned To</b>
					</div>
					<div class="card-body">
						<b>Name: </b>{{ $issue->user->name }}<br>
						<b>Role: </b> {{ config('crm.roles')[$issue->user->role] }}
					</div>
				</div>
				<br>

				<div class="card">
					<div class="card-header">
						<b><i class="fa fa-users"></i>&nbsp;Customer</b>
					</div>
					<div class="card-body">
						<b>Name:</b>{{ $issue->customer->name}}</br>
						<b>Email:</b>{{ $issue->customer->email}}</br>
						<b>Phone:</b>{{ $issue->customer->phone}}
					</div>
					<div class="card-footer">
						{{ $issue->customer->address }}
					</div>
				</div>

				<br>
				<div class="card">
					<div class="card-header">
						<b><i class="fa fa-mobile"></i>&nbsp;Product</b>
					</div>
					<div class="card-body">
						<b>Name:</b>{{ $issue->product->name}}</br>
						<b>Make:</b>{{ $issue->product->make}}</br>
						<b>Model:</b>{{ $issue->product->model}}
					</div>					
				</div>
			</div>
		</div>		
	</div>	
@endsection