@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><span class="label label-info">REPORTES</span></h3></div>
                    <div class="panel-body">
                        <a href="{{ url('/reporteadmg') }}" title="Back">
                            <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <br/>
                        <br/>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="porlets-content">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="select"><h3><span class="label label-info">Seleccione</span></h3></label>
                                    <select name="selectid" id="selectid" class="form-control">
                                        <option value="-1">-Seleccione-</option>
                                        <option value="1">-Reportes de Documentos-</option>
                                        <option value="2">-Reportes de Sitios-</option>
                                        <option value="3">-Reportes de Usuarios-</option>
                                        <option value="4">-Reportes de Workflow-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row" id="doc" style="display: none">
                                <form method="POST" action="{{ url('/docsReport') }}" accept-charset="UTF-8"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @include('Herramienta.GenerarReporte.formDoc',["categorias"=>$categorias,"estados"=>$estados])
                                </form>
                            </div>
                            <div class="row" id="sitio" style="display: none">
                                <form method="POST" action="{{ url('/docsReport') }}" accept-charset="UTF-8"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @include('Herramienta.GenerarReporte.formSitio')
                                </form>
                            </div>
                            <div class="row" id="user" style="display: none">
                                <form method="POST" action="{{ url('/docsReport') }}" accept-charset="UTF-8"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @include('Herramienta.GenerarReporte.formUser')
                                </form>
                            </div>
                            <div class="row" id="work" style="display: none">
                                <form method="POST" action="{{ url('/docsReport') }}" accept-charset="UTF-8"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @include('Herramienta.GenerarReporte.formWorkflow')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scriptReport')
<script>
    $(document).ready(
        function () {
            $('#selectid').change(
                function () {
                    var valorCambiado = $(this).val();
                    if ((valorCambiado == '1')){
                        $('#doc').css('display', 'block');
                        $('#sitio').css('display', 'none');
                        $('#user').css('display', 'none');
                        $('#work').css('display', 'none');
                    }
                    if ((valorCambiado == '2')){
                        $('#doc').css('display', 'none');
                        $('#sitio').css('display', 'block');
                        $('#user').css('display', 'none');
                        $('#work').css('display', 'none');
                    }
                    if ((valorCambiado == '3')){
                        $('#doc').css('display', 'none');
                        $('#sitio').css('display', 'none');
                        $('#user').css('display', 'block');
                        $('#work').css('display', 'none');
                    }
                    if ((valorCambiado == '4')){
                        $('#doc').css('display', 'none');
                        $('#sitio').css('display', 'none');
                        $('#user').css('display', 'none');
                        $('#work').css('display', 'block');
                    }

                }
            );
        }
    );
</script>
@endpush