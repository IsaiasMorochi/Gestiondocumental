<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <select name="estado" class="form-control" id="estado" >
    @foreach (json_decode('Activo,Inactivo', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($permisodepartamento->estado) && $permisodepartamento->estado == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $permisodepartamento->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_departamento') ? 'has-error' : ''}}">
    <label for="id_departamento" class="col-md-4 control-label">{{ 'Id Departamento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_departamento" type="number" id="id_departamento" value="{{ $permisodepartamento->id_departamento or ''}}" >
        {!! $errors->first('id_departamento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_permiso') ? 'has-error' : ''}}">
    <label for="id_permiso" class="col-md-4 control-label">{{ 'Id Permiso' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_permiso" type="number" id="id_permiso" value="{{ $permisodepartamento->id_permiso or ''}}" >
        {!! $errors->first('id_permiso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
