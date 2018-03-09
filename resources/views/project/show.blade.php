@extends('layouts.app')

@section('content')

	<p>
		{{$project->name}}
	</p>

	<status-code :project="{{$project->id}}" :createdstatuscodes="{{$project->statusCodes}}"></status-code>

@endsection