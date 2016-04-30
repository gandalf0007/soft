@extends('layouts.admin')
@include('alerts.errors')
@section('content')

{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
@include('admin.usuario.forms.userforms')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


@endsection