<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ $historial->fecha or ''}}" required>
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('hora') ? 'has-error' : ''}}">
    <label for="hora" class="col-md-4 control-label">{{ 'Hora' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="hora" type="time" id="hora" value="{{ $historial->hora or ''}}" required>
        {!! $errors->first('hora', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('descripcionM') ? 'has-error' : ''}}">
    <label for="descripcionM" class="col-md-4 control-label">{{ 'Descripcionm' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="descripcionM" type="text" id="descripcionM" value="{{ $historial->descripcionM or ''}}" >
        {!! $errors->first('descripcionM', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $historial->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_documento') ? 'has-error' : ''}}">
    <label for="id_documento" class="col-md-4 control-label">{{ 'Id Documento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_documento" type="number" id="id_documento" value="{{ $historial->id_documento or ''}}" >
        {!! $errors->first('id_documento', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
