@extends('layouts.adminlte')
@section('css')
@endsection
@section('content')
<div class="row">
   <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
            <div class="panel-body">
               <div ><label>Seleccione un Municipio</label><select id='cmb-mp' class="form-control"></select></div>
               <div><label>Seleccione una Parroquia</label><select id='cmb-pq'class="form-control"><option value='' disabled selected>SELECCIONE UN OPCIÓN</option></select></div>
            </div>
         </div>
   </div>
</div>
   <div class="row">
   <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
         <div class="panel-heading">Registros de UBCH</div>
               <div class="panel-body">
                  <table id="GridUbch" class="table" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Nombre Ubch</th>
                           <th>Cédula</th>
                           <th>Responsable</th>
                           <th>Teléfono</th>
                           <th id="thOperaciones">Operaciones</th>             
                        </tr>
                     </thead>
                     <tbody></tbody>
                     <tfoot>
                     <tr>
                           <th>Nombre Ubch</th>
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
@include('ubch.modalUpdate')
@include('ubch.modalInsertComun')
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/dist/netInit.js?ver=0.00003&jsModule=jsUbch&cssModule=') }}"></script>
@endsection
