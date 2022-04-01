@extends('adminlte::page')
@section('title', 'Peliculas')
@section('content_header')
    <h1>{{__('Editar peliculas')}}</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
@stop


@section('content')
    {{ Form::open(array('route' => array('movies.update', $movie->id), 'method' => 'post')) }}
        {{ Form::token() }}
        {{ method_field('PUT') }}
        @include('Movies.formulario')
    {{ Form::close() }}
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>


    <script>
        $(document).ready(function() {
            $('#multi-actors, #multi-genres').multiselect({
                nonSelectedText: '{{ __('Selecciona') }}',
                allSelectedText: '{{ __('Todos seleccionados') }}',
                nSelectedText: '{{ __('seleccionados') }}',
                filterPlaceholder: '{{ __('Buscar') }}',
                selectAllText: '{{__('Seleccionar todos')}}',
                includeSelectAllOption: true,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '30%',
                maxHeight: 300,
            });
        });
    </script>

@stop
