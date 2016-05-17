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
{!!Form::open(['route'=>'provedor.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('prov_razsoc',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->


<div><a class="btn btn-success  pull-right " href="{!! URL::to('provedor/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Provedor</a></div>


<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Razon Social</th>
		<th>Contacto</th>
		<th>Email</th>
		<th>Telefono</th>
		<th>Direccion</th>
		<th>Cuit</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</thead>
	@foreach($provedores as $provedore)
	<tbody>
	<!-- -->
	 <td>{{ $provedore -> prov_razsoc}}</td>
	 <td>{{ $provedore -> prov_contacto}}</td>
	 <td>{{ $provedore -> prov_mail}}</td>
	 <td>{{ $provedore -> prov_tel}}</td>
	 <td>{{ $provedore -> prov_direccion}}</td>
	 <td>{{ $provedore -> prov_cuit}}</td>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection