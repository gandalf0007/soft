<!--descripcion-->
<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('pro_descrip',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

<!--imagen-->
<div class="form-group">
	{!!Form::label('file', 'File') !!}
	{!!Form::file('path')!!}
</div>

<!--precio costo-->
<div class="form-group">
	{!!Form::label('precio costo')!!}
	{!!Form::text('pro_preciocosto',null,['class'=>'form-control','placeholder'=>'ingrese el email'])!!}
</div>

<!--iva id-->
<div class="form-group">
	{!!Form::label('iva id')!!}
	{!!Form::select('iva_id',$ivatipos)!!}
</div>


<!--precio 1-->
<div class="form-group">
	{!!Form::label('precio 1')!!}
	{!!Form::text('pro_precio1',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--precio 2-->
<div class="form-group">
	{!!Form::label('precio 2')!!}
	{!!Form::text('pro_precio2',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--precio 3-->
<div class="form-group">
	{!!Form::label('precio 3')!!}
	{!!Form::text('pro_precio3',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--rentabilidad 1-->
<div class="form-group">
	{!!Form::label('rentabilidad 1')!!}
	{!!Form::text('pro_rentabi1',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--rentabilidad 2-->
<div class="form-group">
	{!!Form::label('rentabilidad 2')!!}
	{!!Form::text('pro_rentabi2',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--rentabilidad 3-->
<div class="form-group">
	{!!Form::label('rentabilidad 3')!!}
	{!!Form::text('pro_rentabi3',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--stock actul-->
<div class="form-group">
	{!!Form::label('stock actul')!!}
	{!!Form::text('pro_atock_act',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--stock critico-->
<div class="form-group">
	{!!Form::label('stock critico')!!}
	{!!Form::text('pro_atock_cri',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--stock pedido-->
<div class="form-group">
	{!!Form::label('stock pedido')!!}
	{!!Form::text('pro_atock_ped',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--rubro id-->
<div class="form-group">
	{!!Form::label('rubro id')!!}
	{!!Form::select('rubro_id',$rubros)!!}
</div>

<!--marca id-->
<div class="form-group">
	{!!Form::label('marca id')!!}
	{!!Form::select('marca_id',$marcas)!!}
</div>

<!--codigo alternativo-->
<div class="form-group">
	{!!Form::label('codigo alternativo')!!}
	{!!Form::text('pro_cod_alter',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--ubicacion-->
<div class="form-group">
	{!!Form::label('ubicacion')!!}
	{!!Form::text('pro_ubicacion',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--codigo de bulto-->
<div class="form-group">
	{!!Form::label('codigo de bulto')!!}
	{!!Form::text('pro_cod_bulto',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--cantidad de bulto-->
<div class="form-group">
	{!!Form::label('cantidad de bulto')!!}
	{!!Form::text('pro_cant_bulto',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--provedor-->
<div class="form-group">
	{!!Form::label('provedor')!!}
	{!!Form::text('provedor_id',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>

<!--observacioes-->
<div class="form-group">
	{!!Form::label('observacioes')!!}
	{!!Form::text('pro_observaciones',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
</div>




