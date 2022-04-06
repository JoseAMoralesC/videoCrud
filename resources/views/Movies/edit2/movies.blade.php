
{{ Form::open(array('route' => array('movies.update', $movie->id), 'method' => 'post')) }}
    {{ Form::token() }}
    {{ method_field('PUT') }}
    @include('Movies.formulario')
{{ Form::close() }}

<script>
    $(document).ready(function () {
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
    });
</script>



