<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Editar Datos de Usuario</h3>
 		</div>	
  <div class="panel-body ">
<div class="row ">


<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('file', 'Imagen') !!}
	{!!Form::file('path')!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('nombre')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('apellido')!!}
	{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'ingrese el apellido'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('password')!!}
	{!!Form::password('password',['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('re-password')!!}
	{!!Form::text('re_password',null,['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('email')!!}
	{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'ingrese el email'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('Direccion')!!}
	{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'ingrese la Direccion'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('Provincia')!!}
	{!!Form::text('provincia',null,['class'=>'form-control','placeholder'=>'ingrese la Provincia'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('Ciudad')!!}
	{!!Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'ingrese la Ciudad'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('Codigo Postal')!!}
	{!!Form::text('cp',null,['class'=>'form-control','placeholder'=>'ingrese la Codigo Postal'])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-8">
	{!!Form::label('telefono')!!}
	{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>


<div class="form-group">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>


</div>
</div>
</div>