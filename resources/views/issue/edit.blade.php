@extends("layouts/app")

@section("content")
	<div class="container">
		<h2>Edit Issue</h2>
		@if($errors->any())
			<div class="alert alert-warning">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action="{{ url('issues/update/'.$issue->id) }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Subject</label>
				<input type="text" name="subject" class="form-control" value="{{ $issue->subject }}">
			</div>
			<div class="form-group">
				<label>Detail</label>
				<textarea name="detail" class="form-control">{{ $issue->detail }}</textarea>
			</div>	
			<input type="submit" class="btn btn-primary" value="Update Issue">
			</div>
		</form>
	</div>	
@endsection