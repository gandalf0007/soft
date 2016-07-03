<div class="form-horizontal">
	{!!Form::label('file', 'File') !!}
	{!!Form::file('path')!!}
</div>

<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<div class="form-group">
	{!!Form::label('apellido')!!}
	{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'ingrese el apellido'])!!}
</div>

<div class="form-group">
	{!!Form::label('password')!!}
	{!!Form::password('password',['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>

<div class="form-group">
	{!!Form::label('re-password')!!}
	{!!Form::text('re_password',null,['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>

<div class="form-group">
	{!!Form::label('email')!!}
	{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'ingrese el email'])!!}
</div>

<div class="form-group">
	{!!Form::label('Direccion')!!}
	{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'ingrese la Direccion'])!!}
</div>

<div class="form-group">
	{!!Form::label('telefono')!!}
	{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<div class="form-group">
	{!!Form::label('perfil')!!}
	{!!Form::select('perfil_id',$perfils,'',['class'=>'form-control'])!!}
</div>
