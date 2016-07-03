@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Gastos</h3>

              <div><br>
              <a class="btn btn-success   " href="{!! URL::to('gasto/create') !!}">
              <i class="fa fa-money fa-lg"></i> Nuevo Gasto</a>
              </div>

            </div>
			<div class="box-body">


<!--buscador-->

{!!Form::open(['url'=>'listar-venta', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">


<i class="fa fa-calendar"></i>
{!!Form::label('Fecha Inicial')!!}
{!!Form::text('fecha_inicio',null,['class'=>'form-control datepicker','placeholder'=>'Fecha de Inicio'])!!}

<i class="fa fa-calendar"></i>
{!!Form::label('Fecha Final')!!}
{!!Form::text('fecha_final',null,['class'=>'form-control datepicker','placeholder'=>'Fecha de Fin'])!!}

 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}

 <!--endbuscador-->


<table id="example2" class="table table-bordered table-hover">
	<thead>
		<th>Fecha gasto</th>
		<th>Tipo gasto</th>
		<th>Descripcion</th>
		<th>Justificante</th>
		<th>Cliente vinc. </th>
		<th>Importe</th>
		<th>Tipo pago</th>
		<th class="col-md-4">Operaciones</th>
	</thead>
	@foreach($gastos as $gasto)
	<tbody>
	<!-- -->
	  <td>{{ $gasto -> fecha}}</td>
  	<td>{{ $gasto -> tipo_gasto}}</td>
   	<td>{{ $gasto -> descripcion}}</td>
  	<td class="text-center"><a href="#"><i class='fa  fa-file-text-o'></i></a>{{ $gasto -> justificante}}</td>
  	<td>{{ $gasto -> cliente_vinc}}</td>
  	<td>${{ $gasto -> importe}}</td>
    <td>{{ $gasto -> tipo_pago}}</td>

<td>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ver-{{ $gasto->id }}"><i class="fa fa-expand"> Ver</i></button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Edit-{{ $gasto->id }}"><i class="fa fa-edit"> Editar</i></button>

<!--esto es para que solo el administrador pueda eliminar-->
@if (Auth::user()->perfil_id == 1)
<!--para el metodo eliminar necesito de un formulario para ejecutarlo-->
 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete-{{ $gasto->id }}"><i class="fa fa-trash-o"> Eliminar</i></button>
@endif
</td>

	</tbody>
	@endforeach
	</table>


<!--modal editar gasto-->
 @include('admin.partials.modal.ver-edit-delete.modal-edit-gasto')
<!--modal eliminar gasto-->
 @include('admin.partials.modal.ver-edit-delete.modal-delete-gasto')
 <!--modal ver gasto-->
 @include('admin.partials.modal.ver-edit-delete.modal-ver-gasto')



<!--para renderizar la paginacion-->
  {!! $gastos->render() !!}
 
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


@section('scriptdatepicker')
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true  
    });
  });
</script>
@stop

@endsection