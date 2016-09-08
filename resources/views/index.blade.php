<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Soft Shark</title>

       
        {!!Html::style('css/logincloud.css')!!}
        

  </head>

  <body>
  <!-- Time for multiple clouds to dance around -->
  <div id="clouds">
	<div class="cloud x1"></div>
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">
      <div id="login">
     <br><br><br><br>

          <form  role="form" method="POST" action="{{ url('/login') }}">
             <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                <fieldset class="clearfix">
                <!--input del email -->
                    <p>
                      <span class="fontawesome-user"></span>  
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">  
                          <div class="">
                            <input type="text"  name="email" value="{{ old('email') }}" onBlur="if(this.value == '') this.value = 'email'" onFocus="if(this.value == 'email') this.value = ''" required>

                                @if ($errors->has('email'))
                                    <li class="help-block">
                                        {{ $errors->first('email') }}
                                    </li>
                                @endif      
                          </div>                     
                        </div>
                    </p>
                    <!--input del password -->
                    <p>
                      <span class="fontawesome-lock"></span>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">          
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <li class="help-block">
                                        {{ $errors->first('password') }}
                                    </li>
                                @endif
                        </div>
                    </p>
                    <!--input del boton  -->
                    <p><input type="submit" value="Sign In"></p>
                </fieldset> 
              </form><!-- end formulario -->

                    <p><a href="{{ url('password/email') }}" class="blue">Forgot Your Password?</a><span class="fontawesome-arrow-right"></span></p>

                    <p>Not a member? <a href="{{ url('/register') }}" class="blue">Sign up now</a><span class="fontawesome-arrow-right"></span></p>

                </div>
            </div> <!-- end login -->
  </body>
</html>
