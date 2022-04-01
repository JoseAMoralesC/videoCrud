@extends('adminlte::page')
@section('title', 'Actores')
@section('content_header')
    <h1>{{__('Mostrar actor')}}</h1>
@stop

@section('content')
    @include('Actors.formulario')
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('input[type=submit]').css('display','none');
        });
    </script>
@stop

