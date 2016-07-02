@extends('layouts.app')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Configuracion de Marcas</h3>

       <div><br><a class="btn btn-success" href="{!! URL::to('marca/create') !!}">
  		<i class="fa fa-plus fa-lg"></i> Nueva Marca</a></div>
            </div>
			<div class="box-body">

<!--buscador-->
{!!Form::open(['route'=>'marca.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>
{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
 <!--endbuscador-->




<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th class="col-md-4">Operaciones</th>		
	</thead>
	@foreach($marcas as $marca)
	<tbody>
	<!-- -->
 <td>{{ $marca -> id}}</td>
 <td>{{ $marca -> descripcion}}</td>


<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $marca->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $marca->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--nivel de acceso-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $marca->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif

</td>

	</tbody>
	@endforeach
	</table>

<!--modal editar marca-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-marca')	
<!--modal eliminar marca-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-marca')
 <!--modal ver marca-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-marca')
<!--para renderizar la paginacion-->
{!! $marcas->render() !!}

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