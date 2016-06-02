@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de ventas</h3>
            </div>
			<div class="box-body">
 
<!--buscador-->
{!!Form::open(['route'=>'usuario.index', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('usu_nombre',null,['class'=>'form-control','placeholder'=>'nombre de usuario'])!!}
 <button type="submit" class="glyphicon glyphicon-search btn btn-success"> BUSCAR </button>
</div>
{!!Form::close()!!}
 <!--endbuscador-->

<!--boton crear
<div><a class="btn btn-success  pull-right " href="{!! URL::to('usuario/create') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Usuario</a></div>
endboton crear-->


<table id="example2" class="table table-bordered table-hover">
	<thead>
      <tr>
    <td>Mostrar</td>
		<th>Vendedor</th>
		<th>Cliente</th>
		<th>Pago</th>
		<th>Comentario</th>
		<th>Total</th>
		<th>Estatus</th>
    <th>Fecha</th>
    <th>Pdf</th>
      </tr>
    </thead>
    @foreach($ventas as $venta)
    <tbody>

<td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#datalle-{{ $venta->id }}"><i class="fa fa-expand"> Detalle</i></button>
</td>

	  	<td>{{ $venta->user->usu_nombre }}</td>
	  	<td>{{ $venta ->cliente->clie_nombres}}</td>
	  	<td>{{ $venta -> pago_tipo}}</td>
	  	<td>{{ $venta -> comentario}}</td>
	  	<td>{{ $venta -> total}}</td>

      <td>
      <?php if ($venta -> status == "pagado"){ ?>
        <span class="label label-success">{{ $venta -> status}}</span>
      <?php }if ($venta -> status == "pendiente"){ ?>
      <span class="label label-warning">{{ $venta -> status}}</span>
     <?php } if ($venta -> status == "cancelado"){ ?>
      <span class="label label-danger">{{ $venta -> status}}</span>
       <?php } ?>
      </td>

      <td>{{ $venta -> updated_at}}</td>

      <td><a href="{{ URL::to('venta-detalle-pdf/1/'.$venta->id) }}" target="_blank" ><button class="btn btn-danger"><i class="fa fa-file-pdf-o"> PDF</i></button></a></td>

	</tbody>
  @endforeach
	</table>
<!--para renderizar la paginacion-->
  {!! $ventas->render() !!}
			     </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    @include('admin.partials.modal.modal-detalle-venta')
@endsection