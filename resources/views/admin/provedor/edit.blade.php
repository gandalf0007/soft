@extends('layouts.admin')
@section('content')

<!-- mostrar mensjae de validacion-->
@include('alerts.request')


<div class="panel-body">
<div class="col-lg-6">
<div class="container-fluid">
<!-- $user es el elemento que estamos recibiendo y usuario.update hace referencia a la funcion update
de UsuarioController y el metodo PUT es para actualizar-->
{!!Form::model($provedore,['route'=>['provedor.update',$provedore->id],'method'=>'PUT'])!!}

@include('admin.provedor.forms.formscreate')

{!!Form::submit('modificar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}

</div>
</div>
</div>



@endsection