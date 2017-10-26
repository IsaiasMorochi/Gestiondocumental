
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">

<?php
    error_reporting(E_ALL and E_NOTICE);
    session_start();
    $a=$_SESSION['username'];?>
    <input type="hidden" value="{{$a->id_grupo}}" id="groupuser" name="groupuser"></input>
        <input class="form-control" name="nombre" type="text" id="nombre" value="" >
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Apellido' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="apellido" type="text" id="apellido" value="" >
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'genero' }}</label>
    <div class="col-md-6">
        <select name="genero">
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
    <label for="ci" class="col-md-4 control-label">{{ "CI" }}</label>
    <div class="col-md-6">
        <input class="form-control" name="ci" type="text" id="ci" value="" >
        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('id_dpto') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Departamentos' }}</label>
    <div class="col-md-6">
        <select name="id_dpto" id="id_dpto">
            @foreach($departamentos as $dep)
                <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                @endforeach
        </select>
        {!! $errors->first('id_dpto', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="email" id="id_institucion" value="" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="id_institucion" class="col-md-4 control-label">{{ 'Contraseña' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id_institucion" type="password" id="id_institucion" value="" >
        {!! $errors->first('id_institucion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>