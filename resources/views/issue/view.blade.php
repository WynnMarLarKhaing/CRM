@extends("layouts/app")

@section("content")
	<div class="container">		
		<div class="row">
			<div class="col-md-8">
				@if($errors->any())
					<div class="alert alert-warning">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
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
				  			@if($issue->status != 4)
				  			<div class="btn-group">
						  		<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    		{{ config('crm.status')[$issue->status] }}
						  		</button>
							    <div class="dropdown-menu">
							  		@foreach(config('crm.status') as $key=>$status)
								  		@if($status != 'Closed')
								  			<a class="dropdown-item" href="{{url('/issues/status/'.$issue->id.'/'.$key )}}">{{ $status }}</a>
								  		@endif
							  		@endforeach						    
							  	</div>
							</div>
							@endif

							{{ $issue->created_at }}
					  	</div>
					  	<div class="col-md-6 text-right" >
					  		@if($issue->status != 4)
						  		<a href="{{url('/issues/status/'.$issue->id.'/4')}}" class="btn btn-warning">
						  			<i class="fa fa-times-circle"></i>&nbsp;Close
						  		</a>
					  		@endif

					  		@if($issue->status == 4)
					  		<a href="{{url('/issues/status/'.$issue->id.'/0')}}" class="btn btn-warning">
					  			Re-Open
					  		</a>
					  		@endif

					  		<a href="{{url('/issues/edit/'.$issue->id)}}" class="btn btn-light">Edit</a>
					  		<a href="{{url('/issues/delete/'.$issue->id)}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>
					  	</div>	
				  	</div>
				  </div>
				</div>

				<hr>

				<h3><i class="fa fa-comments"></i>&nbsp;Comments</h3>

				 @foreach($issue->comments as $comment)
				 	<div class="card">
                        <div class="card-body">
                            <div>
                                <i class="fa fa-user"></i> <b>{{ $comment->user->name }}</b>
                                <small class="text-mute">({{ $comment->created_at->diffForHumans() }})</small>

                                <a href="{{ url('comments/delete/' . $comment->id) }}" class="text-danger" style="float:right">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                            <br>
                            {{ $comment->comments }}
                        </div>
                    </div>
                    <br>
                @endforeach				 
				
				<form method="POST" action="{{ url('comments/add') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="hidden" name="issue_id" value={{ $issue->id}}>
						<textarea name="comments" class="form-control"></textarea>
					</div>
					<input type="submit" value="Add Comment" class="btn btn-primary">
				</form>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<b><i class="fa fa-usery"></i>&nbsp;Assigned To</b>
						
						<a href="#" class="dropdown-toggle" style="float:right;text-decoration:none;" data-toggle="dropdown">Re-assign</a>
						<div class="dropdown-menu">
							@foreach($users as $user)
								<a href="{{url('/issues/assign/'.$issue->id.'/'.$user->id)}}" class="dropdown-item">{{ $user->name}}</a>
							@endforeach
						</div>
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