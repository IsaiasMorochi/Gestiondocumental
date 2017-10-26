<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $departamento->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if($grupo->g ==1)

    <div class="form-group">
            <label for="id_institucion" class="col-md-4 control-label">{{ 'Institucion' }}</label>
        <div class="col-md-6">
        <select name="id_institucion" class="form-control selectpicker" data-live-search="true" id="id_institucion" >
            @foreach($idInstitucion as $ins)
                <option value="{{$ins->id}}">{{$ins->nombre}}</option>
            @endforeach
        </select>
        </div>
    </div>
@else
    <div hidden class="form-group {{ $errors->has('id_institucion') ? 'has-error' : ''}}">
        <label for="id_institucion" class="col-md-4 control-label">{{ 'Id Institucion' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="id_institucion" type="text" id="id_institucion" value="{{ $idInstitucion->id}}">
            {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group">
        <label  class="col-md-4 control-label">{{ 'Institucion' }}</label>
        <div class="col-md-6">
            <input class="form-control" type="text" value="{{ $idInstitucion->nombre or 'nada'}}" disabled>
        </div>
    </div>
@endif



<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
