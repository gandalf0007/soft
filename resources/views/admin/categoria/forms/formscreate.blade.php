<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Cargue su Icono SVG</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('file', '') !!}
	{!!Form::file('icon')!!}
</div>

</div>
</div>
</div>


<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Nombre de la Categoria</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-group col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

</div>
</div>
</div>


<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Cargar Banner</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('file', '') !!}
	{!!Form::file('banner')!!}
</div>

</div>
</div>
</div>