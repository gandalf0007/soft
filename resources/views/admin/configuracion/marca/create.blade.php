@extends('layouts.app')
@include('alerts.errors')
@section('content')

<div class="panel-body">
<div class="col-lg-6">
<div class="container-fluid">

{!!Form::open(['route'=>'marca.store', 'method'=>'POST'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>

{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

</div>
</div>
</div>
@endsection
