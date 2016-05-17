@extends('layouts.app')
@include('alerts.errors')
@section('content')

<div class="panel-body">
<div class="col-lg-6">
<div class="container-fluid">

{!!Form::open(['route'=>'provedor.store', 'method'=>'POST'])!!}
@include('admin.provedor.forms.formscreate')
{!!Form::submit('registrar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

</div>
</div>
</div>
@endsection