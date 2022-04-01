@extends('adminlte::page')
@section('title', 'Generos')
@section('content_header')
    <h1>{{__('Mostrar genero')}}</h1>
@stop

@section('content')
    @include('Genres.formulario')
@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('input[type=submit]').css('display','none');
        });
    </script>
@stop
