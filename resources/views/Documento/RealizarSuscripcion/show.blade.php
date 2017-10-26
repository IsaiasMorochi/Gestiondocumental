@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Suscripcion {{ $suscripcion->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/suscripcion') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/suscripcion/' . $suscripcion->id . '/edit') }}" title="Edit Suscripcion"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('suscripcion' . '/' . $suscripcion->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Suscripcion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $suscripcion->id }}</td>
                                    </tr>
                                    <tr><th> Descripcion </th><td> {{ $suscripcion->descripcion }} </td></tr><tr><th> Id Institucion </th><td> {{ $suscripcion->id_institucion }} </td></tr><tr><th> Id Users </th><td> {{ $suscripcion->id_users }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
