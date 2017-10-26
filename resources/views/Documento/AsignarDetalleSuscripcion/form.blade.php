<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <select name="estado" class="form-control" id="estado" >
    @foreach (json_decode('Activa,Inactiva', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($detallesuscripcion->estado) && $detallesuscripcion->estado == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $detallesuscripcion->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_suscripcion') ? 'has-error' : ''}}">
    <label for="id_suscripcion" class="col-md-4 control-label">{{ 'Id Suscripcion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_suscripcion" type="number" id="id_suscripcion" value="{{ $detallesuscripcion->id_suscripcion or ''}}" >
        {!! $errors->first('id_suscripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_documento') ? 'has-error' : ''}}">
    <label for="id_documento" class="col-md-4 control-label">{{ 'Id Documento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_documento" type="number" id="id_documento" value="{{ $detallesuscripcion->id_documento or ''}}" >
        {!! $errors->first('id_documento', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
