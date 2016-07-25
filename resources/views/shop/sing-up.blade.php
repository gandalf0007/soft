@extends('layouts.shopmenu')


@section('content')

  
     

        <div class="panel-heading">
            <h3 class="panel-title">Inicio de Sesion</h3>
        </div>  



<div class="center-block">
<div class="row">
{!!Form::open(['url'=>'/login', 'method'=>'POST'])!!}
 <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">


                <!--input del email -->
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">  
    <div class="input-group col-xs-4">
   
      <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
      <input type="text" name="email" class="form-control" id="exampleInputAmount" placeholder="Email" value="{{ old('email') }}" onBlur="if(this.value == '') this.value = 'email'" onFocus="if(this.value == 'email') this.value = ''" required>
    </div>
    @if ($errors->has('email'))
            <li class="help-block">
                {{ $errors->first('email') }}
            </li>
       @endif      

    </div>

        <p>
        <span class="fontawesome-user"></span>  
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> </div>
        </p>

                    <!--input del password -->
   
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
         <div class="input-group col-xs-4 ">
            <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
      <input type="password" name="password" class="form-control" id="exampleInputAmount" placeholder="Password">                      
    </div>
                                @if ($errors->has('password'))
                                    <li class="help-block">
                                        {{ $errors->first('password') }}
                                    </li>
                                @endif
     </div>          

<!--input del boton  -->
{!!Form::submit('Sign In',['class'=>'btn btn-primary'])!!}       
{!!Form::close()!!}

                    <p><a href="{{ url('password/email') }}" class="blue">Forgot Your Password?</a><span class="fontawesome-arrow-right"></span></p>

                    <p>Not a member? <a href="{{ url('/register') }}" class="blue">Sign up now</a><span class="fontawesome-arrow-right"></span></p>

</div>
</div>
         



@endsection