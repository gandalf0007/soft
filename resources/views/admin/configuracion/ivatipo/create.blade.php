@extends('layouts.app')
@include('alerts.errors')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crear Nuevo Iva Tipo</h3>
            </div>
			<div class="box-body">
@include('alerts.request')

{!!Form::open(['route'=>'ivatipo.store', 'method'=>'POST'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>

<div class="form-group">
	{!!Form::label('valor')!!}
	{!!Form::text('valor',null,['class'=>'form-control','placeholder'=>'ingrese el valor'])!!}
</div>

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
