@extends('layouts.admin')
@section('content')
<!-- mostrar mensjae de validacion-->
@include('alerts.success')

<table class="table">
	<thead>
		<th>id</th>
		<th>Genero</th>
	</thead>
	@foreach($generos as $genero)
	<tbody>
	<!-- -->
 <td>{{ $genero ->id}}</td>
 <td>{{ $genero->genero}}</td>


 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->
<td>{!! link_to_route('genero.edit', $title = 'editar', $parameters = $genero->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['genero.destroy',$genero->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->
{!! $generos->render() !!}
@endsection