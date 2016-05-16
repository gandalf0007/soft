@extends('layouts.admin')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<div class="panel-body">
<div class="container-fluid">

<!--buscador-->
{!!Form::open(['route'=>'marca.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>

{!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
 <!--endbuscador-->



<table class="table">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</thead>
	@foreach($marcas as $marca)
	<tbody>
	<!-- -->
 <td>{{ $marca -> id}}</td>
 <td>{{ $marca -> descripcion}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('marca.edit', $title = 'editar', $parameters = $marca->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['marca.destroy',$marca->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->
{!! $marcas->render() !!}
</div>
</div>
@endsection