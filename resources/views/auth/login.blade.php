@extends('layouts.app')
@section('content')
<div id="div-imgLogin">
    <img id="img-imgLogin" src="img/BuqueEscuela.jpg" class="img-responsive" alt="Cinque Terre">
</div>
<div class="container">
        
    <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-5 panel panel-default" id="div-formLogin">
            {{-- <div class="panel-heading">Login</div> --}}
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('login') ? ' has-error' : '' }}">
                        <label>E-Mail o Usuario</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input id="login" type="login" class="form-control" name="login" value="{{ old('login') }}" required autofocus placeholder=""> @if ($errors->has('login'))
                        </div>
                        <div><span class="help-block"><strong>{{ $errors->first('login') }}</strong></span> @endif</div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input id="password" type="password" class="form-control" name="password" required placeholder=""> @if ($errors->has('password'))
                        </div>
                        <div><span class="help-block"><strong>{{ $errors->first('password') }}</strong></span> @endif</div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">Recuperar Contraseña</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection