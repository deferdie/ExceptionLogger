@extends('layouts.app')


@section('content')

    <h3>Exception</h3>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <td>
                    File
                </td>
                <td>
                    Line
                </td>
                <td>
                    Function
                </td>
                <td>
                    Class
                </td>
                <td>
                    Type
                </td>
            </tr>
        </thead>
        <tbody>
            @foreach(json_decode($exception->stack_trace) as $stack)
            <tr>
                <td>
                    {{$stack->file}}
                </td>
                <td>
                    {{$stack->line}}
                </td>
                <td>
                    {{$stack->function}}
                </td>
                <td>
                    {{$stack->class}}
                </td>
                <td>
                    {{$stack->type}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection