@extends('layouts.adminlte')
@section('css')
@endsection
@section('content')
<div class="row">
   <div class="col-md-10 col-md-offset-1" id="panelSelects">
      <div class="panel panel-default">
            <div class="panel-body">
               <div ><label>Seleccione un Municipio</label><select id='cmb-mp' class="form-control"></select></div>
               <div><label>Seleccione una Parroquia</label><select id='cmb-pq'class="form-control"><option value='' disabled selected>SELECCIONE UN OPCIÓN</option></select></div>
               <div><label>Seleccione una Ubch</label><select id='cmb-cm'class="form-control"><option value='' disabled selected>SELECCIONE UN OPCIÓN</option></select></div>
               <div><label>Seleccione una Comunidad</label><select id='cmb-cman'class="form-control"><option value='' disabled selected>SELECCIONE UN OPCIÓN</option></select></div>
               <div><label>Seleccione una calle</label><select id='cmb-calle'class="form-control"><option value='' disabled selected>SELECCIONE UN OPCIÓN</option></select></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnAddJefeFamilia">Agregar Jefe de Familia</button>
            </div>
         </div>
   </div>   
</div>
<div class="row">
   <div class="col-md-10 col-md-offset-1" id="panelGrids">
      <div class="panel panel-default">
         <div class="panel-heading">Registros de Jefes de Familias</div>
               <div class="panel-body"> 
                     <table id="GridJefeFamilia" class="table" cellspacing="0">
                  <thead>
                     <tr>
                        <th>Cédula</th>
                        <th>Responsable</th>
                        <th>Teléfono</th>
                        <th id="thOperaciones">Operaciones</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>Cédula</th>
                        <th>Responsable</th>
                        <th>Teléfono</th>
                        <th id="thOperaciones">Operaciones</th>
                     </tr>
                  </tfoot>
               </table>
            </div>
      </div>
   </div>
</div>
@include('familia.FormNewFamilia')
@include('familia.Mayor')
@include('familia.MenorC')
@include('familia.Menor')

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/dist/netInit.js?ver=0.00003&jsModule=jsFamilia&cssModule=') }}"></script>
@endsection

