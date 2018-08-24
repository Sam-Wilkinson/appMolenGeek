@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('css')


@stop   

@section('js')

@stop

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"> 
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<p>
    This view is loaded from module: {!! config('sallereservation.name') !!}
</p>
{!! $calendar->calendar() !!}
{!! $calendar->script() !!}

@stop
