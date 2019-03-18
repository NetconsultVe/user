@extends('layouts.Modals.ModalUpdate')
@section('contentModalUpdate')
<div class="box-body">
    <div class="form-group">
        <label>Cedula:</label>
        <div class="input-group input-group-sm">
            <div class="input-group-addon"><i>V-</i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate3" placeholder="Ej: 12123123" id='txt_cedresponsableMenorC'>
        </div>
    </div>
    <div class="form-group">
    <label>Nombre:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control input-sm ctrUpdate3" type="text" placeholder="" id="txt_nombreresponsableMenorC">
        </div>
    </div>
    <div><label>Seleccione una Sexo</label><select id='cmb-sexoMenorC1'class="form-control"><option value='' disabled selected>SELECCIONE UN OPCIÓN</option><option value='M'>MASCULINO</option><option value='F'>FEMENINO</option></select></div>
    <div class="form-group">
        <label>Fecha de Nacimiento:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate3" placeholder="YYYY-MM-DD" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" id="txt_FechNaclMenorC">
        </div>
    </div>
    @include('familia.EncuestaMenorC')
</div>
@endsection

@section('footerModalUpdate')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary" id="btnComunidadMenorC">Asignar Ciudadano al Grupo</button>
@endsection