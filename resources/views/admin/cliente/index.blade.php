@extends('layouts.app')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Clientes</h3>

<div><br><a class="btn btn-success" href="{!! URL::to('cliente/create') !!}">
  <i class="fa fa-users fa-lg"></i> Nuevo Cliente</a></div>

            </div>
			<div class="box-body">

 
<!--buscador-->
{!!Form::open(['route'=>'cliente.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('clie_nombres',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
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
		<th>Transpsporte</th>
		<th>Iva</th>
		<th class="col-md-4">Operaciones</th>
	</thead>
	@foreach($clientes as $cliente)
	<tbody>
	<!-- -->
	<td>{{ $cliente -> clie_nombres}}</td>
	<td>{{ $cliente -> clie_mail}}</td>
	<td>{{ $cliente -> clie_telefono}}</td>
	<td>{{ $cliente -> clie_direccion}}</td>
	<td>{{ $cliente -> clie_cuit}}</td>
	<td>{{ $cliente ->transporte->transp_descrip}}</td>
	<td>{{ $cliente ->iva->descripcion}}</td>
<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $cliente->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $cliente->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $cliente->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

	</tbody>
	@endforeach
	</table>

<!--modal editar cliente-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-cliente')
<!--modal eliminar cliente-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-cliente')
 <!--modal ver cliente-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-cliente')

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