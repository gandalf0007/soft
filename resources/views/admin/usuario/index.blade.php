@extends('layouts.admin')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<div class="panel-body">
<div class="container-fluid">

 
<!--buscador-->
{!!Form::open(['route'=>'usuario.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}

<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('usu_nombre',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
	{!!Form::select('type',config('options.type'))!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>

{!!Form::close()!!}
 <!--endbuscador-->
<div><a class="btn btn-success  pull-right " href="{!! URL::to('usuario/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Usuario</a></div>


<table class="table">
	<thead>
		<th>Id</th>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Tipo</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</thead>
	@foreach($users as $user)
	<tbody>
	<!-- -->
 	<td>{{ $user -> id}}</td>
	<td>{{ $user -> usu_nombre}}</td>
	<td>{{ $user -> email}}</td>
	<td>{{ $user -> usu_tel}}</td>
	<td>{{ $user -> usu_direcc}}</td>
	<td>{{ $user -> usu_perfil}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('usuario.edit', $title = 'editar', $parameters = $user->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['usuario.destroy',$user->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->


  {!! $users->render() !!}
 
</div>
</div>
@endsection