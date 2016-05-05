@extends('layouts.admin')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<div class="panel-body">
<div class="container-fluid">

<table class="table">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Valor</th>

	</thead>
	@foreach($ivatipos as $ivatipo)
	<tbody>
	<!-- -->
 <td>{{ $ivatipo -> id}}</td>
 <td>{{ $ivatipo -> descripcion}}</td>
 <td>{{ $ivatipo -> valor}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('ivatipo.edit', $title = 'editar', $parameters = $ivatipo->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['ivatipo.destroy',$ivatipo->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->
{!! $ivatipos->render() !!}
</div>
</div>
@endsection