@extends('layouts.admin')
@include('alerts.errors')
@section('content')

{!!Form::open(['route'=>'producto.store', 'method'=>'POST' , 'files'=>True ])!!}
@include('admin.producto.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


@endsection