<div class="modal fade modal-slide-in-right" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-privilegio-{{$item->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Asigne los privilegios para este grupo</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">

                                    {!! Form::open(array('url'=>'privilegio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                                    {!! Form::token()!!}
                                    <table class='table table-striped table-hover '>
                                        <thead>
                                        <tr class='active'>
                                            <th width='60%'>Casos de Uso</th>
                                            <th>Insertar</th>
                                            <th>Eliminar</th>
                                            <th>Modificar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($casos as $caso)
                                            <tr>
                                                <td>{{$caso->nombre}}</td>
                                                <td align="center"><input type="checkbox" value="{{$caso->id}}"  name="insert[]"/></td>
                                                <td align="center"><input type="checkbox" value="{{$caso->id}}"  name="edit[]"/></td>
                                                <td align="center"><input type="checkbox" value="{{$caso->id}}"  name="delete[]"/></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <button class="btn tbn-primary" type="submit">Guardar</button>
                                            <button class="btn btn-danger" type="reset">Cancelar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="idgrupo" value="{{$item->id}}">

                                    {!! Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    $(document).ready(function() {
        //set initial state.
        function pasardato(id){
            console.log(id);
            alert(id);
        }
    });
</script>
@endpush