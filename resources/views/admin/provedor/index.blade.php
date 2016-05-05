@extends('layouts.admin')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<div class="panel-body">
<div class="container-fluid">

 
<!--buscador-->
{!!Form::open(['route'=>'provedor.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}

<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('prov_razsoc',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>

{!!Form::close()!!}
 <!--endbuscador-->

<table class="table">
	<thead>
		<th>razon social</th>
		<th>contacto</th>
		<th>email</th>
		<th>operaciones</th>
	</thead>
	@foreach($provedores as $provedore)
	<tbody>
	<!-- -->
	 <td>{{ $provedore -> prov_razsoc}}</td>
	 <td>{{ $provedore -> prov_contacto}}</td>
	 <td>{{ $provedore -> prov_mail}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('provedor.edit', $title = 'editar', $parameters = $provedore->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['provedor.destroy',$provedore->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->


  {!! $provedores->render() !!}
 
</div>
</div>
@endsection