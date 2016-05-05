@extends('layouts.admin')
@include('alerts.errors')
@section('content')


<div class="panel-body">
<div class="col-lg-6">
<div class="container-fluid">

{!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
@include('admin.usuario.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


</div>
</div>
</div>
@endsection