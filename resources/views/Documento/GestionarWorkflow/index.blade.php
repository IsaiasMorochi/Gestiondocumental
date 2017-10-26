@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Workflow</div>
                    <div class="panel-body">

                        <?php
                        error_reporting(E_ALL and E_NOTICE);
                        session_start();
                        $a=$_SESSION['privbotonesmodulo2'];?>
                        @foreach($a as $aa)
                            @if($aa->id == 7 and $aa->i == 1)
                        <a href="{{ url('Documento/GestionarWorkflow/create') }}" class="btn btn-success btn-sm" title="Add New Workflow">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                                @endif
                            @endforeach

                        <form method="GET" action="{{ url('/workflow') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                        <th>#</th><th>Descripcion</th><th>Porcentaje</th><th>FechaI</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($workflow as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->descripcion }}</td><td>{{ $item->porcentaje }}</td><td>{{ $item->fechaI }}</td>
                                        <td>
                                           <a href="{{ url('Documento/asignacion/' . $item->id . '') }}" title="Edit Workflow"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Asignar</button></a>

                                            <?php
                                            error_reporting(E_ALL and E_NOTICE);
                                            session_start();
                                            $a=$_SESSION['privbotonesmodulo2'];?>
                                            @foreach($a as $aa)
                                                @if($aa->id == 7 and $aa->m == 1)
                                            <a href="{{ url('Documento/workflow/' . $item->id . '/edit') }}" title="Edit Workflow"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                @endif
                                            @endforeach

                                            <?php
                                            error_reporting(E_ALL and E_NOTICE);
                                            session_start();
                                            $a=$_SESSION['privbotonesmodulo2'];?>
                                            @foreach($a as $aa)
                                                @if($aa->id == 7 and $aa->e == 1)
                                            <form method="POST" action="{{ url('Documento/workflow' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Workflow" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
