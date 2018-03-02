@extends('layouts.app')

@section('content')
<exception-realtime :loadexceptions="{{json_encode($exceptions)}}"></exception-realtime>
@endsection
