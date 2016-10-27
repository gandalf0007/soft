
<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('Razon Social')!!}
	{!!Form::text('razonsocial',null,['class'=>'form-control','placeholder'=>'ingrese la Razon Social'])!!}
<br></div>

<div class="form-group col-xs-12 col-sm-12 col-md-6">
	{!!Form::label('Cuit/Dni')!!}
	{!!Form::text('cuit',null,['class'=>'form-control','placeholder'=>'ingrese el cuit/Dni'])!!}
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

