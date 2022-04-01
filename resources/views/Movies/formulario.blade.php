<div class="form-group" {{ $errors->has('title') ? 'has-error' : '' }}>
    {{ Form::label('title', __('Titulo'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::text('title', isset($movie->title) ? $movie->title : null, array('placeholder' => __('Titulo de la pelicula'))) }}
    </div>
    {!! $errors->first('title','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{ $errors->has('synopsis') ? 'has-error' : '' }}>
    {{ Form::label('synopsis', __('Sinopsis'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::textarea('synopsis', isset($movie->synopsis) ? $movie->synopsis : null, array('placeholder' => __('Sinopsis de la pelicula'))) }}
    </div>
    {!! $errors->first('synopsis','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{ $errors->has('nationality') ? 'has-error' : '' }}>
{{ Form::label('nationality', __('Nacionalidad'), array('class' => 'control-label')) }}
<div class="col-auto">
    {{ Form::text('nationality', isset($movie->nationality) ? $movie->nationality : null, array('placeholder' => __('Nacionalidad de la pelicula'))) }}
</div>
{!! $errors->first('nationality','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{ $errors->has('duration') ? 'has-error' : '' }}>
    {{ Form::label('duration', __('Duracion (Mints.)'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::text('duration', isset($movie->duration) ? $movie->duration : null, array('placeholder' => __('Duracion de la pelicula'))) }}
    </div>
    {!! $errors->first('duration','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{ $errors->has('release') ? 'has-error' : '' }}>
    {{ Form::label('release', __('Fecha de estreno'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::date('release', isset($movie->release) ? $movie->release : null) }}
    </div>
    {!! $errors->first('release','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {{Form::label('actor',__('Actores'),array('class' => 'control-label'))}}
    <div class="col-auto">
        {{ Form::select('actor[]', $actors, null, array('id'=> 'multi-actors', 'multiple'=>'multiple')) }}
    </div>
</div>

<div class="form-group">
    {{Form::label('genre',__('Generos'),array('class' => 'control-label'))}}
    <div class="col-auto">
        {{ Form::select('genre[]', $genres, null, array('id'=> 'multi-genres', 'multiple'=>'multiple')) }}
    </div>
</div>

<div class="form-group">
    <a href="{{ route('movies.index') }}" class="btn btn-danger">Volver</a>
   {{ Form::submit(__('Enviar'), array('class' => 'btn btn-success')) }}
</div>
