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
{!!Form::open(['route'=>'usuario.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('usu_nombre',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
  {{ Form::select('type',config('options.type'),'',['class'=>'form-control']) }}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->

<!--boton crear-->
<div><a class="btn btn-success  pull-right " href="{!! URL::to('usuario/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Usuario</a></div>
<!--endboton crear-->

<table id="example2" class="table table-bordered table-hover">
	<thead>
      <tr>
    <th>Id</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Tipo</th>
    <th>Editar</th>
     <?php if (Auth::user()->perfil_id == 1): ?>
    <th>Eliminar</th>
    <?php endif ?>
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
      


  

 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->
<td>{!! link_to_route('usuario.edit', $title = 'editar', $parameters = $user->id  , $attributes = ['class'=>'btn btn-primary']); !!}
</td>


<?php if (Auth::user()->perfil_id == 1): ?>
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['usuario.destroy',$user->id],'method'=>'DELETE'])!!}
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $user->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
{!!Form::close()!!}</td>

<?php endif ?>

	</tbody>
	@endforeach
	</table>

<!--modal eliminar usuario-->
 @include('admin.partials.modal.modal-delete-usuario')

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