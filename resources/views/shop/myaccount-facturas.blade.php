@extends('layouts.shop')
@section('content')
@include('alerts.success')
@include('alerts.request')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

	 <div class=" myaccount col-sm-12 col-md-12  ">
            
            <div class="user-info-block container">
                <ul class="navigation">
                     <li >
                        <a  href="{{url('myaccount-perfil')}}">
                            <h5><span class="glyphicon glyphicon-user"> Perfil</span></h5>
                        </a>
                    </li>
                    <li >
                        <a  href="{{url('myaccount-config')}}">
                            <h5><span class="glyphicon glyphicon-cog"> Facturacion</span></h5>
                        </a>
                    </li>
                   
                    <li class="active">
                        <a  href="{{ url('myaccount-facturas') }}">
                            <h5><span class="glyphicon glyphicon-shopping-cart"> Mis Facturas</span></h5>
                        </a>
                    </li>

                    <li>
                        <a  href="{{ url('myaccount-ticket') }}">
                            <h5><span class="glyphicon glyphicon-bell"> Ticket</span></h5>
                        </a>
                    </li>
                </ul>


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Facturas</h3>
            </div>
      <div class="box-body">
 
<!--buscador-->
{!!Form::open(['url'=>'myaccount-facturas', 'method'=>'GET' , 'class'=>'navbar-form navbar-left' , 'role'=>'Search'])!!}
<div class="form-group">


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
 
 <br><br><br><br>
<table id="example2" class="table table-bordered table-hover">
  <thead>
      <tr>
    <td>Numero de Factura</td>
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
      <td>{{ $venta -> pago_tipo}}</td>
      <td>{{ $venta -> transporte}}</td>
      <td>{{ $venta -> comentario}}</td>
      <td>${{ $venta -> total}}</td>

      <td>
      @if ($venta -> status == "pagado")
      <span class="label label-success">{{ $venta -> status}}</span>
      @elseif ($venta -> status == "pendiente")
      <span class="label label-warning">{{ $venta -> status}}</span>
      @elseif ($venta -> status == "cancelado")
      <span class="label label-danger">{{ $venta -> status}}</span>
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



 
            </div>
        </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

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
