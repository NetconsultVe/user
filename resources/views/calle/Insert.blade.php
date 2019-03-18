@extends('layouts.Modals.ModalInsert')
@section('contentModalInsert')
<div class="box-body">
    <div class="form-group">
        <label>Nombre Calle</label>
        <input class="form-control input-sm ctrUpdate" type="text" placeholder="" id='txt_nombrecalleNew' >
    </div>
    <div class="divEncuesta">
        <div class="form-group">
            <input class="swMayor" type="checkbox" name="sw-AguaNew" id="sw-AguaNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-AguaNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-AguaNew" class="[ btn btn-default active ]">Servicio de Agua Potable</label>
            </div>
            <input class="swMayor" type="checkbox" name="sw-GasNew" id="sw-GasNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-GasNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-GasNew" class="[ btn btn-default active ]">Servicio de Gas</label>
            </div>
        </div>
        <div class="form-group">
            <input class="swMayor" type="checkbox" name="sw-VialidadNew" id="sw-VialidadNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-VialidadNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-VialidadNew" class="[ btn btn-default active ]">Vialidad</label>
            </div>
            <input class="swMayor" type="checkbox" name="sw-ElectricidadNew" id="sw-ElectricidadNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-ElectricidadNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-ElectricidadNew" class="[ btn btn-default active ]">Electricidad</label>
            </div>
        </div>
        <div class="form-group">
            <input class="swMayor" type="checkbox" name="sw-TransporteNew" id="sw-TransporteNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-TransporteNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-TransporteNew" class="[ btn btn-default active ]">Transporte Publico</label>
            </div>
            <input class="swMayor" type="checkbox" name="sw-CloacasNew" id="sw-CloacasNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-CloacasNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-CloacasNew" class="[ btn btn-default active ]">Aguas Servidas</label>
            </div>
        </div>
        <div class="form-group">
            <input class="swMayor" type="checkbox" name="sw-TelefonoNew" id="sw-TelefonoNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-TelefonoNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-TelefonoNew" class="[ btn btn-default active ]">Telefono</label>
            </div>
            <input class="swMayor" type="checkbox" name="sw-InternetNew" id="sw-InternetNew" autocomplete="off" />
            <div class="[ btn-group ]">
                <label for="sw-InternetNew" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                <label for="sw-InternetNew" class="[ btn btn-default active ]">Internet</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Cedula Responsable:</label>
        <div class="input-group input-group-sm">
            <div class="input-group-addon"><i>V-</i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate" placeholder="Ej: 12123123" id='txt_cedresponsableNew'>
            <span class="input-group-btn"><button type="button" class="btn btn-primary btn-flat"  id="btnSearchCedNew"><i class="fa fa-binoculars"></i></button></span>
        </div>
    </div>
    <div class="form-group">
    <label>Nombre del Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control input-sm ctrUpdate" type="text" placeholder="" id="txt_nombreresponsableNew" disabled="">
        </div>
    </div>
    <div class="form-group">
        <label>Direccion del Responsable</label>
        <textarea class="form-control" rows="3" placeholder="" id="txt_dirresponsableNew"></textarea>
    </div>
    <div class="form-group">
        <label>Teléfono del Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-mobile-phone"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate" placeholder="(____) ___-____" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" id="txt_teleppalNew">
        </div>
    </div>
    <div class="form-group">
        <label>Correo Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
            <input type="email" class="form-control input-sm ctrUpdate" placeholder="Email" id="txt_emailrespNew">
            <div class="input-group-addon btnAt"><i class="fa fa-at btnAt"></i></div>
        </div>
    </div>
</div>
@endsection

@section('footerModalInsert')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary" id="btnCalleNew">Crear Calle</button>
@endsection