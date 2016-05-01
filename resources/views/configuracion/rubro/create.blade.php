@extends('layouts.admin')
@include('alerts.errors')
@section('content')

{!!Form::open(['route'=>'rubro.store', 'method'=>'POST'])!!}
@include('configuracion.rubro.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


@endsection