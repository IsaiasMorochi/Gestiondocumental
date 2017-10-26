<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $workflowusuario->descripcion or ''}}" required>
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-4 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ $workflowusuario->fecha or ''}}" required>
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="number" id="id_institucion" value="{{ $workflowusuario->id_institucion or ''}}" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_workflow') ? 'has-error' : ''}}">
    <label for="id_workflow" class="col-md-4 control-label">{{ 'Id Workflow' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_workflow" type="number" id="id_workflow" value="{{ $workflowusuario->id_workflow or ''}}" >
        {!! $errors->first('id_workflow', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_users') ? 'has-error' : ''}}">
    <label for="id_users" class="col-md-4 control-label">{{ 'Id Users' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_users" type="number" id="id_users" value="{{ $workflowusuario->id_users or ''}}" >
        {!! $errors->first('id_users', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
