@extends('layouts.admin')
@include('alerts.errors')
@section('content')

<div class="panel-body">
<div class="col-lg-8">
<div class="container-fluid">


{!!Form::open(['route'=>'producto.store', 'method'=>'POST' , 'files'=>True ])!!}
@include('admin.producto.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


</div>
</div>
</div>
@endsection