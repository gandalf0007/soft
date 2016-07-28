
<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('nombre')!!}
	{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'ingrese el nombre'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('apellido')!!}
	{!!Form::text('apellido',null,['class'=>'form-control','placeholder'=>'ingrese el apellido'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('Cuit/Dni')!!}
	{!!Form::text('cuit',null,['class'=>'form-control','placeholder'=>'ingrese el cuit/Dni'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('Direccion')!!}
	{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'ingrese la direccion'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('Codigo Postal')!!}
	{!!Form::text('cp',null,['class'=>'form-control','placeholder'=>'ingrese el Codigo Postal'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
        <label for="tipo_pago" class="control-label">Provincia</label>
        {!! Form::select('provincia', config('options.provincia'),'', array('class' => 'form-control')) !!}
<br></div>


<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('Ciudad')!!}
	{!!Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'ingrese la Ciudad'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('telefono')!!}
	{!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'ingrese el telefono'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('telefono 2')!!}
	{!!Form::text('telefono2',null,['class'=>'form-control','placeholder'=>'ingrese el telefono 2'])!!}
<br></div>


<div class="form-group col-xs-12 col-sm-12 col-md-6">
<i class="fa fa-calendar"></i>
{!!Form::label('Fecha Inicial')!!}
{!!Form::text('nacimiento',null,['class'=>'form-control','id'=>'datepicker','placeholder'=>'AAAA/MM/DD'])!!}
<br></div>

<br>
<div class="form-group col-xs-12 col-sm-12 col-md-12">
  {!!Form::label('Eres Empresa?')!!}
  {!!Form::checkbox('empresa',1,false)!!}
</div>



<div class="">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>

