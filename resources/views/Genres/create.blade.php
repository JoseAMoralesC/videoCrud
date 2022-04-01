@extends('adminlte::page')
@section('title', 'Generos')
@section('content_header')
    <h1>{{__('Añadir genero')}}</h1>
@stop

@section('content')
    {{ Form::open(array('route' => 'genres.store', 'method' => 'post')) }}
        {{ Form::token() }}
        @include('Genres.formulario')
    {{ Form::close() }}
@stop

