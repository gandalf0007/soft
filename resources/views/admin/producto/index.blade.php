@extends('layouts.admin')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')



<div class="panel-body">
<div class="container-fluid">


<!--buscador-->
{!!Form::open(['route'=>'producto.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('pro_descrip',null,['class'=>'form-control','placeholder'=>'descripcion del prodcuto'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>

{!!Form::close()!!}
 <!--endbuscador--> 


<table class="table">
	<thead>
		<th>id</th>
		<th>descripcion</th>
		<th>imagen</th>
		<th>imagen</th>
	</thead>
	@foreach($productos as $producto)
	<tbody>
	<!-- -->
 <td>{{ $producto -> id}}</td>
  <td>{{ $producto -> pro_descrip}}</td>
  <td><img src="storage/{{$producto->path}}" alt="" style="height:100px"></td>
  <td>{{ $producto -> pro_imagen}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('producto.edit', $title = 'editar', $parameters = $producto->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['producto.destroy',$producto->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->


  {!! $productos->render() !!}
 
</div>
</div>
@endsection