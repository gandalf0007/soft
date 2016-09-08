@extends('layouts.app')

@section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa  fa-bank"></i>Seccion De Liquidaciones de Sueldos</h3>
            </div>
			<div class="box-body">

     		
			 <!-- ---------------------  cliente   --------------------------- -->
     		<div class="box-header with-border ">
              <h3 class="box-title">Datos del Usuario</h3>

              <a class="btn btn-success  pull-right " href="{!! URL::to('liquidacion-addusuario') !!}"><i class="fa  fa-users fa-lg"></i> Agregar Usuario</a>
              
            </div>
			@if(count($user))
            <div class="box-body">
              <div class="input-group col-xs-6 pull-right">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input type="text" class="form-control" placeholder="direccion" value="{{ $user->direccion}}" disabled>
             </div>

              <div class="input-group col-xs-6">
                <span class="input-group-addon"><i class="fa fa-gavel"></i></span>
                 <input type="text" class="form-control" placeholder="Cuit" value="{{ $user->cuit}}" disabled>
              </div>
              
              <div class="input-group col-xs-6 pull-right">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                 <input type="text" class="form-control" placeholder="telefono" value="{{ $user->telefono}}" disabled>
              </div>

              <div class="input-group col-xs-6">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="user" value="{{ $user->nombre}}" disabled>
              </div>
              </div>
              @endif
<br><br><br>
		
			<div class="box-header with-border ">
              <h3 class="box-title">Liquidar Sueldo</h3>

              <a class="btn btn-success  pull-right " data-toggle="modal" data-target="#liquidacion"><i class="fa  fa-users fa-lg"></i>  Generar Liquidacion</a>
              
            </div>
			
			<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Fecha de Ingreso</th>
		<th>Basico jornada</th>
		<th>Antiguedad(1%)</th>
		<th>Presentismo</th>
    	<th>Bruto</th>
    	<th>Feriados</th>
    	<th>Feriados no trabajado</th>
    	<th>Feriados trabajado</th>
    	<th>Sub total</th>
    	<th>jubilacion</th>
    	<th>obrasocial</th>
    	<th>ley19032</th>
    	<th>sec</th>
    	<th>faecys</th>
    	<th>Descuentos</th>
    	<th>totalNeto</th>
	</thead>
	<tbody>
	<!-- -->
	<td>{{ $user -> created_at}}</td>
  	<td>{{ number_format($basicoJornada,1)}}</td>
  	<td>{{ number_format($antiguedad,1)}}</td>
  	<td>{{ number_format($presentimos,1)}}</td>
    <td>{{ number_format( $bruto,1)}}</td>
    <td>-{{ number_format($feriados,1)}}</td>
    <td>{{ number_format($feNoTrabajados,1)}}</td>
    <td>{{ number_format($feTrabajados,1)}}</td>
    <td>{{ number_format($subtotal,1)}}</td>
    <td>{{ number_format($jubilacion,1)}}</td>
    <td>{{ number_format($obrasocial,1)}}</td>
    <td>{{ number_format($ley19032,1)}}</td>
    <td>{{ number_format($sec,1)}}</td>
    <td>{{ number_format($faecys,1)}}</td>
    <td>{{ number_format($totalDescuentos,1)}}</td>
     <td>{{ number_format($totalNeto,1)}}</td>

	</tbody>
	</table>
  
		

			     </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@include('admin.liquidacion.modal.modal-generar')
@stop