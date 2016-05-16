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
	{!!Form::text('password',null,['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
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
	{!!Form::label('perfil')!!}
	{!!Form::text('usu_perfil',null,['class'=>'form-control','placeholder'=>'ingrese el perfil'])!!}
</div>


<div class="form-group">
	{!!Form::label('telefono')!!}
	{!!Form::text('usu_tel',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<div class="form-group">
	{!!Form::label('perfil')!!}
	{!!Form::select('usu_perfil',$perfils)!!}
</div>