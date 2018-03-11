@extends('layouts.app')

@section('content')
<exception-realtime :loadexceptions="{{$exceptions}}"></exception-realtime>
@endsection
