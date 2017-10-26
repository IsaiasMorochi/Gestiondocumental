<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    <label for="cargo" class="col-md-4 control-label">{{ 'Cargo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cargo" type="text" id="cargo" value="{{ $detallesitio->cargo or ''}}" required>
        {!! $errors->first('cargo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estadoU') ? 'has-error' : ''}}">
    <label for="estadoU" class="col-md-4 control-label">{{ 'Estadou' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estadoU" type="number" id="estadoU" value="{{ $detallesitio->estadoU or ''}}" required>
        {!! $errors->first('estadoU', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $detallesitio->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_comentario') ? 'has-error' : ''}}">
    <label for="id_comentario" class="col-md-4 control-label">{{ 'Id Comentario' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_comentario" type="number" id="id_comentario" value="{{ $detallesitio->id_comentario or ''}}" >
        {!! $errors->first('id_comentario', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_users') ? 'has-error' : ''}}">
    <label for="id_users" class="col-md-4 control-label">{{ 'Id Users' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_users" type="number" id="id_users" value="{{ $detallesitio->id_users or ''}}" >
        {!! $errors->first('id_users', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_sitio') ? 'has-error' : ''}}">
    <label for="id_sitio" class="col-md-4 control-label">{{ 'Id Sitio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_sitio" type="number" id="id_sitio" value="{{ $detallesitio->id_sitio or ''}}" >
        {!! $errors->first('id_sitio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
