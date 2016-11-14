@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Reparaciones</h3>
@include('alerts.request')
        
        <div><br>
              <a class="btn btn-success   " href="{!! URL::to('reparacion-create') !!}">
              <i class="fa fa-user-plus fa-lg"></i> Nueva Reparacion</a>
        </div>


            </div>

			<div class="box-body">
<ul class="nav nav-tabs">
  <li><a href="{{ url('reparaciones') }}">Reparaciones Pendientes</a></li>
  <li><a href="{{ url('reparaciones-completados') }}">Reparaciones Completados </a></li>
  <li class="active"><a href="{{ url('reparaciones-canceladas') }}">Reparaciones Canceladas  ({{$count}})</a></li>
</ul>



<!--buscador-->
{!!Form::open(['route'=>'producto.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
{!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Codigo'])!!}
{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion'])!!}
 <button type="submit" class="fa  fa-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador--> 




<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>#</th>
		<th>Equipo</th>
    <th>N Serie</th>
		<th>Falla</th>
		<th>Usuario</th>
    <th>Estado</th>

		<th class="col-md-4">Operaciones</th>
	</thead>
	@foreach($reparaciones as $reparacione)
	<tbody>
	<!-- -->
	<td>{{ $reparacione -> id}}</td>
  <td>{{ $reparacione -> equipo}}</td>
  <td>{{ $reparacione -> serie}}</td>
  <td>{!! $reparacione -> falla!!}</td>
  <td>{{ $reparacione ->user->apellido}} {{$reparacione ->user->nombre}}</td>

  <td>

      <a href="#status-{{ $reparacione->id }}" data-toggle="modal" ><span class="label label-danger">{{ $reparacione -> status}}</span></a>
  </td>

	

<td>

<a class="btn btn-danger btn-lg fa fa-file-pdf-o" href="{!! URL::to('reparacion-pdf/1/'.$reparacione->id) !!}">PDF</a>

<a  class="btn btn-primary btn-lg fa fa-edit" data-toggle="modal" data-target="#Edit-{{ $reparacione->id }}"></a>


@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <a class="btn  btn-danger btn-lg  fa fa-trash-o" data-toggle="modal" data-target="#confirmDelete-{{ $reparacione->id }}"></a>
@endif

</td>
@endforeach
	</tbody>
	
	</table>


<!--modal editar -->
 @include('admin.reparaciones.modal.modal-edit')
<!--modal eliminar -->
 @include('admin.reparaciones.modal.modal-delete')
 <!--modal STATUS-->
 @include('admin.reparaciones.modal.modal-status')

<!--para renderizar la paginacion-->
  {!! $reparaciones->render() !!}
 
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