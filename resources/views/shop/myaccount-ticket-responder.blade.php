@extends('layouts.shop')
@section('content')
@include('alerts.success')
@include('alerts.request')


<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

	 <div class="myaccount col-sm-12 col-md-12  ">
            
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
              <h3 class="box-title">Responder Ticket</h3>
            </div>
      <div class="box-body">


{!!Form::model($ticket,['url'=>['myaccount-ticket-comentario',$ticket->id],'method'=>'PUT' , 'files'=>True])!!}


@include('shop.forms.ticket-responder')

{!!Form::submit('Responder',['class'=>'btn btn-success pull-right'])!!}
<a class="btn btn-primary pull-left" href="{!! URL::to('myaccount-ticket') !!}">
  <i class="fa fa-backward fa-lg"></i> Back</a>
{!!Form::close()!!}


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
