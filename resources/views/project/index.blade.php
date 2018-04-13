@extends('layouts.app')

@section('content')
	<div class="action-bar col-md-12">
		<a href="{{route('createProject')}}">
			<button class="btn btn-primary btn-sm">
				Create Project
			</button>
		</a>
	</div>
	@if(count($projects) == 0)
	   	<h4>
	   		No projects created
		</h4>
	@else
		<table class="table table-hover">
		    <thead>
		        <tr>
		            <th>Project ID #</th>
		            <th>Project Name</th>
		            <th>Status</th>
		            <th>Colour</th>
		            <th>Actions</th>
		        </tr>
		    </thead>
		    <tbody>
				@foreach($projects as $project)
		            <tr>
		                <td>{{$project->id}}</td>
		                <td>{{$project->name}}</td>
		                <td>{{$project->status}}</td>
		                <td>{{$project->colour}}</td>
		                <td>
							<a href="{{route('showProject', $project)}}">Manage</a>
						</td>
		            </tr>
		    	@endforeach
		    </tbody>
		</table>
	@endif
@endsection