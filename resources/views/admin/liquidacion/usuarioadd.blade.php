@extends('layouts.app')
@section('content')


<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
			<div class="box-body">

 
<!--buscador-->

{!! Form::open(array('url' => 'venta-addcliente', 'method'=>'GET', 'class'=>'navbar-form navbar-left' , 'role'=>'Search' )) !!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('user_nombres',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
	{!!Form::select('type',config('options.type'))!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->


<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Agregar</th>
	</thead>
	@foreach($users as $user)
	<tbody>
	<!-- -->
 	<td>{{ $user -> nombre}}</td>
	<td>{{ $user -> apellido}}</td>
	<td>{{ $user -> emial}}</td>
	<td>{{ $user -> direccion}}</td>
	<td>{{ $user -> telefono}}</td>

<td>
<a href="{{ URL::to('liquidacion-usuario/'.$user->id) }}">{{ Form::submit('Agregar Usuario',array('class'=>'btn btn-success')) }}</a>
</td>


	</tbody>
	@endforeach
	</table>

<!--para renderizar la paginacion-->


  {!! $users->render() !!}
 
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