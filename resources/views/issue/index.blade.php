@extends("layouts/app")

@section("content")
	<div class="container">		
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link @if($type=='all') active @endif" href="{{ url('issues') }}"><i class="fa fa-list"></i>&nbsp;All Issues</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link @if($type=='new') active @endif" href="{{ url('issues/filter/new') }}">New Issues</a>
		  </li>
		  <li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle @if($type=='filter') active @endif" href="" data-toggle="dropdown">
		    	Filter
		    </a>
		    <div class="dropdown-menu">
		    	<a class="dropdown-item" href="{{ url('issues/filter/assgined') }}">Assgined</a>
		    	<a class="dropdown-item" href="{{ url('issues/filter/wip') }}">WIP</a>
		    	<a class="dropdown-item" href="{{ url('issues/filter/done') }}">Done</a>
		    	<a class="dropdown-item" href="{{ url('issues/filter/closed') }}">Closed</a>
		    </div>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link disabled" href="{{ url('issues/add') }}"><i class="fa fa-plus-circle"></i>&nbsp;Add Issue</a>
		  </li>
		</ul>
		<br>
		<table class="table table-striped table-bordered">
			<tr>
				<th>ID</th>
				<th>Subject</th>
				<th>Customer</th>
				<th>Product</th>
				<th>Assign To</th>
				<th>Status</th>
			</tr>			
			@foreach($issues as $issue)
				<tr>
					<td>{{ $issue->id }}</td>
					<td>
						<a href="{{url('/issues/view/'.$issue->id)}}">{{ $issue->subject }}</a>
						@if(count($issue->comments))
							<span class="badge badge-pill badge-secondary">{{ count($issue->comments) }}</span>
						@endif
					</td>
					<td><a href="{{url('/customers/view/'.$issue->customer->id)}}">{{ $issue->customer->name }}</a></td> 
					<td><a href="{{url('/products/view/'.$issue->product->id)}}">{{ $issue->product->name ?? '-' }}</a></td>
					<td>{{ $issue->user->name ?? '-'}}</td>
					<td>
						<span class="badge badge-{{ config('crm.badges')[$issue->status] }}">{{ config('crm.status')[$issue->status] }}</span>
					</td>
				</tr>
			@endforeach			
		</table>
		{{ $issues->links() }}		
	</div>	
@endsection