
<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Nombre de la Sub-Categoria</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
</div>

</div>
</div>
</div>





<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Categoria Padre</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('')!!}
	{!!Form::select('categoria_id',$categoriasList,'',['class'=>'form-control'])!!}
</div>

</div>
</div>
</div>