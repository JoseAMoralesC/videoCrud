@extends('adminlte::page')
@section('title', 'Peliculas')
@section('content_header')
    <h1>{{__('Editar peliculas')}}</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
@stop


@section('content')
        <div class="card card-info card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-movies-tab" data-toggle="pill" href="{{ route('movies.edit', $movie->id) }}" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">{{ __('Editar') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-actors-tab" data-toggle="pill" href="{{ route('movies.editActorList', $movie->id) }}" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">{{ __('Actores') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-genres-tab" data-toggle="pill" href="{{ route('movies.editGenreList', $movie->id) }}" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">{{ __('Generos') }}</a>
                    </li>
                </ul>
            </div>
        <div class="card card-body">
                {{ Form::open(array('route' => array('movies.update', $movie->id), 'method' => 'post')) }}
                {{ Form::token() }}
                {{ method_field('PUT') }}
                @include('Movies.formulario')
                {{ Form::close() }}
        </div>
    </div>
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

            $('#custom-tabs-four-tab > li > a').click(function(){
                let ruta = $(this).attr('href');
                let ruta_actual = window.location.href;
                if(ruta != ruta_actual) window.location.href = ruta;
            });
        });
    </script>

@stop
