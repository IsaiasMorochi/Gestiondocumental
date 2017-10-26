<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <select name="estado" class="form-control" id="estado" >
    @foreach (json_decode('Activo,Inactivo', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($grupoprivilegio->estado) && $grupoprivilegio->estado == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $grupoprivilegio->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_grupo') ? 'has-error' : ''}}">
    <label for="id_grupo" class="col-md-4 control-label">{{ 'Id Grupo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_grupo" type="number" id="id_grupo" value="{{ $grupoprivilegio->id_grupo or ''}}" >
        {!! $errors->first('id_grupo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_privilegio') ? 'has-error' : ''}}">
    <label for="id_privilegio" class="col-md-4 control-label">{{ 'Id Privilegio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_privilegio" type="number" id="id_privilegio" value="{{ $grupoprivilegio->id_privilegio or ''}}" >
        {!! $errors->first('id_privilegio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
