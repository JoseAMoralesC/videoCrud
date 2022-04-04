@extends('adminlte::page')
@section('title', 'Administracion')

@section('content_header')
    <h1>Panel de control</h1>
@stop

@section('content')
    <table class="table table-striped" id="tabla-de-actores">
        <thead class="thead-dark">
        <tr>
            <th>{{__('#')}}</th>
            <th>{{__('Pelicula')}}</th>
            <th>{{__('1º Apellido')}}</th>
            <th>{{__('2º Apellido')}}</th>
            <th>{{ __('Fecha nacimiento') }}</th>
            <th>{{ __('Acciones') }}</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@stop

@section('css')

@stop

@section('js')

@stop
