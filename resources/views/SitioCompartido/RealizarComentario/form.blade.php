<div class="form-group {{ $errors->has('contenido') ? 'has-error' : ''}}">
    <label for="contenido" class="col-md-4 control-label">{{ 'Contenido' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="contenido" type="text" id="contenido" value="{{ $comentario->contenido or ''}}" required>
        {!! $errors->first('contenido', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $comentario->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_users') ? 'has-error' : ''}}">
    <label for="id_users" class="col-md-4 control-label">{{ 'Id Users' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_users" type="number" id="id_users" value="{{ $comentario->id_users or ''}}" >
        {!! $errors->first('id_users', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
