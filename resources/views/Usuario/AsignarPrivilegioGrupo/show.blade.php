@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">GrupoPrivilegio {{ $grupoprivilegio->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/grupo-privilegio') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/grupo-privilegio/' . $grupoprivilegio->id . '/edit') }}" title="Edit GrupoPrivilegio"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('grupoprivilegio' . '/' . $grupoprivilegio->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete GrupoPrivilegio" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $grupoprivilegio->id }}</td>
                                    </tr>
                                    <tr><th> Estado </th><td> {{ $grupoprivilegio->estado }} </td></tr><tr><th> Id Institucion </th><td> {{ $grupoprivilegio->id_institucion }} </td></tr><tr><th> Id Grupo </th><td> {{ $grupoprivilegio->id_grupo }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
