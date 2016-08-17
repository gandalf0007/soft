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

    <li class="active">Iniciar Sesion</li>
    
    <li class="">Direccion</li>
    
    <li class="">Transporte</li>
    
    <li class="">Confirmar</li>
    
    <li class="">Pagar</li>
       
  </ul>
</div>
    
<br><br><br><br><br>
   

 <div id="loginbox" class="col-xs-12 col-sm-12 col-md-9 homebanner-holder center-block "> 
        
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title text-center">SharkInformatica.com</div>
            </div>     

            <div class="panel-body" >

                
    <form action="{{ url('/login') }}" method="post" id="form" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="input-group ">
                        <span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-user"></i></span>
                       <input type="email" class="form-control" placeholder="Email" name="email"/>                                   
                    </div>

                    <div class="input-group ">
                        <span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-azul pull-right"><i class="glyphicon glyphicon-log-in"></i> Ingresar</button>                          
                        </div>
                    </div>

                </form>     
<a href="{{ url('/password/reset') }}">Olvidé mi contraseña</a><br>
<a href="{{ url('/register') }}" class="text-center">Registrar</a>


            </div>                     
        </div>  
</div>



    <br><br><br><br> <br><br><br><br> <br><br><br><br>

		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@endsection
