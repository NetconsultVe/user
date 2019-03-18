@extends('layouts.Modals.ModalUpdate1')
@section('contentModalUpdate1')
<div class="box-body">
    <div class="form-group">
        <label>Folio:</label>
        <div class="input-group input-group-sm">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate2" placeholder="" id='txt_FolioMenor'>
        </div>
    </div>
    <div class="form-group">
        <label>Nro de la Partida de Nacimiento:</label>
        <div class="input-group input-group-sm">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate2" placeholder="" id='txt_NroPartidaMenor'>
        </div>
    </div>
    <div class="form-group">
    <label>Nombre:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control input-sm ctrUpdate2" type="text" placeholder="" id="txt_nombreresponsableMenor">
        </div>
    </div>
    <div><label>Seleccione una Sexo</label><select id='cmb-sexoMenor1'class="form-control"><option value='' disabled selected>SELECCIONE UN OPCIÓN</option><option value='M'>MASCULINO</option><option value='F'>FEMENINO</option></select></div>
    <div class="form-group">
        <label>Fecha de Nacimiento:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate2" placeholder="YYYY-MM-DD" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" id="txt_FechNaclMenor">
        </div>
    </div>
    @include('familia.EncuestaMenor')
</div>
@endsection

@section('footerModalUpdate1')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary" id="btnComunidadMenor">Asignar Ciudadano al Grupo</button>
@endsection