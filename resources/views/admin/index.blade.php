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
			 <h3>{{$Ventas}}</h3>
              <p>Total Ventas</p>
            </div>
			<div class="icon">
              <i class="ion ion-bag"></i>
            </div>
			<a href="{!! URL::to('cart-show') !!}" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->


		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
			 <h3>{{$empleados}}</h3>
              <p>Total Compras</p>
            </div>
			<div class="icon">
              <i class="fa  fa-cart-plus"></i>
            </div>
			<a href="{!! URL::to('compra/') !!}" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->



		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
			 <h3>{{$provedores}}</h3>
              <p>Total Provedores</p>
            </div>
			<div class="icon">
              <i class="fa fa-user-secret"></i>
            </div>
			<a href="{!! URL::to('provedor/') !!}" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
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
			<a href="{!! URL::to('usuario/') !!}" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->
		

		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
			 <h3>{{$activities}}</h3>
              <p>Nuevos Visitantes</p>
            </div>
			<div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
			<a href="#" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->


		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
			 <h3>{{$productos}}</h3>
              <p>Productos Totales</p>
            </div>
			<div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
			<a href="{!! URL::to('producto/') !!}" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		</div>
		<!-- ./col -->

@endsection