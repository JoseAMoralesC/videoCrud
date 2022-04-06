@extends('adminlte::page')
@section('title', 'Peliculas')
@section('content_header')
    <h1>{{__('Editar peliculas. Lista generos')}}</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
@stop

@section('content')
    <div class="card card-info card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-movies-tab" data-toggle="pill" href="{{ route('movies.edit', $movie->id) }}" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">{{ __('Editar') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-actors-tab" data-toggle="pill" href="{{ route('movies.editActorList', $movie->id) }}" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">{{ __('Actores') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-genres-tab" data-toggle="pill" href="{{ route('movies.editGenreList', $movie->id) }}" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">{{ __('Generos') }}</a>
                </li>
            </ul>
        </div>
        <div class="card card-body">
            <div class="tab-pane fade show active" id="custom-tabs-three-movies" role="tabpanel" aria-labelledby="custom-tabs-three-movies-tab"></div>
            <div class="tab-pane fade show active" id="custom-tabs-three-actors" role="tabpanel" aria-labelledby="custom-tabs-three-actors-tab"></div>

            <div class="tab-pane fade show active" id="custom-tabs-three-genres" role="tabpanel" aria-labelledby="custom-tabs-three-genres-tab">
                <ul>
                    @foreach($movie->genres as $genre)
                        <li>{{ $genre->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script>
        $(document).ready(function(){
            $('#custom-tabs-four-tab > li > a').click(function(){
                let ruta = $(this).attr('href');
                let ruta_actual = window.location.href;
                if(ruta != ruta_actual) window.location.href = ruta;
            });
        });
    </script>
@stop
