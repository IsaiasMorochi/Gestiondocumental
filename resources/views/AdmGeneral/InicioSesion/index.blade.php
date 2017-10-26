@extends('layouts.app')
@section('content')


    {!!Form::open(array('url'=>'iniciodesesion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
    {{Form::token()}}




        {{--<div class="row">--}}
            {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="email">Nombre de Combo</label>--}}
                    {{--<input type="email" name="email" required value="" class="form-control" placeholder="Descripcion....">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="password">Precio</label>--}}
                    {{--<input type="password" name="password" required value="" class="form-control" placeholder="Precio....">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">--}}
                {{--<div class="form-group">--}}
                    {{--<input name="_token" value="{{csrf_token()}}" type="hidden"></input>--}}
                    {{--<button class="btn btn-primary" type="submit">Guardar</button>--}}
                    {{--<button class="btn btn-danger" type="reset">Cancelar</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}







    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {!!Form::close()!!}
@endsection