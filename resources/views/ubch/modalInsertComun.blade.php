@extends('layouts.Modals.ModalInsert')
@section('contentModalInsert')
<div class="box-body">
    <div class="form-group">
        <label>Nombre de la Comunidad:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-group"></i></div>
            <input class="form-control input-sm ctrUpdate" type="text" placeholder="" id=txt_NewComunidad >
            <button type="button" class="btn btn-primary" id="btnInsertComun">Agregar Comunidad</button>
        </div>        
    </div>
    
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Comunidades Existentes</div>
            <div class="panel-body">
                <table id="GridUbchomundades" class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre de la Comunidad</th>
                            <th id="thOperaciones">Operaciones</th>             
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre de la Comunidad</th>
                            <th id="thOperaciones">Operaciones</th>             
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>  
</div>
@endsection
@section('footerModalInsert')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
@endsection