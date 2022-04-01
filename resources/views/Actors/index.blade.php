@extends('adminlte::page')
@section('title', 'Actores')
@section('content_header')
    <h1>{{__('Actores')}}</h1>
@stop

@section('content')
    <a href="{{ route('actors.create') }}" class="btn btn-success"><i class="fa fa-fw fa-plus-square"></i></a><br/><br/>

    <table class="table table-striped" id="tabla-de-actores">
        <thead class="thead-dark">
        <tr>
            <th>{{__('#')}}</th>
            <th>{{__('Nombre')}}</th>
            <th>{{__('1º Apellido')}}</th>
            <th>{{__('2º Apellido')}}</th>
            <th>{{ __('Fecha nacimiento') }}</th>
            <th>{{ __('Acciones') }}</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    @include('modal.modal')
@stop

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/1.1.1/js/bootstrap-multiselect.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        function fill_datatable() {
            miTabla = $('#tabla-de-actores').DataTable({
                "order": [[0, "desc"]],
                "stateSave": true,
                "serverSide": true,
                "processing": true,
                "bJQueryUI": true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "{{__('Todos')}}"]],
                "ajax": {
                    url: "{{ route('actors.indexServerSite') }}",
                    method: "get",
                }, "columns": [
                    {data: 'id', 'className': 'text-center'},
                    {data: 'name', 'className': 'text-center'},
                    {data: 'last_name1', 'className': 'text-center', "orderable": true, "searchable": true},
                    {data: 'last_name2', 'className': 'text-center', "orderable": true, "searchable": true},
                    {data: 'birth_date', 'className': 'text-center', "orderable": true, "searchable": true},
                    {data:null,'className':'text-center',render: function ( data, type, row){
                            return "" +
                                "<a href='/actors/show/"+data.id+"' class='btn btn-info'><i class='fa fa-fw fa-eye'></i></a> "+
                                "<a href='/actors/"+data.id+"/edit' class='btn btn-warning'><i class='fa fa-fw fa-edit'></i></a> "+
                                "<button type='button' id='"+data.id+"' onclick='deleteActor("+data.id+")' class='btn btn-danger enviar-modal' data-toggle='modal' data-target='#exampleModal'><i class='fa fa-fw fa-eraser'></i></button>";
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
        function deleteActor(id){
            let cabecera = $("#exampleModal .modal-title");
            let cuerpo = $("#exampleModal .modal-body");

            cabecera.html('Eliminar actor');
            cuerpo.html('Esta seguro de que quiere eliminar al actor?');
            $('#modal-form-delete').attr('action', '/actors/destroy/'+id);
        }

        $(document).ready( function () {
            fill_datatable();

            /*$.ajax({
                type: 'get',
                url: '{{ route('actors.indexServerSite') }}',
                success: function (data) {
                    console.log(data);
                }
            });*/
           // $('table').DataTable();


            $('#tabla-de-actores tbody .enviar-modal').click(function(){
                alert();
                let id = $(this).attr("id");
                let cabecera = $("#exampleModal .modal-title");
                let cuerpo = $("#exampleModal .modal-body");

                alert(id);

                cabecera.html('Eliminar actor');
                cuerpo.html('Esta seguro de que quiere eliminar al actor?');
                $('#modal-form-delete').attr('action', '/actors/destroy/'+id);
            });
        });
    </script>
@stop
