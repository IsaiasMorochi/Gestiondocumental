<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $institucion->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nit') ? 'has-error' : ''}}">
    <label for="nit" class="col-md-4 control-label">{{ 'Nit' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nit" type="number" id="nit" value="{{ $institucion->nit or ''}}" required>
        {!! $errors->first('nit', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    {!! Form::label('estado', 'Estado', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('estado', ['Activa'=>'Activa', 'Inactiva'=>'Inactiva'], null, ['class' => 'form-control','placeholder'=>'Elija un opcion...']) !!}
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    {!! Form::label('tipo', 'Tipo', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('tipo', ['Privada'=>'Privada', 'Publica'=>'Publica'], null, ['class' => 'form-control','placeholder'=>'Elija un opcion...']) !!}
        {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
