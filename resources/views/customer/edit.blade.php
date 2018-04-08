@extends("layouts/app")

@section("content")
	<div class="container">
		<h2>Edit Customer</h2>
		<form action="{{ url('customers/update/'.$customer->id) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{ $customer->name}}">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="{{ $customer->name}}">
			</div>
			<div class="form-group">
				<label>Phone</label>
				<input type="text" name="phone" class="form-control" value="{{ $customer->phone}}">
			</div>
			<div class="form-group">
				<label>Address</label>
				<textarea name="address" class="form-control">{{ $customer->address}}</textarea>			
			</div>	
			<input type="submit" class="btn btn-primary" value="Update">
			</div>
		</form>
	</div>	
@endsection