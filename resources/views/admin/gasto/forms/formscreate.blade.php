<div class="panel panel-default">
		<div class="panel-heading">
   		 	<h3 class="panel-title">DETALLE</h3>
 		</div>	
  <div class="panel-body">
<div class="row">
	

  <div class="col-md-3">
  	<div class="form-horizontal">
	{!!Form::label('Fecha:')!!}
	{!!Form::text('fecha',null,['class'=>'form-control datepicker','placeholder'=>'ingrese el codigo del producto'])!!}
	</div>
  </div>

  <div class="col-md-3">
  	<div class="form-horizontal">
	{!!Form::label('Tipo de Gasto:')!!}
	{!! Form::select('tipo_gasto', config('options.tipogasto'),'', array('class' => 'form-control')) !!}
	</div>
  </div>

  <div class="col-md-3">
  	<div class="form-group">
        {!!Form::label('Tipo de Pago:')!!}
        {!! Form::select('tipo_pago', config('options.tipopago'),'', array('class' => 'form-control')) !!}
     </div>
  </div>

   <div class="col-md-3">
  	<div class="form-horizontal">
	{!!Form::label('Importe:')!!}
	{!!Form::text('importe',null,['class'=>'form-control ','placeholder'=>'ingrese descripcion del producto'])!!}
	</div>
  </div>

</div>
</div>
</div>


<div class="panel panel-default">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Justificante</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

  <div class="col-md-6">
	<div class="form-horizontal">
	{!!Form::label('justificante', 'File') !!}
	{!!Form::file('justificante')!!}
	</div>
  </div>

</div>
</div>
</div>

<div class="panel panel-default">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Concepto</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

  <div class="col-md-6">
	<div class="form-horizontal">
	{!!Form::label('concepto')!!}
	{!!Form::textarea ('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la observacion'])!!}
	</div>
  </div>

</div>
</div>
</div>

