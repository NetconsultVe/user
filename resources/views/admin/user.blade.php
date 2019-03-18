@extends('layouts.app') 
@section('css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/css/jquery.dataTables.min.css" /> 

@endsection

@section('content')

               <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Ususarios</div>
            <div class="modal-footer"><a href="">Agregar Usuario</a></div>
            <div class="panel-body">
 		<table class="table" id="table_id">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Usuario</td>
                            <td>Estatus</td>
                            <td>Email</td>
                            <td>Valida Email</td>
                            <td>Tele-Ppal</td>
                            <td>Valida sms</td>
                            <td>operaciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)

                        <tr>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->username}}</td>
                            <td>
                                @if ($usuario->active ===1) Activo @else Bloqueado @endif
                            </td>
                            <td>{{$usuario->email}}</td>

                            <td>
                                @if ($usuario->verified ===1) Validado @else No Validado @endif
                            </td>
                            <td>{{$usuario->tele_ppal}}</td>
                            <td>
                                @if ($usuario->valid_sms ===1) Validado @else No Validado @endif
                            </td>
                            <td>
                            @if ($usuario->active ===1) <a href="">Bloquear</a> @else <a href="">Activar</a> @endif
                                
                                <a href="">eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
	    </div>
	</div>
</div>


@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.11/js/jquery.dataTables.min.js" integrity="sha256-QsI0RV9OdAJlkRMXL7W7Av/LxctBvfVRzOlX1NEaZKQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/adminUser.js') }}"></script>
@endsection
