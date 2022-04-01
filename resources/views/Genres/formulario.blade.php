<div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
    {{ Form::label('name', __('Nombre'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::text('name', isset($genre->name) ? $genre->name : null, array('placeholder' => __('Nombre del genero'))) }}
    </div>
    {!! $errors->first('name','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <a href="{{ route('genres.index') }}" class="btn btn-danger">Volver</a>
   {{ Form::submit(__('Enviar'), array('class' => 'btn btn-success')) }}
</div>
