@extends('layouts.app')

@section('content')
	
	<p>Projects</p>
	
	@foreach($projects as $project)
		{{$project->name}}
	@endforeach

@endsection