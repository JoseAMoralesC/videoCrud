@extends('adminlte::page')
@section('title', 'Administracion')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
@stop

@section('content_header')
    <h1>Panel de control</h1>
@stop

@section('content')
    <table class="table table-striped" id="tabla-de-inicio">
        <thead class="thead-dark">
        <tr>
            <th>{{__('Pelicula')}}</th>
            <th>{{__('Nacionalidad')}}</th>
            <th>{{__('Mostrar generos')}}</th>
            <th>{{__('Mostrar actores')}}</th>
            <th>{{ __('Fecha estreno') }}</th>
            <th>{{ __('Duracion') }}</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@stop

@section('js')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabla-de-inicio').DataTable({
                "stateSave": true,
                "serverSide": true,
                "ajax": {
                    url: "{{ route('home.indexAjax') }}",
                },
                "columns": [
                    {data: 'title', 'className': 'text-center'},
                    {data: 'nationality', 'className': 'text-left'},
                    {data: null,
                        render: function(data,type,row,meta){
                            return data.genres.map((v,i,a) => {
                                if((a.length-1) - i > 0){
                                    return v.name+', ';
                                }
                                return v.name;
                            });
                        }
                    },
                    {data: null,
                        render: function(data){
                            return data.actors.map((v,i,a) =>{
                                let n_completo = v.last_name2 != null ? v.name+' '+v.last_name1+' '+v.last_name2 : v.name+' '+v.last_name1;
                                console.log(n_completo);
                                if((a.length-1) - i > 0) {
                                     return n_completo;
                                }
                                    return n_completo;
                            });
                        }
                    },
                    {data: 'release'},
                    {data: 'duration'},
                ],
                "oLanguage": {
                    "sProcessing":     "{{__('Procesando...')}}",
                    "sLengthMenu":     "{{__('Mostrar _MENU_ registros')}}",
                    "sZeroRecords":    "{{__('No se encontraron resultados')}}",
                    "sEmptyTable":     "{{__('Ningún dato disponible en esta tabla')}}",
                    "sInfo":           "{{__('Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros')}}",
                    "sInfoEmpty":      "{{__('Mostrando registros del 0 al 0 de un total de 0 registros')}}",
                    "sInfoFiltered":   "{{__('(filtrado de un total de _MAX_ registros)')}}",
                    "sInfoPostFix":    "",
                    "sSearch":         "{{__('Buscar:')}}",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "{{__('Cargando...')}}",
                    "oPaginate": {
                        "sFirst":    "{{__('Primero')}}",
                        "sLast":     "{{__('Último')}}",
                        "sNext":     "{{__('Siguiente')}}",
                        "sPrevious": "{{__('Anterior')}}"
                    },
                    "oAria": {
                        "sSortAscending":  "{{__(': Activar para ordenar la columna de manera ascendente')}}",
                        "sSortDescending": "{{__(': Activar para ordenar la columna de manera descendente')}}"
                    },
                    "buttons": {
                        "copy": "{{__('Copiar')}}",
                        "colvis": "{{__('Visibilidad')}}"
                    }
                }
            });
        });
    </script>
@stop
