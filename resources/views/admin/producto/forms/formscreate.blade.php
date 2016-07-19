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
	{!!Form::text('codigo',null,['class'=>'form-control ','placeholder'=>'ingrese el codigo del producto'])!!}
</div>

<!--descripcion-->
<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">
	{!!Form::label('descripcion:')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control ','placeholder'=>'ingrese descripcion del producto'])!!}
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
	{!!Form::text('preciocosto',null,['class'=>'form-control','placeholder'=>'ingrese el precio de costo'])!!}
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
	{!!Form::text('precioventa',null,['class'=>'form-control','placeholder'=>'ingrese el precio de venta'])!!}
</div>

<!--rentabilidad 1-->
<div class="form-horizontal">
	{!!Form::label('rentabilidad 1')!!}
	{!!Form::text('rentabi1',null,['class'=>'form-control','placeholder'=>'ingrese la rentabilidad 1'])!!}
</div>
</td>
<td>
<!--precio 2-->
<div class="form-horizontal">
	{!!Form::label('precio 2')!!}
	{!!Form::text('precio2',null,['class'=>'form-control','placeholder'=>'ingrese el precio 2'])!!}
</div>

<!--rentabilidad 2-->
<div class="form-horizontal">
	{!!Form::label('rentabilidad 2')!!}
	{!!Form::text('rentabi2',null,['class'=>'form-control','placeholder'=>'ingrese la rentabilidad 2'])!!}
</div>
</td>
<td>
<!--precio 3-->
<div class="form-horizontal">
	{!!Form::label('precio 3')!!}
	{!!Form::text('precio3',null,['class'=>'form-control','placeholder'=>'ingrese la precio 3'])!!}
</div>

<!--rentabilidad 3-->
<div class="form-horizontal">
	{!!Form::label('rentabilidad 3')!!}
	{!!Form::text('rentabi3',null,['class'=>'form-control','placeholder'=>'ingrese la rentabilidad 3'])!!}
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
	{!!Form::text('stockcritico',null,['class'=>'form-control','placeholder'=>'ingrese el stock critico'])!!}
</div>
</td>
<td>
<!--stock actul-->
<div class="form-horizontal">
	{!!Form::label('stock actul')!!}
	{!!Form::text('stockactual',null,['class'=>'form-control','placeholder'=>'ingrese el stock actul'])!!}
</div>
</td>
<td>
<!--stock pedido-->
<div class="form-horizontal">
	{!!Form::label('stock pedido')!!}
	{!!Form::text('stockpedido',null,['class'=>'form-control','placeholder'=>'ingrese el stock de pedido'])!!}
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
	{!!Form::text('cod_alter',null,['class'=>'form-control','placeholder'=>'ingrese el codigo alternativo'])!!}
</div>
</td>

<td>
<!--ubicacion-->
<div class="form-horizontal ">
	{!!Form::label('ubicacion')!!}
	{!!Form::text('ubicacion',null,['class'=>'form-control','placeholder'=>'ingrese la ubicacion'])!!}
</div>
</td>

<td>
<!--codigo de bulto-->
<div class="form-horizontal ">
	{!!Form::label('codigo de bulto')!!}
	{!!Form::text('cod_bulto',null,['class'=>'form-control','placeholder'=>'ingrese el codigo de bulto'])!!}
</div>
<!--cantidad de bulto-->
<div class="form-horizontal ">
	{!!Form::label('cantidad de bulto')!!}
	{!!Form::text('cant_bulto',null,['class'=>'form-control','placeholder'=>'ingrese la cantidad de bulto'])!!}
</div>

</td>

</tbody>
</table>

</div>
</div>
</div>


<!--observacioes-->
<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Descripcion Corta</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('')!!}
	{!!Form::textarea ('descripcioncorta',null,['class'=>'form-control dropzone','id'=>'editor','placeholder'=>'ingrese la observacion'])!!}<br><br><br>
</div>

</div>
</div>
</div>
<br>

<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Descripcion Larga</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('')!!}
	{!!Form::textarea ('descripcionlarga',null,['class'=>'form-control dropzone','id'=>'editor','placeholder'=>'ingrese la observacion', 'rows' => 30, 'cols' => 40])!!}
</div>
<br>
</div>
</div>
</div>



<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Imagenes</h3>
 		</div>	
  <div class="panel-body">
<div class="row">
<!--imagen-->
<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">
	{!!Form::label('file', 'Imagen') !!}
	{!!Form::file('imagen1')!!}
</div>

<!--imagen-->
<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">
	{!!Form::label('file', 'Imagen') !!}
	{!!Form::file('imagen2')!!}
</div>

<!--imagen-->
<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">
	{!!Form::label('file', 'Imagen') !!}
	{!!Form::file('imagen3')!!}
</div>

</div>
</div>
</div>


