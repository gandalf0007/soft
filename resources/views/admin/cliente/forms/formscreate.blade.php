<div class="form-group">
	{!!Form::label('Razon Social')!!}
	{!!Form::text('clie_nombres',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<div class="form-group">
	{!!Form::label('Direccion')!!}
	{!!Form::text('clie_direccion',null,['class'=>'form-control','placeholder'=>'ingrese la direccion'])!!}
</div>

<div class="form-group">
	{!!Form::label('Telefono')!!}
	{!!Form::text('clie_telefono',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<div class="form-group">
	{!!Form::label('Email')!!}
	{!!Form::text('clie_mail',null,['class'=>'form-control','placeholder'=>'ingrese el email'])!!}
</div>


<div class="form-group">
	{!!Form::label('Cuit')!!}
	{!!Form::text('clie_cuit',null,['class'=>'form-control','placeholder'=>'ingrese el Cuit'])!!}
</div>


<div class="form-group col-xs-3">
	{!!Form::label('Localidad')!!}
	{!!Form::select('clie_localidad',['class'=>' form-control'])!!}
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
	{!!Form::select('clie_lista_precio')!!}
</div>

<div class="form-group">
	{!!Form::label('Observacion')!!}
	{!!Form::textarea('clie_observacion',null,['class'=>'form-control','placeholder'=>'ingrese la observacion'])!!}
</div>

<div class="form-group">
	{!!Form::label('Habilitado')!!}
	{!!Form::checkbox('clie_habilitado',null,['class'=>'form-control','placeholder'=>''])!!}
</div>

<div class="form-group">
	{!!Form::label('Habilitado Cta Cte')!!}
	{!!Form::checkbox('clie_hab_cta',null,['class'=>'form-control','placeholder'=>''])!!}
</div>

