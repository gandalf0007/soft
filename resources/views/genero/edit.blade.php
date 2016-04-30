@extends('layouts.admin')
@section('content')
<!-- mostrar mensjae de validacion-->
@include('alerts.request')

<!-- el usuario.store llama a la funcion store del UsuarioController-->
{!!Form::model($genero,['route'=>['genero.update',$genero->id],'method'=>'PUT'])!!}
@include('genero.forms.genero')
{!!Form::submit('modificar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}



@endsection