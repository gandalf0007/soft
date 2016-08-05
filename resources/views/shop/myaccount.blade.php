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
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                            <h5><span class="glyphicon glyphicon-user"> Perfil</span></h5>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">
                            <h5><span class="glyphicon glyphicon-cog"> Config</span></h5>
                        </a>
                    </li>
                   
                    <li>
                        <a data-toggle="tab" href="#pedidos">
                            <h5><span class="glyphicon glyphicon-shopping-cart"> Pedidos</span></h5>
                        </a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#events">
                            <h5><span class="glyphicon glyphicon-bell"> Avisos</span></h5>
                        </a>
                    </li>
                </ul>

 <div class="user-body">
    <div class="tab-content">























<!--=================== Datos de Usuario ======================-->
        <div id="information" class="tab-pane active">             
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Account Information</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ url('storage/user/'.$user->path) }}" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td>{{ $user->nombre }}</td>
                      </tr>
                      <tr>
                        <td>Apellido:</td>
                        <td>{{ $user->apellido }}</td>
                      </tr>
                      <tr>
                        <td>Fecha de Ingreso</td>
                        <td>{{ $user->created_at }}</td>
                      </tr>
                   
                         <tr>
                             
                        <tr>
                        <td>Direccion</td>
                        <td>{{ $user->direccion }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                      </tr>
                        <td>Telefono</td>
                        <td>{{ $user->telefono }}
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <button type="button" class="btn btn-azul" data-toggle="modal" data-target="#user"><i class="fa fa-edit"> Editar</i></button>
                    </div>
          </div>
</div>
<!--=================== Datos de Usuario ======================-->
































<!--=================== Datos de Facturacion ======================-->
<div id="settings" class="tab-pane">                         
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
        <tbody>
        @if(!empty(DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->get()))
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
                    </div>
                    @endif
          </div>

 </div>

<!--=================== Datos de Facturacion ======================-->
























                        <div id="pedidos" class="tab-pane">
                            <h4>Send Message</h4>
                        </div>
                        <div id="events" class="tab-pane">
                            <h4>Events</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

@include('shop.modal.user-edit') 


@include('shop.modal.crear-datos-facturacion') 
@include('shop.modal.editar-datos-facturacion') 

@section('scriptdatepicker')
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true  
    });
  });
</script>
@stop

@endsection
