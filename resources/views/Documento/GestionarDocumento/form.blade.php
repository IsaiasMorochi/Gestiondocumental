<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $documento->descripcion or ''}}" required>
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('extension') ? 'has-error' : ''}}">
    <label for="extension" class="col-md-4 control-label">{{ 'Extension' }}</label>
    <div class="col-md-6">
        <select name="extension" class="form-control" id="extension" >
    @foreach (json_decode('Pdf,Doc', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($documento->extension) && $documento->extension == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('extension', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $documento->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_documento') ? 'has-error' : ''}}">
    <label for="id_documento" class="col-md-4 control-label">{{ 'Id Documento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_documento" type="number" id="id_documento" value="{{ $documento->id_documento or ''}}" >
        {!! $errors->first('id_documento', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_categoria') ? 'has-error' : ''}}">
    <label for="id_categoria" class="col-md-4 control-label">{{ 'Id Categoria' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_categoria" type="number" id="id_categoria" value="{{ $documento->id_categoria or ''}}" >
        {!! $errors->first('id_categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_estado') ? 'has-error' : ''}}">
    <label for="id_estado" class="col-md-4 control-label">{{ 'Id Estado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_estado" type="number" id="id_estado" value="{{ $documento->id_estado or ''}}" >
        {!! $errors->first('id_estado', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_users') ? 'has-error' : ''}}">
    <label for="id_users" class="col-md-4 control-label">{{ 'Id Users' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_users" type="number" id="id_users" value="{{ $documento->id_users or ''}}" >
        {!! $errors->first('id_users', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
