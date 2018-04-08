@extends("layouts/app")

@section("content")
	<div class="container">
		<h2>Album List</h2>
		<ul>
			@foreach($albums as $album)
				<li>
					{{ $album->name }}
					({{ $album->artist->name }})
				</li>		
			@endforeach
		</ul>
	</div>	
@endsection

