@extends('layouts.Modals.ModalUpdate')
@section('contentModalUpdate')
<div class="box-body">
    <div class="form-group">
        <label>Nombre Calle</label>
        <input class="form-control input-sm ctrUpdate" type="text" placeholder="" id='txt_nombrecalleUp' >
    </div>
    <div class="divEncuesta">
            <div class="form-group">
                <input class="swMayor" type="checkbox" name="sw-AguaUp" id="sw-AguaUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-AguaUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-AguaUp" class="[ btn btn-default active ]">Servicio de Agua Potable</label>
                </div>
                <input class="swMayor" type="checkbox" name="sw-GasUp" id="sw-GasUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-GasUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-GasUp" class="[ btn btn-default active ]">Servicio de Gas</label>
                </div>
            </div>
            <div class="form-group">
                <input class="swMayor" type="checkbox" name="sw-VialidadUp" id="sw-VialidadUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-VialidadUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-VialidadUp" class="[ btn btn-default active ]">Vialidad</label>
                </div>
                <input class="swMayor" type="checkbox" name="sw-ElectricidadUp" id="sw-ElectricidadUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-ElectricidadUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-ElectricidadUp" class="[ btn btn-default active ]">Electricidad</label>
                </div>
            </div>
            <div class="form-group">
                <input class="swMayor" type="checkbox" name="sw-TransporteUp" id="sw-TransporteUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-TransporteUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-TransporteUp" class="[ btn btn-default active ]">Transporte Publico</label>
                </div>
                <input class="swMayor" type="checkbox" name="sw-CloacasUp" id="sw-CloacasUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-CloacasUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-CloacasUp" class="[ btn btn-default active ]">Aguas Servidas</label>
                </div>
            </div>
            <div class="form-group">
                <input class="swMayor" type="checkbox" name="sw-TelefonoUp" id="sw-TelefonoUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-TelefonoUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-TelefonoUp" class="[ btn btn-default active ]">Telefono</label>
                </div>
                <input class="swMayor" type="checkbox" name="sw-InternetUp" id="sw-InternetUp" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label for="sw-InternetUp" class="[ btn btn-default ]"><span class="[ glyphicon glyphicon-ok ]"></span><span></span></label>
                    <label for="sw-InternetUp" class="[ btn btn-default active ]">Internet</label>
                </div>
            </div>
        </div>
    <div class="form-group">
        <label>Cedula Responsable:</label>
        <div class="input-group input-group-sm">
            <div class="input-group-addon"><i>V-</i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate" placeholder="Ej: 12123123" id='txt_cedresponsableUp'>
            <span class="input-group-btn"><button type="button" class="btn btn-primary btn-flat"  id="btnSearchCedUp"><i class="fa fa-binoculars"></i></button></span>
        </div>
    </div>
    <div class="form-group">
    <label>Nombre del Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input class="form-control input-sm ctrUpdate" type="text" placeholder="" id="txt_nombreresponsableUp" disabled="">
        </div>
    </div>
    <div class="form-group">
        <label>Direccion del Responsable</label>
        <textarea class="form-control" rows="3" placeholder="" id="txt_dirresponsableUp"></textarea>
    </div>
    <div class="form-group">
        <label>Teléfono del Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-mobile-phone"></i></div>
            <input type="text" class="form-control input-sm input-number ctrUpdate" placeholder="(____) ___-____" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="" id="txt_teleppalUp">
        </div>
    </div>
    <div class="form-group">
        <label>Correo Responsable:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
            <input type="email" class="form-control input-sm ctrUpdate" placeholder="Email" id="txt_emailrespUp">
            <div class="input-group-addon btnAt"><i class="fa fa-at btnAt"></i></div>
        </div>
    </div>
</div>
@endsection

@section('footerModalUpdate')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary" id="btnCalleUp">Actualizar Calle</button>
@endsection