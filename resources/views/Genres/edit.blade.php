@extends('adminlte::page')
@section('title', 'Generos')
@section('content_header')
    <h1>{{__('Editar genero')}}</h1>
@stop

@section('content')
    {{ Form::open(array('route' => array('genres.update', $genre->id), 'method' => 'post')) }}
        {{ Form::token() }}
        {{ method_field('PUT') }}
        @include('Genres.formulario')
    {{ Form::close() }}
@stop

