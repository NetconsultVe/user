@extends('layouts.adminlte')
@section('content')
<div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Perfil de usuario</div>
              <div class="panel-body">
                  <div class="form-group">
                      <!-- aquí va el contenido-->
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>Registro actualizado con éxito</strong>
                      </div>
                      @endif @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> Hubo algunos problemas al actualizar el registro.
                          <br>
                          <br>
                          <ul>
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif
                  </div>
                  <div class="center-block">
                      <div class="profile-header-container">
                          <div class="profile-header-img">
                              <img width="100px" class="img-circle" src="storage/avatars/{{ $user->avatar }}" />
                              <!-- badge -->
                              <div class="rank-label-container">
                                  {{-- <span class="label label-default rank-label">{{$user->name}}</span> --}}
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="center-block">
                      <form action="profile" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="form-group">
                              <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                              <small id="fileHelp" class="form-text text-muted">El tamaño de la imagen no debe ser mayor de 2MB.</small>
                          </div>
  
                          <!-- aquí va el contenido del Ususario --->
  
                          <div class="form-group">
                              <label>Teléfono Principal:</label>
                              <strong class="form-text text-danger"> {{ $errors->first('tele_ppal') }}</strong>
                              <input type="text" class=" form-control" name="tele_ppal" value="{{ $user->tele_ppal }}">
                          </div>
  
                          <div class="form-group">
                              <label>Correo Electrónico:</label>
                              <strong class="form-text text-danger"> {{ $errors->first('email') }}</strong>
                              <input type="mail" class=" form-control" name="email" value="{{ $user->email }}">
                          </div>
  
                          <div class="form-group">
                              <label>Dirección:</label>
                              <strong class="form-text text-danger"> {{ $errors->first('dir') }}</strong>
                              <textarea class="form-control rounded-0" name="dir" rows="3" placeholder="Indique su dirección exacta, más n° de casa y/o punto de referencia">{{ $user->dir }}
                              </textarea>
                          </div>
                          <!-- Fín del Contenido -->
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Actualizar</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- Fin del Contenido -->
      </div>
  </div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/dist/netInit.js?ver=0.00003&jsModule=jsPerfil&cssModule=') }}"></script>
@endsection