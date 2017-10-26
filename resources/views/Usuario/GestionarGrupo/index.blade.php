@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Grupo</div>
                    <div class="panel-body">

                        <?php
                        error_reporting(E_ALL and E_NOTICE);
                        session_start();
                        $a=$_SESSION['privbotonesmodulo4'];?>
                        @foreach($a as $aa)
                            @if($aa->id == 24 and $aa->i == 1)
                        <a href="{{ url('/grupo/create') }}" class="btn btn-success btn-sm" title="Add New Grupo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir
                        </a>
                                @endif
                            @endforeach

                        <form method="GET" action="{{ url('/grupo') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
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
                                        <th>Identificador</th><th>Descripcion</th><th>Id Institucion</th><th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grupos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->descripcion }}</td><td>{{ $item->id_institucion }}</td>
                                        <td>
                                            <?php
                                            error_reporting(E_ALL and E_NOTICE);
                                            session_start();
                                            $a=$_SESSION['privbotonesmodulo4'];?>
                                            @foreach($a as $aa)
                                                @if($aa->id == 24 and $aa->m == 1)
                                            <a href="{{ url('/grupo/' . $item->id . '/edit') }}" title="Edit Grupo"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                                    @endif
                                                @endforeach
                                            <a href="" data-target="#modal-privilegios-{{$item->id}}" data-toggle="modal"><button class="btn btn-primary btn-xs"><i class="fa fa-key" aria-hidden="true"></i>Privilegios </button></a>

                                                <?php
                                                error_reporting(E_ALL and E_NOTICE);
                                                session_start();
                                                $a=$_SESSION['privbotonesmodulo4'];?>
                                                @foreach($a as $aa)
                                                    @if($aa->id == 24 and $aa->e == 1)
                                            <form method="POST" action="{{ url('/grupo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Grupo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                                    @endif
                                                @endforeach
                                            @include('Usuario.GestionarGrupo.privilegios',["casos"=>$casos])
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
