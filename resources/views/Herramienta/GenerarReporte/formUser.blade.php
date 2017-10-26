<div class="row">
    <div class="panel panel-info">
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="checkbox">
                            <input name="todos" type="checkbox" value="">
                            <label>Todos los Usuarios</label>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <label for="usuarios">Usuarios</label>
                        <select name="usuarios" id="" class="form-control">
                            <option value="-1">-Ninguno-</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="docdesde">Doc. creados desde:</label>
                    <input class="form-control" type="date" name="docdesde">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="dochasta">Hasta la Fecha</label>
                        <input type="date" class="form-control" name="dochasta">
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="workflow">Workflow</label>
                    <select name="workflow" id="" class="form-control">
                        <option value="-1">-Creados-</option>
                        <option value="0">-Participacion-</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="sitios">Sitios</label>
                    <select name="sitios" id="" class="form-control">
                        <option value="-1">-Creados-</option>
                        <option value="0">-Participacion-</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            </div>
            <div class="form-group">
                <button class="btn btn-warning" type="submit" >Generar</button>
            </div>
        </div>
    </div>
</div>