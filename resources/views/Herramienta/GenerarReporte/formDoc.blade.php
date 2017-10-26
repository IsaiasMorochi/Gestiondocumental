<div class="row">
    <div class="panel panel-info">
        <div class="panel-body">
                <div class="fom-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="checkbox">
                            <input type="checkbox" value="" id="checkTodos">
                            <label>Todos los Doc.</label>
                        </div>
                    </div>
                </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="fom-group">
                    <label for="extension">Extension</label>
                    <select name="extension" id="" class="form-control">
                        <option value=".docx">-Word-</option>
                        <option value=".xls">-Excel-</option>
                        <option value=".pdf">-PDF-</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="fom-group">
                    <label for="version">Version Minima</label>
                    <select name="version" id="" class="form-control">
                        <option value="1">1.0</option>
                        <option value="2">2.0</option>
                        <option value="3">3.0</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="fom-group">
                    <label for="estado">Estado</label>
                    <select name="estado" id="" class="form-control">
                        @foreach($estados as $estado)
                            <option value="{{$estado->id}}">-{{$estado->descripcion}}-</option>
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="fom-group">
                    <label for="cateogoria">Categoria</label>
                    <select name="categoria" id="" class="form-control">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">-{{$categoria->descripcion}}-</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            </div>
            <div class="form-group">
                {{--<button class="btn btn-warning" type="submit" >Generar</button>--}}
                <a href="plantilla/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>