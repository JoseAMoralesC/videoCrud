{{ Form::open(array('route' => array('movies.update', $movie->id), 'method' => 'post')) }}
    {{ Form::token() }}
    {{ method_field('PUT') }}
    @include('Movies.formulario')
{{ Form::close() }}
