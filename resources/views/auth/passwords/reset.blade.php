@extends('layouts.principal')
@section('content')
<div class="main-contact">
         <h3 class="head">CONTACT</h3>
         <p>WE'RE ALWAYS HERE TO HELP YOU</p>
         
    {!!Form::open()!!}

    <div class="col-md-6 contact-left">
    {!!Form::label('email')!!}
    {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'ingrese el correo'])!!}
         
         
         {!!Form::submit('Enviar link',['class'=>'btn btn-primary'])!!}
         {!!Form::close()!!}

</div>  
@endsection
