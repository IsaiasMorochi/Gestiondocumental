@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">WorkflowUsuario {{ $workflowusuario->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/workflow-usuario') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/workflow-usuario/' . $workflowusuario->id . '/edit') }}" title="Edit WorkflowUsuario"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('workflowusuario' . '/' . $workflowusuario->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete WorkflowUsuario" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $workflowusuario->id }}</td>
                                    </tr>
                                    <tr><th> Descripcion </th><td> {{ $workflowusuario->descripcion }} </td></tr><tr><th> Fecha </th><td> {{ $workflowusuario->fecha }} </td></tr><tr><th> Id Institucion </th><td> {{ $workflowusuario->id_institucion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
