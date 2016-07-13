<div class="form-group">
	{!!Form::label('Nombre de la Sub-Categoria')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>
<br>
<div class="form-group">
	{!!Form::label('Categoria Padre')!!}
	{!!Form::select('categoria_id',$categoriasList,'',['class'=>'form-control'])!!}
</div>