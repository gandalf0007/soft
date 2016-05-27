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
{!!Form::open(['route'=>'cliente.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('clie_nombres',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
	{!!Form::select('type',config('options.type'))!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->

<div><a class="btn btn-success  pull-right " href="{!! URL::to('cliente/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Agregar Cliente</a></div>


<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Id</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Tipo</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</thead>
	@foreach($clientes as $cliente)
	<tbody>
	<!-- -->
 	<td>{{ $cliente -> id}}</td>
	<td>{{ $cliente -> clie_nombres}}</td>
	<td>{{ $cliente -> clie_email}}</td>
	<td>{{ $cliente -> clie_tel}}</td>
	<td>{{ $cliente -> clie_direcc}}</td>
	<td>{{ $cliente -> usu_perfil}}</td>

<td>
<a href="{{ URL::to('venta-cliente/'.$cliente->id) }}">{{ Form::submit('Agregar Cliente',array('class'=>'btn btn-success')) }}</a>
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