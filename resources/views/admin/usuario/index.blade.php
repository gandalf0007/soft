@extends('layouts.admin')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<div class="panel-body">
<div class="col-lg-6">


 <!--buscador-->
{!!Form::open(['route'=>'usuario.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left pull-right' , 'role'=>'Search'])!!}

<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('usu_nombre',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
</div>

{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
 <!--endbuscador-->

<table class="table">
	<thead>
		<th>nombre</th>
		<th>correo</th>
		<th>operaciones</th>
	</thead>
	@foreach($users as $user)
	<tbody>
	<!-- -->
 <td>{{ $user -> usu_nombre}}</td>

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
@endsection