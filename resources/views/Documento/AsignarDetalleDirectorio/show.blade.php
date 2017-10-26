@extends('layouts.adminU')

@section('contenido')
    <div class="container">
        <div class="row">
           

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">DirectorioDocumento {{ $directoriodocumento->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/directorio-documento') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/directorio-documento/' . $directoriodocumento->id . '/edit') }}" title="Edit DirectorioDocumento"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('directoriodocumento' . '/' . $directoriodocumento->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete DirectorioDocumento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $directoriodocumento->id }}</td>
                                    </tr>
                                    <tr><th> Fecha </th><td> {{ $directoriodocumento->fecha }} </td></tr><tr><th> Id Institucion </th><td> {{ $directoriodocumento->id_institucion }} </td></tr><tr><th> Id Directorio </th><td> {{ $directoriodocumento->id_directorio }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
