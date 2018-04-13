@extends('layouts.app')

@section('content')

	<h2>
		{{$project->name}}
	</h2>

	<status-code :project="{{$project->id}}" :createdstatuscodes="{{$project->statusCodes}}"></status-code>

@endsection