<div class="form-horizontal">
	{!!Form::label('file', 'Cargue su Icono SVG') !!}
	{!!Form::file('icon')!!}
</div>
<br>
<div class="form-group">
	{!!Form::label('Nombre de la Categoria')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>
<br>
<div class="form-horizontal">
	{!!Form::label('file', 'Cargar Banner') !!}
	{!!Form::file('banner')!!}
</div>