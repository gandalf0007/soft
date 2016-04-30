<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<div class="form-group">
	{!!Form::label('correo')!!}
	{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'ingrese el correo'])!!}
</div>

<div class="form-group">
	{!!Form::label('password')!!}
	{!!Form::password('password',['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>