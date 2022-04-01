@extends('adminlte::page')
@section('title', 'Peliculas')
@section('content_header')
    <h1>{{__('Mostrar peliculas')}}</h1>
@stop

@section('content')
    @include('Movies.formulario')
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('input[type=submit]').css('display','none');
        });
    </script>
@stop
