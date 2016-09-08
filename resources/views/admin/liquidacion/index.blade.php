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