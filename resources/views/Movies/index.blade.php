@extends('adminlte::page')
@section('title', 'Peliculas')

@section('content_header')
    <h1>{{__('Peliculas')}}</h1>
@stop

@section('content')
    <a href="{{ route('movies.create') }}" class="btn btn-success"><i class="fa fa-fw fa-plus-square"></i></a><br/><br/>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>{{__('ID')}}</th>
            <th>{{__('Titulo')}}</th>
            <th>{{__('Imagen')}}</th>
            <th>{{__('Sinopsis')}}</th>
            <th>{{__('Nacionalidad')}}</th>
            <th>{{ __('Estreno') }}</th>
            <th>{{ __('Duracion') }}</th>
            <th>{{__('Acciones')}}</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    @include('modal.modal')
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
@stop

@section('js')
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        function fill_datatable() {
            miTabla = $('table').DataTable({
                "order": [[0, "desc"]],
                "stateSave": true,
                "serverSide": true,
                "processing": true,
                "bJQueryUI": true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "{{__('Todos')}}"]],
                "ajax": {
                    url: "{{ route('movies.indexServerSite') }}",
                    method: "get",
                    data: {

                    }
                }, "columns": [
                    {data: 'id', 'className': 'text-center'},
                    {data: 'title', 'className': 'text-center'},
                    {data:null,
                        render: function(data){
                            if(data.img != null){
                                console.log(data.img);
                                return "<img src='"+data.img+"' alt='imagen pelicula' />";
                            }
                            return '';
                        }
                    },
                    {data: 'synopsis', 'className': 'text-center', "orderable": true, "searchable": true},
                    {data: 'nationality', 'className': 'text-center', "orderable": true, "searchable": true},
                    {data: 'release', 'className': 'text-center', "orderable": true, "searchable": true},
                    {data: 'duration', 'className': 'text-center', "orderable": true, "searchable": true},
                    {data:null,'className':'text-center',render: function ( data, type, row){
                            return "" +
                                "<a href='/movies/show/"+data.id+"' class='btn btn-info'><i class='fa fa-fw fa-eye'></i></a> "+
                                "<a href='/movies/"+data.id+"/edit' class='btn btn-warning'><i class='fa fa-fw fa-edit'></i></a> "+
                                "<button type='button' id='"+data.id+"' onclick='deleteMovie("+data.id+")' class='btn btn-danger enviar-modal' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-fw fa-eraser'></i></button>";
                        }},
                ],
                "oLanguage": {
                    "sProcessing": "{{__('Procesando...')}}",
                    "sLengthMenu": "{{__('Mostrar _MENU_ registros')}}",
                    "sZeroRecords": "{{__('No se encontraron resultados')}}",
                    "sEmptyTable": "{{__('Ningún dato disponible en esta tabla')}}",
                    "sInfo": "{{__('Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros')}}",
                    "sInfoEmpty": "{{__('Mostrando registros del 0 al 0 de un total de 0 registros')}}",
                    "sInfoFiltered": "{{__('(filtrado de un total de _MAX_ registros)')}}",
                    "sInfoPostFix": "",
                    "sSearch": "{{__('Buscar:')}}",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "{{__('Cargando...')}}",
                    "oPaginate": {
                        "sFirst": "{{__('Primero')}}",
                        "sLast": "{{__('Último')}}",
                        "sNext": "{{__('Siguiente')}}",
                        "sPrevious": "{{__('Anterior')}}"
                    },
                    "oAria": {
                        "sSortAscending": "{{__(': Activar para ordenar la columna de manera ascendente')}}",
                        "sSortDescending": "{{__(': Activar para ordenar la columna de manera descendente')}}"
                    },
                    "buttons": {
                        "copy": "{{__('Copiar')}}",
                        "colvis": "{{__('Visibilidad')}}"
                    }
                }
            });
        }
        function deleteMovie(id){
            let cabecera = $("#exampleModal .modal-title");
            let cuerpo = $("#exampleModal .modal-body");

            cabecera.html('Eliminar pelicula');
            cuerpo.html('Esta seguro de que quiere eliminar la pelicual?');
            $('#modal-form-delete').attr('action', '/movies/destroy/'+id);
        }

        $(document).ready( function () {
            fill_datatable();
            /*$('table').DataTable();

            $('table .enviar-modal').click(function(){
                let id = $(this).attr("id");
                let cabecera = $("#exampleModal .modal-title");
                let cuerpo = $("#exampleModal .modal-body");

                cabecera.html('Eliminar pelicula');
                cuerpo.html('Esta seguro de que quiere eliminar esta pelicula?');
                $('#modal-form-delete').attr('action', '/movies/destroy/'+id);
            });*/
        });
    </script>

@stop
