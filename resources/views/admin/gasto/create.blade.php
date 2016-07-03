@extends('layouts.app')
@include('alerts.errors')
@section('content')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crear Nuevo Gasto</h3>
            </div>
			<div class="box-body">
@include('alerts.request')

{!!Form::open(['route'=>'gasto.store', 'method'=>'POST'])!!}
@include('admin.gasto.forms.formscreate')
{!!Form::submit('Crear',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}


</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


@section('scriptdatepicker')
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  $(function () {
   
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true  
    });

     $('#datepicker2').datepicker({
      autoclose: true
    });
   
  });
</script>
@stop

@endsection