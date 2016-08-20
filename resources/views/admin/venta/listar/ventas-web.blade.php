@extends('layouts.app')
@section('content')
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Ventas</h3>
            </div>
			<div class="box-body">
 
<ul class="nav nav-tabs">
  <li ><a href="{{ url('listar-venta') }}">Ventas</a></li>
  <li class="active"><a href="{{ url('listar-venta-web') }}">Ventas Web</a></li>
</ul>

<br>
<!--buscador-->
{!!Form::open(['url'=>'listar-venta-web', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">

<i class="fa fa-user"></i>
{!!Form::text('user',null,['class'=>'form-control','placeholder'=>'Usuario'])!!}

<i class="fa fa-calendar"></i>
{!!Form::label('Fecha Inicial')!!}
{!!Form::text('fecha_inicio',null,['class'=>'form-control','id'=>'datepicker','placeholder'=>'Fecha de Inicio'])!!}

<i class="fa fa-calendar"></i>
{!!Form::label('Fecha Final')!!}
{!!Form::text('fecha_final',null,['class'=>'form-control','id'=>'datepicker2','placeholder'=>'Fecha de Fin'])!!}

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
    <td>Numero de Factura</td>
    <td>Usuario</td>
    <td>Metodo de Pago</td>
    <th>Transporte</th>
    <th>Comentario</th>
    <th>Total</th>
    <th>Estatus</th>
    <th>Fecha</th>
    <th>Pdf</th>
      </tr>
    </thead>
    @foreach($ventas as $venta)
    <tbody>
   
      <td>#{{ $venta -> id}}</td>
	  	<td>{{ $venta ->user->nombre}}</td>
      <td>{{ $venta -> pago_tipo}}</td>
      <td>{{ $venta -> transporte}}</td>
      <td>{{ $venta -> comentario}}</td>
      <td>${{ $venta -> total}}</td>

      <td>
      @if ($venta -> status == "pagado")
      <a href="#status-{{ $venta->id }}" data-toggle="modal" ><span class="label label-success">{{ $venta -> status}}</span></a>

      @elseif ($venta -> status == "pendiente")
      <a href="#status-{{ $venta->id }}" data-toggle="modal" ><span class="label label-warning">{{ $venta -> status}}</span></a>

      @elseif ($venta -> status == "cancelado")
      <a href="#status-{{ $venta->id }}" data-toggle="modal" ><span class="label label-danger">{{ $venta -> status}}</span></a>

      @endif
      </td>

      <td>{{ $venta -> created_at}}</td>

      <td><a href="{{ URL::to('myaccount-detalle-pdf/1/'.$venta->id) }}" target="_blank" ><button class="btn btn-danger"><i class="fa fa-file-pdf-o"> PDF</i></button></a></td>
	</tbody>
  @endforeach
	</table>
<!--para renderizar la paginacion-->
 {!!$ventas->render() !!}
			     </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@include('admin.venta.modal.modal-status-web')







@section('scriptdatepicker')
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true  
    });
     $('#datepicker2').datepicker({
      autoclose: true
    });
  });
</script>
@stop

@endsection