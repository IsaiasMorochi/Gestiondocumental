@extends('layouts.adminU')

@section('contenido')
    {{--<div class="container">--}}
       {{--<h3>AQUI HAY UNA LISTA DE REPORTES DEFINIDOS LISTOS PARA VISUALIZAR</h3>--}}
    {{--</div>--}}


    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado de Reportes</div>


                    {{--inicio body--}}
                    <div class="panel-body">
                        <?php
                        error_reporting(E_ALL and E_NOTICE);
                        session_start();
                        $a=$_SESSION['privbotonesmodulo9'];?>
                        @foreach($a as $aa)
                            @if($aa->id == 5 and $aa->i == 1)
                        <a href="{{ url('/admin/GenerarReporte/create') }}" class="btn btn-success btn-sm" title="Add New Categorium">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                                @endif
                            @endforeach

                        <form method="GET" action="{{ url('/categoria') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                    <th>#</th>
                                    <th>Descripcion</th>
                                    <th>Ver</th>
                                    <th>Descargar</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr><h3></h3>
                                    <td>1</td>
                                    <td>Reporte Predefinido</td>
                                    <td><a href="plantilla/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                                    <td><a href="plantilla/2" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                                </tr>
                                {{--@foreach($categoria as $item)--}}
                                {{--<tr>--}}
                                {{--<td>{{ $loop->iteration or $item->id }}</td>--}}
                                {{--<td>{{ $item->descripcion }}</td><td>{{ $item->id_institucion }}</td>--}}
                                {{--<td>--}}
                                {{--<a href="{{ url('/categoria/' . $item->id) }}" title="View Categorium"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--}}
                                {{--<a href="{{ url('/categoria/' . $item->id . '/edit') }}" title="Edit Categorium"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                                {{--<form method="POST" action="{{ url('/categoria' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<button type="submit" class="btn btn-danger btn-xs" title="Delete Categorium" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                                {{--</form>--}}


                                {{--</td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
                                </tbody>
                            </table>
                            {{--<div class="pagination-wrapper"> {!! $reportes->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                        </div>

                    </div>
                    {{--end body--}}



                </div>
            </div>
        </div>
    </div>
@endsection
