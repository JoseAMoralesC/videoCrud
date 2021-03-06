@extends('adminlte::page')
@section('title', 'Generos')

@section('content_header')
    <h1>{{__('Generos de peliculas')}}</h1>
@stop

@section('content')
    <a href="{{ route('genres.create') }}" class="btn btn-success"><i class="fa fa-fw fa-plus-square"></i></a><br/><br/>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th>{{__('ID')}}</th>
            <th>{{__('Nombre')}}</th>
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
                    url: "{{ route('genres.indexServerSite') }}",
                    method: "get",
                }, "columns": [
                    {data: 'id', 'className': 'text-center'},
                    {data: 'name', 'className': 'text-center'},
                    {data:null,'className':'text-center',render: function ( data, type, row){
                            return "" +
                                "<a href='/genres/show/"+data.id+"' class='btn btn-info'><i class='fa fa-fw fa-eye'></i></a> "+
                                "<a href='/genres/"+data.id+"/edit' class='btn btn-warning'><i class='fa fa-fw fa-edit'></i></a> "+
                                "<button type='button' id='"+data.id+"' onclick='deleteGenre("+data.id+")' class='btn btn-danger enviar-modal' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-fw fa-eraser'></i></button>";
                        }},
                ],
                "oLanguage": {
                    "sProcessing": "{{__('Procesando...')}}",
                    "sLengthMenu": "{{__('Mostrar _MENU_ registros')}}",
                    "sZeroRecords": "{{__('No se encontraron resultados')}}",
                    "sEmptyTable": "{{__('Ning??n dato disponible en esta tabla')}}",
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
                        "sLast": "{{__('??ltimo')}}",
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
        function deleteGenre(id){
            let cabecera = $("#exampleModal .modal-title");
            let cuerpo = $("#exampleModal .modal-body");

            cabecera.html('Eliminar genero');
            cuerpo.html('Esta seguro de que quiere eliminar el genero?');
            $('#modal-form-delete').attr('action', '/genres/destroy/'+id);
        }

        $(document).ready( function () {
            fill_datatable();
           /* $('table').DataTable();

            $('table .enviar-modal').click(function(){
                let id = $(this).attr("id");
                let cabecera = $("#exampleModal .modal-title");
                let cuerpo = $("#exampleModal .modal-body");

                cabecera.html('Eliminar genero');
                cuerpo.html('Esta seguro de que quiere eliminar este genero??');
                $('#modal-form-delete').attr('action', '/genres/destroy/'+id);
            });*/
        });
    </script>
@stop
