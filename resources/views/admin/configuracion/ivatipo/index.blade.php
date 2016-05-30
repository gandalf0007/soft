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

<div><a class="btn btn-success  pull-right " href="{!! URL::to('ivatipo/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Iva</a></div>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Valor</th>
		<th>Editar</th>
		<?php if (Auth::user()->perfil_id == 1): ?>
		<th>Eliminar</th>	
		<?php endif ?>
	</thead>
	@foreach($ivatipos as $ivatipo)
	<tbody>
	<!-- -->
 <td>{{ $ivatipo -> id}}</td>
 <td>{{ $ivatipo -> descripcion}}</td>
 <td>{{ $ivatipo -> valor}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('ivatipo.edit', $title = 'editar', $parameters = $ivatipo->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--nivel de acceso-->
<?php if (Auth::user()->perfil_id == 1): ?>
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['ivatipo.destroy',$ivatipo->id],'method'=>'DELETE'])!!}
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $ivatipo->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
{!!Form::close()!!}</td>

<?php endif ?>

	</tbody>
	@endforeach
	</table>

<!--modal eliminar ivatipo-->
 @include('admin.partials.modal.modal-delete-ivatipo')
<!--para renderizar la paginacion-->
{!! $ivatipos->render() !!}

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