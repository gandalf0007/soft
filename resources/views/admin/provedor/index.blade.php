@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Provedores</h3>
	<div><br>
		<a class="btn btn-success" href="{!! URL::to('provedor/create') !!}">
  		<i class="fa fa-user-secret fa-lg"></i> Nuevo Provedor</a>
  	</div>

            </div>
			<div class="box-body">

 
<!--buscador-->
{!!Form::open(['route'=>'provedor.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('prov_razsoc',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->





<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Razon Social</th>
		<th>Contacto</th>
		<th>Email</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Cuit</th>
		<th class="col-md-4">Operaciones</th>
	</thead>
	@foreach($provedores as $provedore)
	<tbody>
	<!-- -->
	 <td>{{ $provedore -> prov_razsoc}}</td>
	 <td>{{ $provedore -> prov_contacto}}</td>
	 <td>{{ $provedore -> prov_mail}}</td>
	 <td>{{ $provedore -> prov_tel}}</td>
	 <td>{{ $provedore -> prov_direccion}}</td>
	 <td>{{ $provedore -> prov_cuit}}</td>

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $provedore->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $provedore->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $provedore->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif 
</td>

	</tbody>
	@endforeach
	</table>


<!--modal editar provedor-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-provedor')
<!--modal eliminar provedor-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-provedor')
 <!--modal Ver provedor-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-provedor')
<!--para renderizar la paginacion-->
 {!! $provedores->render() !!}
 
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