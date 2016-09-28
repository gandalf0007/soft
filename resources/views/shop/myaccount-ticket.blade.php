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
                            <h5><span class="glyphicon glyphicon-cog"> Config</span></h5>
                        </a>
                    </li>
                   
                    <li >
                        <a  href="{{ url('myaccount-facturas') }}">
                            <h5><span class="glyphicon glyphicon-shopping-cart"> Mis Facturas</span></h5>
                        </a>
                    </li>

                    <li class="active">
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
              <h3 class="box-title">Ticket Abiertos</h3>
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


<div><a class="btn btn-success  pull-right " data-toggle="modal"  href="#ticket-crear">
  <i class="fa fa-ticket fa-lg"></i> Nuevo Ticket</a></div>

 
 <br><br><br><br>
<table id="example2" class="table table-bordered table-hover">
  <thead>
    <th>#</th>
    <th>Subject</th>
    <th>Contenido</th>
    <th>Status</th>
    <th>Última actualización</th>
    <!-- <th>Agent</th> -->
    <th>Priority</th>
    <th>Category</th>
    <th>Propietario</th>
    
    
    <th class="col-md-4">Operaciones</th>
  </thead>
  @foreach($tickets as $ticket)
  <tbody>
  <!-- -->
  <td>{{ $ticket -> id}}</td>
  <td>{{ $ticket -> subject}}</td>
  <td>{{ $ticket -> content}}</td>

  <td>
      @if ($ticket -> status -> nombre == "PENDIENTE")
      <a href="#status-{{ $ticket->id }}" data-toggle="modal" ><span class="label label-warning">{{ $ticket -> status -> nombre}}</span></a>
      @elseif ($ticket -> status -> nombre == "SOLUCIONADO")
      <a href="#status-{{ $ticket->id }}" data-toggle="modal" ><span class="label label-success">{{ $ticket -> status -> nombre }}</span></a>
      @endif
  </td>

  <td>{{ $ticket -> updated_at}}</td>

  <td>
      @if ($ticket -> priority -> nombre == "MEDIA")
      <a href="" data-toggle="modal" ><span class="label label-success">{{ $ticket -> $ticket -> priority -> nombre}}</span></a>
      @elseif ($ticket -> priority -> nombre == "BAJA")
      <a href="" data-toggle="modal" ><span class="label label-warning">{{ $ticket -> priority -> nombre }}</span></a>
      @elseif ($ticket -> priority -> nombre == "ALTA")
      <a href="" data-toggle="modal" ><span class="label label-danger">{{ $ticket -> priority -> nombre}}</span></a>
      @endif
  </td>

  <td>{{ $ticket -> category -> nombre}}</td>
  
  @if(!empty($ticket->agent_id))
  <td>{{ $ticket -> agent -> nombre}}</td>
  @else
  <td>Nadie</td>
  @endif


<td>

<a class="btn btn-info btn-lg fa fa-envelope" href="{!! URL::to('myaccount-ticket-responder-'.$ticket->id) !!}"></a>


</td>
@endforeach
  </tbody>
  
  </table>



<!--modal de eliminar producto-->
@include('shop.modal.ticket-crear')

<!--para renderizar la paginacion-->
 {!!$tickets->render() !!}

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
