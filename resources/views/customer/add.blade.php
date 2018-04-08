@extends("layouts/app")

@section("content")
	<div class="container">
		<h2>Add Customer</h2>
		@if($errors->any())
			<div class="alert alert-warning">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ url('customers/create') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" class="form-control">
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" class="form-control"></textarea>			
			</div>	
			<input type="submit" class="btn btn-primary" value="Add Customer">
			</div>
		</form>
	</div>	
@endsection