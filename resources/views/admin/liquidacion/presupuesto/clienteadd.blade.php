@extends('layouts.app')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
			<div class="box-body">

 
<!--buscador-->

{!! Form::open(array('url' => 'venta-addcliente', 'method'=>'GET', 'class'=>'navbar-form navbar-left' , 'role'=>'Search' )) !!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('clie_nombres',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
	{!!Form::select('type',config('options.type'))!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->


<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Cuit</th>
		<th>Agregar</th>
	</thead>
	@foreach($clientes as $cliente)
	<tbody>
	<!-- -->
 	<td>{{ $cliente -> clie_nombres}}</td>
	<td>{{ $cliente -> clie_mail}}</td>
	<td>{{ $cliente -> clie_telefono}}</td>
	<td>{{ $cliente -> clie_direccion}}</td>
	<td>{{ $cliente -> clie_cuit}}</td>

<td>
<a href="{{ URL::to('presupuesto-cliente/'.$cliente->id) }}">{{ Form::submit('Agregar Cliente',array('class'=>'btn btn-success')) }}</a>
</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->


  {!! $clientes->render() !!}
 
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