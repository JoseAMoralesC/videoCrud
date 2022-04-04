<div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
    {{ Form::label('name', __('Nombre'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::text('name', isset($actor->name) ? $actor->name : null, array('placeholder' => __('Nombre del actor'))) }}
    </div>
    {!! $errors->first('name','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{ $errors->has('last_name1') ? 'has-error' : '' }}>
    {{ Form::label('last_name1', __('1º Apellido'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::text('last_name1', isset($actor->last_name1) ? $actor->last_name1 : null , array('placeholder' => __('1º Apellido del actor'))) }}
    </div>
    {!! $errors->first('last_name1','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{ $errors->has('last_name2') ? 'has-error' : '' }}>
    {{ Form::label('last_name2', __('2º Apellido'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::text('last_name2', isset($actor->last_name2) ? $actor->last_name2 : null, array('placeholder' => __('2º Apellido del actor'))) }}
    </div>
    {!! $errors->first('last_name2','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" {{ $errors->has('birth_date') ? 'has-error' : '' }}>
    {{ Form::label('birth_date', __('Fecha de nacimiento'), array('class' => 'control-label')) }}
    <div class="col-auto">
        {{ Form::date('birth_date', isset($actor->birth_date) ? $actor->birth_date : null) }}
    </div>
    {!! $errors->first('birth_date','<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {{Form::label('nationality_id',__('Nacionalidad'),array('class' => 'control-label'))}}
    <div class="col-auto">
        {{ Form::select('nationality_id', $nationalities, isset($actor->nationality_id) ? $actor->nationality_id : null, array('id'=> 'multi-nationalities', 'placeholder'=>'Selecciona una nacionalidad')) }}
    </div>
</div>


<div class="form-group">
    <a href="{{ route('actors.index') }}" class="btn btn-danger">Volver</a>
   {{ Form::submit(__('Enviar'), array('class' => 'btn btn-success')) }}
</div>
