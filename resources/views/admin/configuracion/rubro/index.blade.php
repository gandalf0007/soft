@extends('layouts.admin')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<table class="table">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
	</thead>
	@foreach($rubros as $rubro)
	<tbody>
	<!-- -->
 <td>{{ $rubro -> id}}</td>
 <td>{{ $rubro -> descripcion}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('rubro.edit', $title = 'editar', $parameters = $rubro->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['rubro.destroy',$rubro->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->
{!! $rubros->render() !!}
@endsection