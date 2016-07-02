@extends('layouts.app')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Configuracion de Ivas</h3>

            <div><br><a class="btn btn-success" href="{!! URL::to('ivatipo/create') !!}">
            <i class="fa fa-plus fa-lg"></i> Nuevo Iva</a></div>

            </div>
			<div class="box-body">

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Valor</th>
		<th class="col-md-4">Operaciones</th>		
	</thead>
	@foreach($ivatipos as $ivatipo)
	<tbody>
	<!-- -->
 <td>{{ $ivatipo -> id}}</td>
 <td>{{ $ivatipo -> descripcion}}</td>
 <td>{{ $ivatipo -> valor}}</td>

<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $ivatipo->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $ivatipo->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--nivel de acceso-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $ivatipo->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>
	</tbody>
	@endforeach
	</table>

<!--modal editar ivatipo-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-ivatipo')
<!--modal eliminar ivatipo-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-ivatipo')
 <!--modal eliminar ivatipo-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-ivatipo')
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