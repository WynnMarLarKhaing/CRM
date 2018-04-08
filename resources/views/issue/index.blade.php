@extends("layouts/app")

@section("content")
	<div class="container">		
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Subject/th>
				<th>Customer</th>
				<th>Product</th>
				<th>Assign To</th>
				<th>Status</th>
			</tr>			
			@foreach($issues as $issue)
				<tr>
					<td>{{ $issue->id }}</td>
					<td>{{ $issue->subject }}</td>
					<td>{{ $issue->customer->name }}</td> 
					<td>{{ $issue->product_id }}</td>
					<td>{{ $issue->user->name ?? '-'}}</td>
					<td>{{ $issue->status }}</td>
				</tr>
			@endforeach
		</table>
		{{ $issues->links() }}		
	</div>	
@endsection