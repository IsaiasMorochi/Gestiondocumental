@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Departamento</div>
                    <div class="panel-body">

                        <?php
                        error_reporting(E_ALL and E_NOTICE);
                        session_start();
                        $a=$_SESSION['privbotonesmodulo3'];?>
                        @foreach($a as $aa)
                            @if($aa->id == 16 and $aa->i == 1)
                        <a href="{{ url('SitioCompartido/GestionarDepartamento/create') }}" class="btn btn-success btn-sm" title="Add New Departamento">
                            <i class="fa fa-plus" aria-hidden="true"></i> Crear Nuevo
                        </a>
                                @endif
                            @endforeach

                        <form method="GET" action="{{ url('/departamento') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Id Institucion</th><th>Institucion</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($departamento as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->idins }}</td>
                                        <td>{{ $item->nombreins }}</td>
                                        <td>
                                            <?php
                                            error_reporting(E_ALL and E_NOTICE);
                                            session_start();
                                            $a=$_SESSION['privbotonesmodulo3'];?>
                                            @foreach($a as $aa)
                                                @if($aa->id == 16 and $aa->m == 1)
                                            <a href="{{ url('/SitioCompartido/GestionarDepartamento/' . $item->id . '/edit') }}" title="Edit Departamento"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                                    @endif
                                                @endforeach

                                                <?php
                                                error_reporting(E_ALL and E_NOTICE);
                                                session_start();
                                                $a=$_SESSION['privbotonesmodulo3'];?>
                                                @foreach($a as $aa)
                                                    @if($aa->id == 16 and $aa->e == 1)
                                            <form method="POST" action="{{ url('/SitioCompartido/GestionarDepartamento' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Departamento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                                    @endif
                                                @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
