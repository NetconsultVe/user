@extends('layouts.adminlte')

@section('content')
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-sitemap"></i></span>
        <div class="info-box-content">
          
          <span class="info-box-number" id="spanComunidad"></span>
          <span class="info-box-text">COMUNIDADES REGISTRADAS</span>       
        </div>
      </div>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-number" id="spanCalles"></span>
          <span class="info-box-text">CALLES REGISTRADAS</span>       
        </div>
      </div>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-group"></i></span>
        <div class="info-box-content">
          <span class="info-box-number" id="spanFamiliasNro"></span>
          <span class="info-box-text">FAMILIAS REGISTRADAS</span>
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">AVANCE RESPONSABLES DE LAS UBCH</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                
              </div>
          </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="divChart" style="height: 300px;"></canvas>
          </div>
        </div>
      </div>
  </div>
  <div class="col-md-8 col-sm-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title" id="leyendaChart">ESTADISTICAS DE LOS ULTIMOS DIAS</h3>
        <div class="box-tools pull-right">
          <div class="btn-group">
            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#" id="regisComunidades">COMUNIDADES REGISTRADAS</a></li>
              <li><a href="#" id="regisCalles">CALLES REGISTRADAS</a></li>
              <li><a href="#" id="regisFamilias">FAMILIAS REGISTRADAS</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="box-body">
          <div class="chart">
              <p class="text-center"><strong id="strongChart">Prueba</strong></p>
              <canvas id="salesChart" style="height: 270px;"></canvas>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
<script type="text/javascript" src="{{ asset('js/dist/netInit.js?ver=0.1&jsModule=jsAdmin&cssModule=') }}"></script>
@endsection
