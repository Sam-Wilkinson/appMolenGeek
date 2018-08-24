
@extends('adminlte::page')

@section('css')

@stop

@section('content')

<p>
    This view is loaded from module: {!! config('sallereservation.name') !!}
</p>
{!! $calendar->calendar() !!}
{!! $calendar->script() !!}

@stop


