@extends("layouts/app")

@section("content")
	<div class="container">
		<h2>Edit Product</h2>
		<form action="{{ url('products/update/'.$product->id) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="{{ $product->name}}">
			</div>
			<div class="form-group">
				<label>Make</label>
				<input type="text" name="make" class="form-control" value="{{ $product->make}}">
			</div>
			<div class="form-group">
				<label>Model</label>
				<input type="text" name="model" class="form-control" value="{{ $product->model}}">
			</div>
			
			<input type="submit" class="btn btn-primary" value="Update">
			</div>
		</form>
	</div>	
@endsection