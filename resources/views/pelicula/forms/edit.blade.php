
<div class="form-group">
	{!!Form::label('nombre','nombre :')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<div class="form-group">
	{!!Form::label('elenco','elenco :')!!}
	{!!Form::text('cast',null,['class'=>'form-control','placeholder'=>'ingrese el correo'])!!}
</div>

<div class="form-group">
	{!!Form::label('direccion','Direccion :')!!}
	{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>

<div class="form-group">
	{!!Form::label('Duracion','Duracion :')!!}
	{!!Form::text('duracion',null,['class'=>'form-control','placeholder'=>'ingrese el password'])!!}
</div>

<div class="form-group">
	{!!Form::label('Poster','Poster :')!!}
	{!!Form::file('path')!!}
</div>

<div class="form-group">
	{!!Form::label('Genero','Genero :')!!}
	{!!Form::select('genero_id',$generos)!!}
</div>