@extends('layouts.app')
@include('alerts.errors')
@section('content')

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responder Ticket</h3>
            </div>
			<div class="box-body">




{!!Form::model($ticket,['url'=>['tickets-comentario',$ticket->id],'method'=>'PUT' , 'files'=>True])!!}


@include('admin.ticket.forms.formsedit')

{!!Form::submit('Responder',['class'=>'btn btn-primary pull-right'])!!}
<a class="btn btn-primary pull-left" href="{!! URL::to('tickets') !!}">
  <i class="fa fa-backward fa-lg"></i> Back</a>
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
@endsection