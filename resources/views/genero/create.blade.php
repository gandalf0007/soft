@extends('layouts.admin')
@section('content')
<!-- mostrar mensjae de validacion-->
@include('alerts.request')

<!-- el usuario.store llama a la funcion store del UsuarioController-->
{!!Form::open(['route'=>'genero.store', 'method'=>'POST'])!!}
@include('genero.forms.genero')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}



@endsection