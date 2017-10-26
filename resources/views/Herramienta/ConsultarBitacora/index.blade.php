@extends('layouts.adminU')
@section('contenido')

<div class = "row">

</div>
<h3></h3>
<div class="panel panel-primary">
    <div class="panel-body">
        <div class = "row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th>#</th>
                        <th>OPERACION</th>
                        <th>TABLA</th>
                        <th>HORA</th>
                        <th>USUARIO</th>
                        </thead>
                        @foreach ($producto as $product)
                        <tr>
                            <td>{{$product['id_bitacora']}}</td>
                            <td>{{$product['operacion']}}</td>
                            <td>{{$product['tabla']}}</td>
                            <td>{{$product['hora']}}    </td>
                            <td>{{$product['usuario']}}    </td>
                        </tr>
                        @endforeach
                    </table>




                    </table>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
