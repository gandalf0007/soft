<div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
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
<a href="" data-toggle="modal" data-target="#registrarse" id="#registrarse" class="text-center">Registrar</a>



            </div>                     
        </div>  



</div>
</div>
 </div>


</div>


     </div>
   </div>
 </div>