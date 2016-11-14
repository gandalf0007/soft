<div class="panel panel-default">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Datos Del Cliente</h3>
 		</div>	
  <div class="panel-body">
<div class="row">


<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
	{!!Form::label('Nombre:  ')!!} {{$user->nombre}}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
	{!!Form::label('Apellido:  ')!!} {{$user->apellido}}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
	{!!Form::label('Direccion:  ')!!} {{$user->direccion}}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
	{!!Form::label('Email:  ')!!} {{$user->email}}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
	{!!Form::label('Telefono:  ')!!} {{$user->telefono}}
</div>



</div>
</div>
</div>





<div class="panel panel-default">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Porcentaje De Puntos</h3>
 		</div>	
  <div class="panel-body">
<div class="row">


<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
<div class="form-horizontal">
	{!!Form::label('Equipo')!!}
	{!!Form::text('equipo',null,['class'=>'form-control datepicker','placeholder'=>'nombre del equipo'])!!}
</div>
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
<div class="form-horizontal">
	{!!Form::label('Numero De Serie')!!}
	{!!Form::text('serie',null,['class'=>'form-control datepicker','placeholder'=>'ingrese el Numero de Serie'])!!}
</div>
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-3">	
<div class="form-horizontal">
	{!!Form::label('Accesorios')!!}
	{!!Form::text('accesorio',null,['class'=>'form-control datepicker','placeholder'=>'ingrese los Accesorios'])!!}
</div>
</div>





<div class="form-horizontal col-xs-12 col-sm-12 col-md-12"><br>
	{!!Form::label('Falla')!!}
	{!!Form::textarea ('falla',null,['class'=>'my-editor','id'=>'lfm','placeholder'=>'ingrese la Falla', 'row' => 100, 'cols' => 80])!!}
</div>

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12"><br>
	{!!Form::label('Observacion')!!}
	{!!Form::textarea ('observaciones',null,['class'=>'my-editor','id'=>'lfm','placeholder'=>'ingrese la Observacion', 'row' => 100, 'cols' => 80])!!}
</div>




</div>
</div>
</div>