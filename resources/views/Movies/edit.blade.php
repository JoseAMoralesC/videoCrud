@extends('adminlte::page')
@section('title', 'Peliculas')
@section('content_header')
    <h1>{{__('Editar peliculas')}}</h1>
@stop

@section('content')
    {{ Form::open(array('route' => array('movies.update', $movie->id), 'method' => 'post')) }}
        {{ Form::token() }}
        {{ method_field('PUT') }}
        @include('Movies.formulario')
    {{ Form::close() }}
@stop

