@extends('layouts.app')
@section('content')
<!-- mostrar mensjae de validacion-->
@include('alerts.request')

<div class="panel-body">
<div class="col-lg-6">
<div class="container-fluid">

<!-- $user es el elemento que estamos recibiendo y usuario.update hace referencia a la funcion update
de UsuarioController y el metodo PUT es para actualizar-->
{!!Form::model($ivatipo,['route'=>['ivatipo.update',$ivatipo->id],'method'=>'PUT'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>

<div class="form-group">
	{!!Form::label('valor')!!}
	{!!Form::text('valor',null,['class'=>'form-control','placeholder'=>'ingrese el valor'])!!}
</div>

{!!Form::submit('modificar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

</div>
</div>
</div>
@endsection