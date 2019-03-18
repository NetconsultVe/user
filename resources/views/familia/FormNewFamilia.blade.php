<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-12" id="panelFormNewFamilia" z-index="0">
        <div class="panel panel-default">
            <div class="panel-heading">Jefe de Familia</div>
            <div class="box-body">
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
                    <textarea class="form-control ctrUpdate" rows="3" placeholder="" id="txt_dirresponsableNew"></textarea>
                </div>
                <div class="form-group">
                    <label>Nro Casa:</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input class="form-control input-sm ctrUpdate" type="text" placeholder="" id="txt_casaRefNew" >
                    </div>
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
            @include('familia.Encuesta')
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnbackNucleoFamilia">Regesar</button>
                <button type="button" class="btn btn-primary" id="btnUpNucleoFamilia">Actualizar Jefe de Familia</button>
                <button type="button" class="btn btn-primary" id="btnAddNucleoFamilia">Crear Nucleo Familiar</button>
                <div class="btn-group">
                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" id="SelAddIntegrante">Agregar Nucleo Familiar <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="" id="optMayor">Cdno Mayor de Edad</a></li>
                        <li><a href="" id="optMenorC">Cdno Menor de Edad Cedulado</a></li>
                        <li><a href="" id="optMenor">Cdno Menor de Edad No Cedulado</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12" id="panelGridNucleo">
                <div class="panel panel-default">
                    <div class="panel-heading">Registros Nucleo Familiar</div>
                    <div class="panel-body">
                        <table id="GridFamilia" class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
