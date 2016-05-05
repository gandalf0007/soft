@extends('layouts.admin')
@include('alerts.errors')
@section('content')

{!!Form::open(['route'=>'provedor.store', 'method'=>'POST'])!!}
@include('admin.provedor.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


@endsection