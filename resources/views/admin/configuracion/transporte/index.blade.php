@extends('layouts.app')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Configuracion Transporte</h3>

<div><br><a class="btn btn-success" href="{!! URL::to('transporte/create') !!}">
  <i class="fa  fa-plus fa-lg"></i> Nuevo Transporte</a></div> 

            </div>
			<div class="box-body">



<!--buscador-->
{!!Form::open(['route'=>'transporte.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('transp_descrip',null,['class'=>'form-control','placeholder'=>'nombre del transporte'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->



<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th class="col-md-4">Operaciones</th>	
	</thead>
	@foreach($transportes as $transporte)
	<tbody>
	<!-- -->
 <td>{{ $transporte -> id}}</td>
 <td>{{ $transporte -> transp_descrip}}</td>
 <td>{{ $transporte -> transp_direcc}}</td>
 <td>{{ $transporte -> transp_tel}}</td>

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $transporte->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $transporte->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--nivel de acceso-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $transporte->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif

</td>

	</tbody>
	@endforeach
	</table>

<!--modal editar transporte-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-transporte')
<!--modal eliminar rubro-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-transporte')
 <!--modal eliminar rubro-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-transporte')

<!--para renderizar la paginacion-->
{!! $transportes->render() !!}

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