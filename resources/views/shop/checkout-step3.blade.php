@extends('layouts.shop')
@include('alerts.errors')
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">

	   
    <h1>Responsive Checkout Progress Bar</h1>
  <! -- To test add 'active' class and 'visited' class to different li elements -->
  
<div class="checkout-wrap center-block">
  <ul class="checkout-bar">

    <li class="active">Resumen</li>
    
    <li class="active">Iniciar Sesion</li>
    
    <li class="active">Direccion</li>
    
    <li class="">Transporte</li>
    
    <li class="">Pago</li>
       
  </ul>
</div>
    
    <br><br><br><br> <br><br><br><br> <br><br><br><br>


 <div class="user-info-block container">
    <div id="information" class="tab-pane active">             
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Seleccione el Transporte</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
{!!Form::open(['route'=>'myaccount.DatosDeFacturacion', 'method'=>'POST', 'files'=>True])!!}


@include('shop.forms.transporte')
 
               
              </div>
            </div>
                 <div class="panel-footer">
                      <a href="{{ url('checkout-step-2') }}" class="btn btn-azul"><i class="fa fa-backward"> Atras</i></a>
                        
                      <a href="{{ url('checkout-step-4') }}" class="btn btn-success pull-right">Siguiente <i class="fa fa-forward"></i></a>
                      

                    </div>
          </div>
{!!Form::close()!!}
</div>
</div>

		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
