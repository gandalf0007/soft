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
<input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" value="{{ old('nombre') }}"/>
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" class="form-control" placeholder="Ingrese Apellido" name="apellido" value="{{ old('apellido') }}"/>             
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="email" class="form-control" placeholder="Ingrese Email" name="email" value="{{ old('email') }}"/>
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-lock"></i></span>
<input type="password" class="form-control" placeholder="Ingrese Password" name="password"/>    
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-log-in"></i></span>
<input type="password" class="form-control" placeholder="Retype password" name="password_confirmation"/>   
</div>
                
<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="text" class="form-control" placeholder="Ingrese direccion" name="direccion" value="{{ old('direccion') }}"/>
</div>

<div class="input-group">
<span class="input-group-addon btn-azul"><i class="glyphicon glyphicon-phone"></i></span>
<input type="text" class="form-control" placeholder="Ingrese telefono" name="telefono" value="{{ old('telefono') }}"/>
</div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-azul pull-left"><i class="glyphicon glyphicon-log-in"></i> Resgistrar</button>                          
                        </div>
                    </div>

                </form>     
<a href="{{ url('/password/reset') }}">Olvidé mi contraseña</a><br>
<a href="{{ url('/register') }}" class="text-center">Registrar</a>


            </div>                     
        </div>  



</div>
</div>
 </div>


</div>


     </div>
   </div>
 </div>