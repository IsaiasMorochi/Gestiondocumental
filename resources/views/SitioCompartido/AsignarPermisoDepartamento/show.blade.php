@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">PermisoDepartamento {{ $permisodepartamento->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/permiso-departamento') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/permiso-departamento/' . $permisodepartamento->id . '/edit') }}" title="Edit PermisoDepartamento"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('permisodepartamento' . '/' . $permisodepartamento->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete PermisoDepartamento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $permisodepartamento->id }}</td>
                                    </tr>
                                    <tr><th> Estado </th><td> {{ $permisodepartamento->estado }} </td></tr><tr><th> Id Institucion </th><td> {{ $permisodepartamento->id_institucion }} </td></tr><tr><th> Id Departamento </th><td> {{ $permisodepartamento->id_departamento }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
