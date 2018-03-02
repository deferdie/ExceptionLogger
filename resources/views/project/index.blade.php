@extends('layouts.app')

@section('content')
	
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
		                <td>Action</td>
		            </tr>
		    	@endforeach
		    </tbody>
		</table>
	@endif
@endsection