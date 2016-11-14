@extends('layouts.app')
@include('alerts.errors')
@section('content')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crear Nueva Reparacion</h3>
            </div>
			<div class="box-body">
@include('alerts.request')


<a class="center-block btn btn-success" href="{!! URL::to('reparacion-seleccionar-usuario') !!}">
  <i class="fa fa-desktop fa-lg"></i> Selecionar Usuario</a>


{!!Form::open(['url'=>'reparacion-store', 'method'=>'POST'])!!}
@include('admin.reparaciones.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection