@extends('layouts.admin')
@include('alerts.errors')
@section('content')

{!!Form::open(['route'=>'ivatipo.store', 'method'=>'POST'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>

<div class="form-group">
	{!!Form::label('valor')!!}
	{!!Form::text('valor',null,['class'=>'form-control','placeholder'=>'ingrese el valor'])!!}
</div>

{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


@endsection
