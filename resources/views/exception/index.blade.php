@extends('layouts.app')


@section('content')

    <h3>Exceptions</h3>

    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Message</td>
                <td>Code</td>
                <td>URL</td>
                <td>Project Name</td>
                <td>Stack Trace</td>
            </tr>
        </thead>
        <tbody>
            @foreach($exceptions as $exception)
                <tr>
                    <td>{{$exception->id}}</td>
                    <td>{{$exception->message}}</td>
                    <td>{{$exception->status_code}}</td>
                    <td>{{$exception->url}}</td>
                    <td>{{$exception->project->name}}</td>
                    <td>
                        <a href="{{route('showException', $exception)}}">
                            <button class="btn btn-sm btn-primary">
                                Learn More
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection