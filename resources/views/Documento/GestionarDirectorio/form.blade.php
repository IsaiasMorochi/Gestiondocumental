<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $directorio->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $directorio->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_directorio') ? 'has-error' : ''}}">
    <label for="id_directorio" class="col-md-4 control-label">{{ 'Id Directorio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_directorio" type="number" id="id_directorio" value="{{ $directorio->id_directorio or ''}}" >
        {!! $errors->first('id_directorio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
