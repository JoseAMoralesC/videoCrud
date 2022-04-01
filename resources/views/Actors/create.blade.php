@extends('adminlte::page')
@section('title', 'Actores')
@section('content_header')
    <h1>{{__('Añadir actor')}}</h1>
@stop

@section('content')
    {{ Form::open(array('route' => 'actors.store', 'method' => 'post')) }}
        {{ Form::token() }}
        @include('Actors.formulario')
    {{ Form::close() }}
@stop

