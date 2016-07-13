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


<div class="form-group col-xs-3">
	{!!Form::label('Localidad')!!}
	{!!Form::select('localidad',['class'=>' form-control'])!!}
</div>

<div class="form-group col-xs-3">
	{!!Form::label('Categoria Iva')!!}
	{!!Form::select('iva_id',$ivas,'',['class'=>' form-control'])!!}
</div>

<div class="form-group col-xs-3">
	{!!Form::label('Transporte')!!}
	{!!Form::select('transporte_id',$transportes,'',['class'=>' form-control'])!!}
</div>

<div class="form-group col-xs-3">
	{!!Form::label('Lista de Precio')!!}
	{!!Form::select('lista_precio')!!}
</div>

<div class="form-group">
	{!!Form::label('Observacion')!!}
	{!!Form::textarea('observacion',null,['class'=>'form-control','placeholder'=>'ingrese la observacion'])!!}
</div>

<div class="form-group">
	{!!Form::label('Habilitado')!!}
	{!!Form::checkbox('habilitado',null,['class'=>'form-control','placeholder'=>''])!!}
</div>

<div class="form-group">
	{!!Form::label('Habilitado Cta Cte')!!}
	{!!Form::checkbox('cuentacorriente',null,['class'=>'form-control','placeholder'=>''])!!}
</div>

