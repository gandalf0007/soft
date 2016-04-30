@extends('layouts.admin')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<table class="table">
	<thead>
		<th>nombre</th>
		<th>elenco</th>
		<th>direccion</th>
		<th>duracion</th>
		<th>poster</th>
		<th>genero</th>
	</thead>
	@foreach($movies as $movie)
	<tbody>
	<!-- -->
 <td>{{ $movie -> nombre}}</td>
 <td>{{ $movie -> cast}}</td>
 <td>{{ $movie -> direccion}}</td>
 <td>{{ $movie -> duracion}}</td>
 <td><img src="movies/{{$movie->path}}" alt="" style="width:100px"></td>
 <td>{{ $movie -> genero}}</td>


 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('pelicula.edit', $title = 'editar', $parameters = $movie->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['pelicula.destroy',$movie->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->
{!! $movies->render() !!}
@endsection