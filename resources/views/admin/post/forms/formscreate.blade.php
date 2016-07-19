
<!--titulo-->
<div class="form-horizontal">
	{!!Form::label('Titulo:')!!}
	{!!Form::text('titulo',null,['class'=>'form-control ','placeholder'=>'ingrese el titulo'])!!}
</div>
<br>
<!--descripcion corta-->
<div class="form-horizontal">
	{!!Form::label('Descripcion Corta:')!!}
	{!!Form::textarea('descripcioncorta',null,['class'=>'form-control ','placeholder'=>'ingrese descripcion del producto', 'rows' => 50, 'cols' => 40])!!}
</div>
<br>
<!--descripcion larga-->
<div class="form-horizontal">
	{!!Form::label('Descripcion Larga:')!!}
	{!!Form::textarea('descripcionlarga',null,['class'=>'form-control ','placeholder'=>'ingrese descricpicon larga', 'rows' => 50, 'cols' => 40])!!}
</div>

<div class="form-group">
	{!!Form::label('Creado Por :')!!}
	{!!Form::select('user_id',$user,'',['class'=>'form-control'])!!}
</div>


<br>