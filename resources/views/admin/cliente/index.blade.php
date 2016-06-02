@extends('layouts.app')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Usuarios</h3>
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

<div><a class="btn btn-success  pull-right " href="{!! URL::to('cliente/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Cliente</a></div>


<table id="example2" class="table table-bordered table-hover">
	<thead>
		
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Cuit</th>
		<th>Editar</th>
		<?php if (Auth::user()->perfil_id == 1): ?>
		<th>Eliminar</th>	
		<?php endif ?>
	</thead>
	@foreach($clientes as $cliente)
	<tbody>
	<!-- -->
	<td>{{ $cliente -> clie_nombres}}</td>
	<td>{{ $cliente -> clie_mail}}</td>
	<td>{{ $cliente -> clie_telefono}}</td>
	<td>{{ $cliente -> clie_direccion}}</td>
	<td>{{ $cliente -> clie_cuit}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<!--{!! link_to_route('cliente.edit', $title = 'editar', $parameters = $cliente->id  , $attributes = ['class'=>'btn btn-primary' , 'data-toggle'=>'modal' , 'data-target'=>'#Edit-{{ $cliente->id }}']); !!}-->
<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $cliente->id }}"><i class="fa fa-edit"> Editar</i></button>
</td>


<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
	
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['cliente.destroy',$cliente->id],'method'=>'DELETE'])!!}
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $cliente->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
{!!Form::close()!!}</td>

@endif

	</tbody>
	@endforeach
	</table>

<!--modal editar cliente-->
 @include('admin.partials.modal.modal-edit-cliente')
<!--modal eliminar cliente-->
 @include('admin.partials.modal.modal-delete-cliente')

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