<style>
.color1{

	color: #00ba8b;
}	
</style>
<br><br>

<!-- .................................... tabla descripcion................................. -->

<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Descripcion y Codigo</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<table class="table">
<thead>
		<th class="color1"></th>
</thead>
<tbody>

<td>
<!--codigo-->
<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">
	{!!Form::label('codigo:')!!}
	{!!Form::text('pro_codigo',null,['class'=>'form-control ','placeholder'=>'ingrese el codigo del producto'])!!}
</div>

<!--descripcion-->
<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">
	{!!Form::label('descripcion:')!!}
	{!!Form::text('pro_descrip',null,['class'=>'form-control ','placeholder'=>'ingrese descripcion del producto'])!!}
</div>
<!--imagen-->
<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">
	{!!Form::label('file', 'Imagen') !!}
	{!!Form::file('path')!!}
</div>
</td>
</tbody>
</table>

</div>
</div>
</div>

<!-- .................................... tabla Precios................................. -->
<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Precios</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<table class="table">
<thead>
		<th class="color1"></th>
</thead>
<tbody>
<td>
<!--precio costo-->
<div class="form-horizontal">
	{!!Form::label('precio costo')!!}
	{!!Form::text('pro_preciocosto',null,['class'=>'form-control','placeholder'=>'ingrese el precio de costo'])!!}
</div>

<!--iva id-->
<div class="form-horizontal">
	{!!Form::label('iva id')!!} <br>
	{!!Form::select('iva_id',$ivatipos,'',['class'=>'form-control'])!!}
</div>
</td>
<td>
<!--precio venta-->
<div class="form-horizontal">
	{!!Form::label('precio venta')!!}
	{!!Form::text('pro_venta',null,['class'=>'form-control','placeholder'=>'ingrese el precio de venta'])!!}
</div>

<!--rentabilidad 1-->
<div class="form-horizontal">
	{!!Form::label('rentabilidad 1')!!}
	{!!Form::text('pro_rentabi1',null,['class'=>'form-control','placeholder'=>'ingrese la rentabilidad 1'])!!}
</div>
</td>
<td>
<!--precio 2-->
<div class="form-horizontal">
	{!!Form::label('precio 2')!!}
	{!!Form::text('pro_precio2',null,['class'=>'form-control','placeholder'=>'ingrese el precio 2'])!!}
</div>

<!--rentabilidad 2-->
<div class="form-horizontal">
	{!!Form::label('rentabilidad 2')!!}
	{!!Form::text('pro_rentabi2',null,['class'=>'form-control','placeholder'=>'ingrese la rentabilidad 2'])!!}
</div>
</td>
<td>
<!--precio 3-->
<div class="form-horizontal">
	{!!Form::label('precio 3')!!}
	{!!Form::text('pro_precio3',null,['class'=>'form-control','placeholder'=>'ingrese la precio 3'])!!}
</div>

<!--rentabilidad 3-->
<div class="form-horizontal">
	{!!Form::label('rentabilidad 3')!!}
	{!!Form::text('pro_rentabi3',null,['class'=>'form-control','placeholder'=>'ingrese la rentabilidad 3'])!!}
</div>
</td>
</tbody>
</table>

</div>
</div>
</div>

<!-- .................................... tabla stock................................. -->
<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Stock</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<table class="table">
<thead>
		<th class="color1"></th>

</thead>
<tbody>

<td>
<!--stock critico-->
<div class="form-horizontal">
	{!!Form::label('stock critico')!!}
	{!!Form::text('pro_atock_cri',null,['class'=>'form-control','placeholder'=>'ingrese el stock critico'])!!}
</div>
</td>
<td>
<!--stock actul-->
<div class="form-horizontal">
	{!!Form::label('stock actul')!!}
	{!!Form::text('pro_atock_act',null,['class'=>'form-control','placeholder'=>'ingrese el stock actul'])!!}
</div>
</td>
<td>
<!--stock pedido-->
<div class="form-horizontal">
	{!!Form::label('stock pedido')!!}
	{!!Form::text('pro_atock_ped',null,['class'=>'form-control','placeholder'=>'ingrese el stock de pedido'])!!}
</div>
</td>
</tbody>
</table>

</div>
</div>
</div>

<!-- ...........................tabla Rubro , Marca y Provedor................................. -->
<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Rubro , Marca y Provedor</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<table class="table">
<thead>
		<th class="color1"></th>
</thead>
<tbody>
<td>
<!--rubro id-->
<div class="form-horizontal">
	{!!Form::label('rubro id')!!}
	{!!Form::select('rubro_id',$rubros,'',['class'=>'form-control'])!!}
</div>
</td>
<td>
<!--marca id-->
<div class="form-horizontal">
	{!!Form::label('marca id')!!}
	{!!Form::select('marca_id',$marcas,'',['class'=>'form-control'])!!}
</div>
</td>
<td>
<!--provedor-->
<div class="form-horizontal">
	{!!Form::label('provedores')!!}
	{!!Form::select('provedor_id',$provedores,'',['class'=>'form-control'])!!}
</div>
</td>
</tbody>
</table>

</div>
</div>
</div>

<!-- ...........................tabla otras opciones................................. -->
<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Otras Opciones</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<table class="table">
<thead>
		<th class="color1"></th>
</thead>
<tbody>
<td>
<!--codigo alternativo-->
<div class="form-horizontal">
	{!!Form::label('codigo alternativo')!!}
	{!!Form::text('pro_cod_alter',null,['class'=>'form-control','placeholder'=>'ingrese el codigo alternativo'])!!}
</div>
</td>

<td>
<!--ubicacion-->
<div class="form-horizontal ">
	{!!Form::label('ubicacion')!!}
	{!!Form::text('pro_ubicacion',null,['class'=>'form-control','placeholder'=>'ingrese la ubicacion'])!!}
</div>
</td>

<td>
<!--codigo de bulto-->
<div class="form-horizontal ">
	{!!Form::label('codigo de bulto')!!}
	{!!Form::text('pro_cod_bulto',null,['class'=>'form-control','placeholder'=>'ingrese el codigo de bulto'])!!}
</div>
<!--cantidad de bulto-->
<div class="form-horizontal ">
	{!!Form::label('cantidad de bulto')!!}
	{!!Form::text('pro_cant_bulto',null,['class'=>'form-control','placeholder'=>'ingrese la cantidad de bulto'])!!}
</div>

</td>

</tbody>
</table>

	<div class="form-horizontal col-xs-12 col-sm-12 col-md-9">
	{!!Form::label('observacioes')!!}
	{!!Form::textarea ('pro_observaciones',null,['class'=>'form-control dropzone','id'=>'editor','placeholder'=>'ingrese la observacion'])!!}
</div>
<br>

</div>
</div>
</div>


<!--observacioes-->


