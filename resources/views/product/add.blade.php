@extends("layouts/app")

@section("content")
	<div class="container">
		<h2>Add Product</h2>
		<form action="{{ url('products/create') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Make</label>
				<input type="text" name="make" class="form-control">
			</div>
			<div class="form-group">
				<label>Model</label>
				<input type="text" name="model" class="form-control">
			</div>			
			<input type="submit" class="btn btn-primary" value="Add Product">
			</div>
		</form>
	</div>	
@endsection