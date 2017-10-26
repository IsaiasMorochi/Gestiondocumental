<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ $detallecontenido->fecha or ''}}" required>
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $detallecontenido->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_documento') ? 'has-error' : ''}}">
    <label for="id_documento" class="col-md-4 control-label">{{ 'Id Documento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_documento" type="number" id="id_documento" value="{{ $detallecontenido->id_documento or ''}}" >
        {!! $errors->first('id_documento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_directorio') ? 'has-error' : ''}}">
    <label for="id_directorio" class="col-md-4 control-label">{{ 'Id Directorio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_directorio" type="number" id="id_directorio" value="{{ $detallecontenido->id_directorio or ''}}" >
        {!! $errors->first('id_directorio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_sitio') ? 'has-error' : ''}}">
    <label for="id_sitio" class="col-md-4 control-label">{{ 'Id Sitio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_sitio" type="number" id="id_sitio" value="{{ $detallecontenido->id_sitio or ''}}" >
        {!! $errors->first('id_sitio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
