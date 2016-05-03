@extends('layouts.admin')
@include('alerts.errors')
@section('content')

{!!Form::open(['route'=>'marca.store', 'method'=>'POST'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>

{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


@endsection
