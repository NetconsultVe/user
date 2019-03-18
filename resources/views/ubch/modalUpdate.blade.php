@extends('layouts.modal')
@section('contentModal')
<div class="box-body">
    <div class="form-group">
        <label>Cedula Responsable:</label>
        <div class="input-group input-group-sm">
            <div class="input-group-addon"><i>V-</i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate" placeholder="Ej: 12123123" id='txt_cedresponsable'>
            <span class="input-group-btn"><button type="button" class="btn btn-primary btn-flat"  id="btnSearchCed"><i class="fa fa-binoculars"></i></button></span>
        </div>
    </div>
    <div class="form-group">
    <label>Nombre del Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control input-sm ctrUpdate" type="text" placeholder="" id=txt_nombreresponsable disabled="">
        </div>
    </div>
    <div class="form-group">
        <label>Direccion del Responsable</label>
        <textarea class="form-control" rows="3" placeholder="" id='txt_dirresponsable'></textarea>
    </div>
    <div class="form-group">
        <label>Teléfono del Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-mobile-phone"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate" placeholder="(____) ___-____" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" id="txt_teleppal">
        </div>
    </div>
    <div class="form-group">
        <label>Correo Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
            <input type="email" class="form-control input-sm ctrUpdate" placeholder="Email" id="txt_emailresp">
            <div class="input-group-addon btnAt"><i class="fa fa-at btnAt"></i></div>
        </div>
    </div>
</div>
@endsection

@section('footerModal')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary" id="btnUpdate">Guardar Cambios</button>
@endsection