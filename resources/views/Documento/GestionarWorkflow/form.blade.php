
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $workflow->descripcion or ''}}" required>
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('porcentaje') ? 'has-error' : ''}}">
    <label for="porcentaje" class="col-md-4 control-label">{{ 'Porcentaje de Inicio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="porcentaje" type="text" id="porcentaje" value="{{ $workflow->porcentaje or ''}}" required>
        {!! $errors->first('porcentaje', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fechaI') ? 'has-error' : ''}}">
    <label for="fechaI" class="col-md-4 control-label">{{ 'Fecha de Inicio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fechaI" type="date" id="fechaI" value="{{ $workflow->fechaI or ''}}" required>
        {!! $errors->first('fechaI', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fechaF') ? 'has-error' : ''}}">
    <label for="fechaF" class="col-md-4 control-label">{{ 'Fecha de Fin' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fechaF" type="date" id="fechaF" value="{{ $workflow->fechaF or ''}}" required>
        {!! $errors->first('fechaF', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('prioridad') ? 'has-error' : ''}}">
    <label for="prioridad" class="col-md-4 control-label">{{ 'Prioridad' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="prioridad" type="text" id="prioridad" value="{{ $workflow->prioridad or ''}}" required>
        {!! $errors->first('prioridad', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('id_documento') ? 'has-error' : ''}}">
    <label for="id_documento" class="col-md-4 control-label">{{ 'Documento' }}</label>
    <div class="col-md-6">
        <select class="form-control select-picker" name="id_documento" data-live-search="true">
            @foreach($documentos as $doc)
                <option value="{{$doc->id}}">{{$doc->descripcion}}</option>
            @endforeach
        </select>
        {!! $errors->first('id_documento', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
