@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
<!--include('alerts.success')-->


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Usuarios</h3>
            <div><br>
              <a class="btn btn-success   " href="{!! URL::to('usuario/create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nuevo Usuario</a>

              <a class="btn btn-success" data-toggle="modal" data-target="#importuser" >
              <i class="fa  fa-file-excel-o fa-lg"></i> Importar</a>
           

            <a class="btn btn-success" href="{!! URL::to('/userExport') !!}">
            <i class="fa  fa-file-excel-o fa-lg"></i> exportar</a>
            </div>

            </div>
			<div class="box-body">
 
<!--buscador-->
{!!Form::open(['route'=>'usuario.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('usu_nombre',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
  {{ Form::select('type',config('options.type'),'',['class'=>'form-control']) }}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->

<!--boton crear / exportar-->

<!--endboton crear / exportar-->


<table id="example2" class="table table-bordered table-hover">
	<thead>
      <tr>
    <th>Id</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Tipo</th>
    <th class="col-md-4">Operaciones</th> 
      </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
      <td>{{ $user -> id}}</td>
	  	<td>{{ $user -> usu_nombre}}</td>
	  	<td>{{ $user -> email}}</td>
	  	<td>{{ $user -> usu_tel}}</td>
	  	<td>{{ $user -> usu_direcc}}</td>
	  	<td>{{ $user->perfil->descripcion}}</td>
      
<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $user->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $user->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $user->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

	</tbody>
	@endforeach
	</table>

<!--modal editar user-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-usuario')
<!--modal eliminar usuario-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-usuario')
 <!--modal ver usuario-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-usuario')
  <!--modal importar usuario-->
 @include('admin.partials.modal.excel.importuser')

<!--para renderizar la paginacion-->
  {!! $users->render() !!}
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