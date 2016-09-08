<div class="form-group">
	{!!Form::label('Razon Social')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<div class="form-group">
	{!!Form::label('Direccion')!!}
	{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'ingrese la direccion'])!!}
</div>

<div class="form-group">
	{!!Form::label('Telefono')!!}
	{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<div class="form-group">
	{!!Form::label('Email')!!}
	{!!Form::text('email',null,['class'=>'form-control','placeholder'=>'ingrese el email'])!!}
</div>


<div class="form-group">
	{!!Form::label('Cuit')!!}
	{!!Form::text('cuit',null,['class'=>'form-control','placeholder'=>'ingrese el Cuit'])!!}
</div>


<div class="row">
<div class="form-group col-xs-6">
	{!!Form::label('Categoria Iva')!!}
	{!!Form::select('iva_id',$ivas,'',['class'=>' form-control'])!!}
</div>

<div class="form-group col-xs-6">
	{!!Form::label('Transporte')!!}
	{!!Form::select('transporte_id',$transportes,'',['class'=>' form-control'])!!}
</div>
</div>

<br>
<div class="form-group ">
	{!!Form::label('Habilitado')!!}
	{!!Form::checkbox('habilitado',null,['class'=>'form-control','placeholder'=>''])!!}
</div>

<div class="form-group">
	{!!Form::label('Habilitado Cta Cte')!!}
	{!!Form::checkbox('cuentacorriente',null,['class'=>'form-control','placeholder'=>''])!!}
</div>

 
<div class="form-horizontal ">
	{!!Form::label('observacion')!!}
	{!!Form::textarea ('observacion',null,['class'=>'form-control dropzone','id'=>'editor','placeholder'=>'ingrese la observacion'])!!}<br><br><br>
</div>