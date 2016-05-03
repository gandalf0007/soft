@extends('layouts.admin')
@section('content')
<!-- mostrar mensjae de validacion-->
@include('alerts.request')

<!-- $user es el elemento que estamos recibiendo y usuario.update hace referencia a la funcion update
de UsuarioController y el metodo PUT es para actualizar-->
{!!Form::model($marca,['route'=>['marca.update',$marca->id],'method'=>'PUT'])!!}

<div class="form-group">
	{!!Form::label('descripcion')!!}
	{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'ingrese la descripcion'])!!}
</div>

{!!Form::submit('modificar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

@endsection