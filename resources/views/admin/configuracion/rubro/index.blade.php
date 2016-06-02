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
{!!Form::open(['route'=>'rubro.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('rubro',null,['class'=>'form-control','placeholder'=>'nombre del rubro'])!!}
	
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->

<div><a class="btn btn-success  pull-right " href="{!! URL::to('rubro/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Rubro</a></div>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Editar</th>
		<?php if (Auth::user()->perfil_id == 1): ?>
		<th>Eliminar</th>	
		<?php endif ?>
	</thead>
	@foreach($rubros as $rubro)
	<tbody>
	<!-- -->
 <td>{{ $rubro -> id}}</td>
 <td>{{ $rubro -> descripcion}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->
 <!--
<td>{!! link_to_route('rubro.edit', $title = 'editar', $parameters = $rubro->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>-->

<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $rubro->id }}"><i class="fa fa-edit"> Editar</i></button>
</td>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['rubro.destroy',$rubro->id],'method'=>'DELETE'])!!}
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $rubro->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
{!!Form::close()!!}</td>

@endif

	</tbody>
	@endforeach
	</table>

<!--modal editar rubro-->
 @include('admin.partials.modal.modal-edit-rubro')
<!--modal eliminar rubro-->
 @include('admin.partials.modal.modal-delete-rubro')
<!--para renderizar la paginacion-->
{!! $rubros->render() !!}

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