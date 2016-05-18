@extends('layouts.app')
@include('alerts.errors')
@section('content')

<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			 <h3>{{$empleados}}</h3>
              <p>Nuevas Ventas</p>
            </div>
			<div class="icon">
              <i class="ion ion-bag"></i>
            </div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->


		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			 <h3>{{$empleados}}</h3>
              <p>Empleados Creados</p>
            </div>
			<div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->
	
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
			 <h3>{{$empleados}}</h3>
              <p>Usuarios Registrados</p>
            </div>
			<div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->
		

		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
			 <h3>{{$empleados}}</h3>
              <p>Nuevos Visitantes</p>
            </div>
			<div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->

@endsection