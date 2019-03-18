@extends('layouts.Modals.ModalInsert')
@section('contentModalInsert')
<div class="box-body">
    <div class="form-group">
        <label>Cedula:</label>
        <div class="input-group input-group-sm">
            <div class="input-group-addon"><i>V-</i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate1" placeholder="Ej: 12123123" id='txt_cedresponsableMayor'>
            <span class="input-group-btn"><button type="button" class="btn btn-primary btn-flat"  id="btnSearchCedMayor"><i class="fa fa-binoculars"></i></button></span>
        </div>
    </div>
    <div class="form-group">
    <label>Nombre:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control input-sm ctrUpdate1" type="text" placeholder="" id="txt_nombreresponsableMayor" disabled="">
        </div>
    </div>
    <div class="form-group">
        <label>Teléfono:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-mobile-phone"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate1" placeholder="(____) ___-____" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" id="txt_teleppalMayor">
        </div>
    </div>
    @include('familia.EncuestaMayor')
</div>
@endsection

@section('footerModalInsert')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary" id="btnComunidadMayor">Asignar Ciudadano al Grupo</button>
@endsection