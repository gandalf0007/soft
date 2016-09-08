@extends('layouts.app')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Configuracion de Rubros</h3>
@include('alerts.request')

<div><br><a class="btn btn-success" href="{!! URL::to('rubro/create') !!}">
  <i class="fa fa-plus fa-lg"></i> Nuevo Rubro</a></div>

            </div>
			<div class="box-body">


<!--buscador-->
{!!Form::open(['route'=>'rubro.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->




{!!Form::open(['url' => 'rubro/deletemultiple','method'=>'DELETE'])!!}	


<table id="" class="table table-bordered table-hover">
	<thead>
		<th>Select</th>
		<th>ID</th>
		<th>Descripcion</th>
		<th class="col-md-4">Operaciones</th>	
	</thead>
	@foreach($rubros as $rubro)
	<tbody>
	<!-- -->
<td><div class="form-group">
 <input type="checkbox" name="checked[]" value="{{ $rubro->id }}">
</div></td>

 <td>{{ $rubro -> id}}</td>
 <td>{{ $rubro -> descripcion}}</td>

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $rubro->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $rubro->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $rubro->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
 @endif
</td>


	</tbody>
	@endforeach
	</table>

	
{!!Form::submit('Eliminar seleccion',['class'=>'btn btn-danger pull-right'])!!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{!!Form::close()!!}

<!--modal editar rubro-->
 @include('admin.configuracion.rubro.modal.modal-edit-rubro')
<!--modal eliminar rubro-->
 @include('admin.configuracion.rubro.modal.modal-delete-rubro')
 <!--modal ver rubro-->
 @include('admin.configuracion.rubro.modal.modal-ver-rubro')

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