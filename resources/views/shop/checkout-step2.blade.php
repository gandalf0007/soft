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
    
    <br><br><br><br> <br><br><br><br> <br><br><br><br>

<div id="settings" class="tab-pane container">  
 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Datos de Facturacion</h3>
            </div>
            <div class="panel-body">
              <div class="row">
 @if(!DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->get())         
 <button type="button" class="center-block btn btn-azul" data-toggle="modal" data-target="#userFacturacion"><i class="fa fa-edit"> Cargar Nueva Informacion De Facturacion</i></button>
@endif
<div class=" col-md-12 col-lg-12 "> 
      <table class="table table-user-information">
       @if(!empty(DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->get()))
        <tbody>
          <tr>
            <td><strong><h4>Nombre:</h4></strong> {{ $datosfacturacions->nombre }}</td>
            <td><strong><h4>Apellido:</h4></strong> {{ $datosfacturacions->apellido }}</td>
          </tr>
          <tr>
            <td><strong><h4>Cuit:</h4></strong> {{ $datosfacturacions->cuit }} </td>
            <td><strong><h4>Direccion:</h4></strong> {{ $datosfacturacions->direccion }}</td>
          </tr>
          <tr>
            <td><strong><h4>Telefono:</h4></strong> {{ $datosfacturacions->telefono }}</td>
            <td><strong><h4>Telefono 2:</h4></strong>{{ $datosfacturacions->telefono2 }}</td>
          </tr>
                   
              <tr>
                             
          <tr>
            <td><strong><h4>Ciudad:</h4></strong> {{ $datosfacturacions->ciudad }}</td>
            <td><strong><h4>Provincia:</h4></strong> {{ $datosfacturacions->provincia }}</td>
          </tr>
          <tr>
            <td><strong><h4>Codigo Postal:</h4></strong> {{ $datosfacturacions->cp }}</td>
            <td><strong><h4>Fecha de Nacimiento:</h4></strong> {{ $datosfacturacions->nacimiento }}</td>
          </tr>                       
           <td><strong><h4>Empresa :</h4></strong> @if( $datosfacturacions->empresa == "1") 
                                          SI
                                      @else
                                          NO
                                      @endif
              </td>
                           
            </tr>
                     @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           @if(DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->get())
                 <div class="panel-footer">
                        <button type="button" class="btn btn-azul" data-toggle="modal" data-target="#userFacturacionEdit"><i class="fa fa-edit"> Editar</i></button>

                        <a class="btn btn-success pull-right" href="{{ url('checkout-step-3') }}"><i class="fa fa-forward"> Siguiente</i></a>
                    </div>
                    @endif

          </div></div>


		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
@include('shop.modal.crear-datos-facturacion-checkout') 
@include('shop.modal.editar-datos-facturacion-checkout') 
<br><br><br><br><br><br>
@endsection
