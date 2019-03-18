@extends('layouts.app')

@section('content')
<div id="div-imgLogin">
    <img id="img-imgLogin" src="../img/BuqueEscuela.jpg" class="img-responsive" alt="Cinque Terre">
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7"></div>
        <div class="col-md-5">
            <div class="panel panel-default" id="div-formLogin">
                {{-- <div class="panel-heading">Recuperar Contraseña</div> --}}

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>Correo Electronico</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
