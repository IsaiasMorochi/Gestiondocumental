   @extends('layouts.adminU')
@section('contenido')
   <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear un Nuevo WorkFlow</div>
                    <div class="panel-body">
                        <a href="{{ url('Documento/GestionarWorkflow') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('Documento/sendnotificacion') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="idworkflow" value="{{$idworkflow}}">
                            @foreach($nameWork as $name )
                            <input type="hidden" name="nameWork" value="{{$name->descripcion}}">
                            @endforeach
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="iddescripcion">Descripcion</label>
                                        <input type="text" name="iddescripcion" id="iddescripcion" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="idusuario">Usuario</label>
                                        <select class="form-control selectpicker" id="pidusuario" name="pidusuario" data-live-search="true">
                                            @foreach($usuarios as $usuario)
                                                <option value="{{$usuario->id}}">{{$usuario->nombre}} {{$usuario->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                            </div>
                            </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <table id="detalles" class="table table-striped table-hover">
                                    <thead>
                                    <th>Opciones</th>
                                    <th>Decripcion</th>
                                    <th>Usuario</th>
                                    </thead>
                                    <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <button class="btn tbn-primary" type="submit">Enviar</button>
                                            <button class="btn btn-danger" type="reset">Cancelar</button>
                                        </div>
                                    </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scriptasignacion')
<script>
        $(document).ready(
            function(){
                $('#bt_add').click(
                    function(){
                        agregar();
                    }
                );
            }
        );
        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();

        function agregar(){
            descrip = $("#iddescripcion").val();
            nusuario = $("#pidusuario option:selected").text();
            idusuario = $("#pidusuario").val();
            if(descrip!=""){
                var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');" >X</button></td><td><input type="hidden" name="descripcion[]" value="'+descrip+'">'+descrip+'</td><td><input type="hidden" name="usuarios[] " value="'+idusuario+'">'+nusuario+'</td></tr>';
                cont++;
                verificar();
                //limpiar();
                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar el detalle de ingreso, revise los datos");
            }
        }
        function limpiar(){
            $("#piddescripcion").val("");
        }

        function verificar(){
            if(cont>0)
                $("#guardar").show();
            else
                $("#guardar").hide();
        }
        function eliminar(index){
            $("#fila" + index).remove();
            verificar();
        }
    </script>
@endpush
@endsection
