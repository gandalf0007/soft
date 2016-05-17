@extends('layouts.app')
@section('content')

<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Configuracion Transporte</h3>
            </div>
			<div class="box-body">



<!--buscador-->
{!!Form::open(['route'=>'transporte.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('transp_descrip',null,['class'=>'form-control','placeholder'=>'nombre del transporte'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->

<div><a class="btn btn-success  pull-right " href="{!! URL::to('transporte/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Transporte</a></div>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>ID</th>
		<th>Descripcion</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</thead>
	@foreach($transportes as $transporte)
	<tbody>
	<!-- -->
 <td>{{ $transporte -> id}}</td>
 <td>{{ $transporte -> transp_descrip}}</td>
 <td>{{ $transporte -> transp_direcc}}</td>
 <td>{{ $transporte -> transp_tel}}</td>
 <!--el usuario.edit hace referencia a la funcion edit del UsuarioController y $user->id nos envia
 el id a esa funcion -->

<td>{!! link_to_route('transporte.edit', $title = 'editar', $parameters = $transporte->id  , $attributes = ['class'=>'btn btn-primary']); !!}</td>

<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
<td>{!!Form::open(['route'=>['transporte.destroy',$transporte->id],'method'=>'DELETE'])!!}
{!!Form::submit('eliminar',['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->
{!! $transportes->render() !!}

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