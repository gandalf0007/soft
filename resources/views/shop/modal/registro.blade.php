<div class="modal fade " id="registrarse" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Login</h4>
         </div>



<div class="container">
        <div class="center-block" >
    <div id="loginbox" class=" col-md-6  col-sm-9 "> 
        

<h2>POR QU&Eacute; REGISTRARSE?</h2>
<p align="justify">Para poder comprar, aprovechar las promociones y utilizar los medios de pago en nuestro sitio es requisitio estar correctamente registrado. En ning&uacute;n momento recibir&aacute; correo electr&oacute;nico que no haya solicitado. Pero se le pediran una serie de datos personales indispensables para cualquier operaci&oacute;n comercial.</p>
<p>&nbsp;</p>
<h2>PARA QU&Eacute; UTILIZAN MIS DATOS?</h2>
<div class="span4">
<p align="justify">Los datos solicitados son necesarios para confeccionar la factura de los productos comprados y la direcci&oacute;n f&iacute;sica para el envio de su compra.<br />Para m&aacute;s informaci&oacute; sobre nuestras pol&iacute;ticas en el tratamiento de los datos personales visite la secci&oacute;n <a href="{{ url('aviso-legal') }}">Terminos y Condiciones</a>.</p>
</div>


<img src="{{ asset('storage/paginas/home/login/lock.png') }}" alt="" width="128px" class="center-block"/><br>

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

                
    <form action="{{ url('/register') }}" method="post" id="form" class="form-horizontal">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" placeholder="Ingrese El Nombre" name="nombre" value="{{ old('nombre') }}"/>
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" placeholder="Ingrese El Apellido" name="apellido" value="{{ old('apellido') }}"/>             
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="email" class="form-control" placeholder="Ingrese El Email" name="email" value="{{ old('email') }}"/>
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" placeholder="Ingrese El Password" name="password"/>    
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-log-in"></i></span>
<input type="password" class="form-control" placeholder="Repetir El Password" name="password_confirmation"/>   
</div>
                
<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-home"></i></span>
<input type="text" class="form-control" placeholder="Ingrese su Domicilio" name="direccion" value="{{ old('direccion') }}"/>
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-phone"></i></span>
<input type="text" class="form-control" placeholder="Ingrese Un telefono" name="telefono" value="{{ old('telefono') }}"/>
</div>


<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-map-marker"></i></span>
{!! Form::select('provincia', config('options.provincia'),'', array('class' => 'form-control')) !!}
</div> 

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-map-marker"></i></span>
<input type="text" class="form-control" placeholder="Ingrese la Ciudad" name="ciudad" value="{{ old('ciudad') }}"/>
</div>  

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-map-marker"></i></span>
<input type="text" class="form-control" placeholder="Ingrese el Codigo Postal" name="cp" value="{{ old('cp') }}"/>
</div>                                                                   

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-azul pull-left"><i class="glyphicon glyphicon-log-in"></i> Resgistrar</button>                          
                        </div>
                    </div>

                </form>     


            </div>                     
        </div>  



</div>
</div>
 </div>


</div>


     </div>
   </div>
 </div>