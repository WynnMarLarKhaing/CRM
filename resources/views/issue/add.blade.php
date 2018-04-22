@extends("layouts/app")

@section("content")
	<div class="container">
		<h2>Add Issue</h2>
		@if($errors->any())
			<div class="alert alert-warning">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ url('issues/create') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Subject</label>
				<input type="text" name="subject" class="form-control">
			</div>
			<div class="form-group">
				<label>Detail</label>
				<textarea name="detail" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label>Customer</label>
				<select class="form-control" name="customer_id" id="customers">
				   <option value="0">-- Choose --</option>
				   @foreach($customers as $customer)
				   	<option value="{{ $customer->id }}" data-email="{{ $customer->email }}"data-phone="{{ $customer->email }}" >{{ $customer->name }}</option>
				   @endforeach				   
				</select>

				<div class="form-text">
					Email:<span id="email">-</span>
					&nbsp;&nbsp;&nbsp;&nbsp;
					Phone:<span id="phone">-</span>
				</div>
			</div>

			<div class="form-group">
				<label>Product</label>
				<select class="form-control" name="product_id" id="products">
				   <option value="0">-- Choose --</option>
				   @foreach($products as $product)
				   	<option value="{{ $product->id }}" data-make="{{ $product->make }}"data-model="{{ $product->model}}" >{{ $product->name }}</option>
				   @endforeach				   
				</select>

				<div class="form-text">
					Make:<span id="make">-</span>
					&nbsp;&nbsp;&nbsp;&nbsp;
					Model:<span id="model">-</span>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" value="Add Customer">
			</div>
		</form>
	</div>	
@endsection