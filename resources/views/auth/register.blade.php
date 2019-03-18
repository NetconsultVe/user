@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Usuario</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required maxlength="15">

                                @if ($errors->has('username'))
                                <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_nivel') ? ' has-error' : '' }}">
                            <label for="id_nivel" class="col-md-4 control-label">Nivel de Usuario</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "id_nivel">
                                        <option value=”” disabled selected>Seleccione una Opción</option>
                                        <option value = '1'>Administrador</option>
                                        <option value = '0'>User</option>
                                    </select>
                                </div>
                        </div>


                        <input id="name" type="text" class="form-control" name="cod_mud" value="{{ old('cod_mud') }}">
                        <input id="name" type="text" class="form-control" name="cod_pq" value="{{ old('cod_pq') }}">
                        <input id="name" type="text" class="form-control" name="cod_ubch" value="{{ old('cod_ubch') }}">
                        <input id="name" type="text" class="form-control" name="cod_comun" value="{{ old('cod_comun') }}">
                        <input id="name" type="text" class="form-control" name="cod_manzana" value="{{ old('cod_manzana') }}">
                        <input id="name" type="text" class="form-control" name="cod_familia" value="{{ old('cod_familia') }}">
                        <input id="name" type="text" class="form-control" name="dir" value="{{ old('dir') }}">











                        <div class="form-group{{ $errors->has('tele_ppal') ? ' has-error' : '' }}">
                            <label for="tele_ppal" class="col-md-4 control-label">Teléfono Móvl Principal</label>
                                <div class="col-md-6">
                                    <input id="tele_ppal" type="text" class="form-control" name="tele_ppal" value="{{ old('tele_ppal') }}" >
                                </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
