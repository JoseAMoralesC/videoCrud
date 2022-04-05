@extends('adminlte::page')
@section('title', 'Peliculas')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
@stop

@section('content_header')
    <h1>{{__('Peliculas')}}</h1>
@stop

@section('content')
    <a href="{{ route('movies.create') }}" class="btn btn-success"><i class="fa fa-fw fa-plus-square"></i></a><br/><br/>

    <div class="box box-default box-solid collapsed-box" style="margin-top:40px;">
        <div class="box-header with-border">
            <h3 class="box-title">{{__('Filtros')}}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            </div>
        </div>

        <div class="box-body">
            {{ Form::open(array('route' => 'movies.indexServerSite', 'method' => 'get')) }}

            <div class="row p-2">
                <div class="form-group p-2">
                    {{ Form::label('nationality_id', __('Nacionalidad'), array('class' => 'control-label') ) }}
                    <div class="col-auto" id="fillList">
                        {{ Form::select('nationality_id[]', $data['nationalities'], isset($data['filter']['nationality_id']) ? $data['filter']['nationality_id'] : null, array('class' => 'form-control', 'id' => 'fillNationality', 'multiselect' => 'multiple', 'multiple' => __('Selecciona una nacionalidad'))) }}
                    </div>
                </div>
            </div>

            <div id="externaly_triggered_wrapper-controls">
                <div>
                    <button type="submit" id="filtrarBuscar" class="btn btn-success"><i class="fa fa-filter"></i>{{ __('Filtrar') }}</button>
                    <button class="btn btn-success resetBuscar"><i class="fa fa-refresh"></i> {{ __('Restablecer') }}</button>
                </div>
            </div>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            {{Form::close()}}
        </div>
    </div><br/><br/>

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

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        function datatableReload() {
            let nationality = $('#fillNationality').val();

            $('table').DataTable().destroy();
            fill_datatable(nationality);
            $('table').DataTable().page(1).draw(false);
        }

        function fill_datatable(nationality) {
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
                        nationality_id: nationality
                    }
                }, "columns": [
                    {data: 'id', 'className': 'text-center'},
                    {data: 'title', 'className': 'text-center'},
                    {data:null,
                        render: function(data){
                            if(data.img != null){
                                return "<img src='"+data.img+"' alt='Portada' />";
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
            fill_datatable('');

            $('#filtrarBuscar').click(function(e){
                e.preventDefault();
                datatableReload();
            });

            $('.resetBuscar').click(function(e){
                e.preventDefault();
                $('#fillNationality').val('');
                datatableReload();
            });

            $('#fillNationality').multiselect({
                nonSelectedText: '{{ __('Selecciona una nacionalidad') }}',
                allSelectedText: '{{ __('Todos seleccionados') }}',
                nSelectedText: '{{ __('seleccionados') }}',
                filterPlaceholder: '{{ __('Buscar') }}',
                selectAllText: '{{__('Seleccionar todos')}}',
                includeSelectAllOption: true,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '100%',
                maxHeight: 300,
            });
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
