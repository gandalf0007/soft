
<!--titulo-->
<div class="form-horizontal">
	{!!Form::label('Titulo:')!!}
	{!!Form::text('titulo',null,['class'=>'form-control ','placeholder'=>'ingrese el titulo'])!!}
</div>
<br>
<!--descripcion corta-->
<div class="form-horizontal">
	{!!Form::label('Descripcion Corta:')!!}
	{!!Form::textarea('descripcioncorta',null,['class'=>'form-control ','placeholder'=>'ingrese descripcion del producto'])!!}
</div>
<br>
<!--descripcion larga-->
<div class="form-horizontal">
	{!!Form::label('Descripcion Larga:')!!}
	{!!Form::textarea('descripcionlarga',null,['class'=>'form-control ','placeholder'=>'ingrese descricpicon larga'])!!}
</div>

<br>