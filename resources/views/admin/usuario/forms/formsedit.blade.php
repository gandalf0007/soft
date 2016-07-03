
<div class="form-horizontal">
	{!!Form::label('file', 'File') !!}
	{!!Form::file('path')!!}
</div>

<div class="form-group">
	{!!Form::label('nombre')!!}
	{!!Form::text('usu_nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<div class="form-group">
	{!!Form::label('apellido')!!}
	{!!Form::text('usu_apellido',null,['class'=>'form-control','placeholder'=>'ingrese el apellido'])!!}
</div>

<div class="form-group">
	{!!Form::label('password')!!}
	{!!Form::password('password',['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>

<div class="form-group">
	{!!Form::label('email')!!}
	{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'ingrese el email'])!!}
</div>

<div class="form-group">
	{!!Form::label('Direccion')!!}
	{!!Form::text('usu_direcc',null,['class'=>'form-control','placeholder'=>'ingrese la Direccion'])!!}
</div>

<div class="form-group">
	{!!Form::label('telefono')!!}
	{!!Form::text('usu_tel',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<div class="form-group">
	{!!Form::label('perfil')!!}
	{!!Form::select('perfil_id',$perfils,'',['class'=>'form-control'])!!}
</div>

<div class="form-group">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>

  