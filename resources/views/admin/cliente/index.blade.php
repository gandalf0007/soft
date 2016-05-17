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
{!!Form::open(['route'=>'cliente.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('clie_nombres',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
	{!!Form::select('type',config('options.type'))!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->

<div><a class="btn btn-success  pull-right " href="{!! URL::to('cliente/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Cliente</a></div>


<table id="example2" class="table table-bordered table-hover">
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
	@foreach($clientes as $cliente)
	<tbody>
	<!-- -->
 	<td>{{ $cliente -> id}}</td>
	<td>{{ $cliente -> clie_nombres}}</td>
	<td>{{ $cliente -> email}}</td>
	<td>{{ $cliente -> usu_tel}}</td>
	<td>{{ $cliente -> usu_direcc}}</td>
	<td>{{ $cliente -> usu_perfil}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('cliente.edit', $title = 'editar', $parameters = $cliente->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['cliente.destroy',$cliente->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->


  {!! $clientes->render() !!}
 
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