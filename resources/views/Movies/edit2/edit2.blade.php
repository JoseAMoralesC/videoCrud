@extends('adminlte::page')
@section('title', 'Peliculas')
@section('content_header')
    <h1>{{__('Editar peliculas')}}</h1>
@stop

@section('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"/>
@stop


@section('content')
    <div class="card card-primary card-outline card-tabs">
        <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item" id="tab-movies">
                    <a class="nav-link active" id="custom-tabs-three-movies-tab" data-toggle="pill" href="#custom-tabs-three-movies" role="tab" aria-controls="custom-tabs-three-movies" aria-selected="true">{{ __('Editar') }}</a>
                </li>
                <li class="nav-item" id="tab-actors">
                    <a class="nav-link" id="custom-tabs-three-actors-tab" data-toggle="pill" href="#custom-tabs-three-actors" role="tab" aria-controls="custom-tabs-three-actors" aria-selected="false">{{ __('Actores') }}</a>
                </li>
                <li class="nav-item" id="tab-genres">
                    <a class="nav-link" id="custom-tabs-three-genres-tab" data-toggle="pill" href="#custom-tabs-three-genres" role="tab" aria-controls="custom-tabs-three-genres" aria-selected="false">{{ __('Generos') }}</a>
                </li>

            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-three-movies" role="tabpanel" aria-labelledby="custom-tabs-three-movies-tab">

                </div>
                <div class="tab-pane fade" id="custom-tabs-three-actors" role="tabpanel" aria-labelledby="custom-tabs-three-actors-tab">
                    <p>Actores</p>
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-genres" role="tabpanel" aria-labelledby="custom-tabs-three-genres-tab">
                    <p>generos</p>
                </div>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

    <script>
        function callAjax(ruta, pintar){
            $.ajax({
                url: ruta,
                type:'get',
                success: function (data) {
                    $(pintar).html(data);
                },
                statusCode: {

                },
                error:function(x,xs,xt){
                    //nos dara el error si es que hay alguno
                    window.open(JSON.stringify(x));
                    //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                }
            });
        }

        $(document).ready(function () {
            callAjax('{{ $rutaMovies }}', "#custom-tabs-three-movies");

            $('#multi-actors, #multi-genres').multiselect({
                nonSelectedText: '{{ __('Selecciona') }}',
                allSelectedText: '{{ __('Todos seleccionados') }}',
                nSelectedText: '{{ __('seleccionados') }}',
                filterPlaceholder: '{{ __('Buscar') }}',
                selectAllText: '{{__('Seleccionar todos')}}',
                includeSelectAllOption: true,
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '30%',
                maxHeight: 300,
            });

            $('#custom-tabs-three-tab > li > a').click(function () {
                let opc = $(this).parent().attr('id');
                let ruta = "";
                let pintar = "";

                switch (opc) {
                    case 'tab-actors':
                        ruta = '{{ $rutaActors }}';
                        pintar = "#custom-tabs-three-actors";
                        break;
                    case 'tab-genres':
                        ruta = '{{ $rutaGenres }}';
                        pintar = "#custom-tabs-three-genres";
                        break;
                    default:
                        ruta = '{{ $rutaMovies }}';
                        pintar = "#custom-tabs-three-movies";
                        break;
                }
                callAjax(ruta,pintar);
            });
        });
    </script>

@stop
