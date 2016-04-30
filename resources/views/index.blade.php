<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Soft Shark</title>
        <link rel="stylesheet" href="css/login.css"> 
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
     <br><br>

       
          <form  role="form" method="POST" action="{{ url('/login') }}">
              {!! csrf_field() !!}
                <fieldset class="clearfix">
                <!--input del email -->
                    <p>
                      <span class="fontawesome-user"></span>  
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">  

                            <input type="text"  name="email" value="{{ old('email') }}" onBlur="if(this.value == '') this.value = 'email'" onFocus="if(this.value == 'email') this.value = ''" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                       
                        </div>
                    </p>
                    <!--input del password -->
                    <p>
                      <span class="fontawesome-lock"></span>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">          
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </p>
                    <!--input del boton  -->
                    <p><input type="submit" value="Sign In"></p>
                </fieldset> 
              </form><!-- end formulario -->

                    <p><a href="{{ url('password/email') }}" class="blue">Forgot Your Password?</a><span class="fontawesome-arrow-right"></span></p>

                    <p>Not a member? <a href="#" class="blue">Sign up now</a><span class="fontawesome-arrow-right"></span></p>

                </div>
              
            </div> <!-- end login -->
  </body>
</html>
