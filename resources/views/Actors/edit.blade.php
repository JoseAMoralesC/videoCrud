@extends('adminlte::page')
@section('title', 'Actores')
@section('content_header')
    <h1>{{__('Añadir actor')}}</h1>
@stop

@section('content')
    {{ Form::open(array('route' => array('actors.update', $actor->id), 'method' => 'post')) }}
        {{ Form::token() }}
        {{ method_field('PUT') }}
        @include('Actors.formulario')
    {{ Form::close() }}
@stop

