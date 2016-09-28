<div class="panel panel-default">
    <div class="panel-body">
        <div class="content">
            <h2 class="header">
                {{ $ticket->subject }}
                <span class="pull-right">
                    
                </span>
            </h2>
            <div class="panel well well-sm">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-md-6">
                           <p> <strong>Usuario :</strong> {{ $ticket->user->nombre }}</p>
                            
                            <p><strong>Status :</strong>
                            @if($ticket->status->nombre == "PENDIENTE")
                                <span style="color: orange">{{$ticket->status->nombre}}</span>
                             @else
                             	<span style="color: green">{{$ticket->status->nombre}}</span>
                             @endif
                            </p>

                            <p><strong>Prioridad : </strong>
                                <span>{{ $ticket->priority->nombre }}</span>
                            </p>

                        </div>
                        <div class="col-md-6">
                           	<p>
                                <strong>Responsable : </strong>
                                @if(!empty($ticket->agent_id))
                                <span>{{ $ticket->agent->nombre }}</span>
                                @endif
                            </p>

                            <p>
                                <strong>Categoria : </strong>
                                <span>{{ $ticket->category->nombre }}</span>
                            </p>

                            <p> <strong>Created : </strong>
                            <span>{{ $ticket->created_at }}</span>
                            </p>

                            <p> <strong>Last Update : </strong>
                            <span>{{ $ticket->updated_at }}</span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <p> {{ $ticket->content }} </p>
            </div>
        </div>
        
    </div>
</div>



<br>
<h1>Comentarios</h1>

@foreach($comentarios as $comentario)
<div class="panel panel-default">
		<div class="panel-heading">
   		 	<h3 class="panel-title">{{$comentario->user->nombre}}  <div class="pull-right">{{$comentario->created_at}}</div></h3>
 		</div>	
  <div class="panel-body">
<div class="row">
	
  <div class="col-md-3">
  {!! $comentario->comment !!}
  </div>

</div>
</div>
</div>
@endforeach
   

<br>
<div class="panel panel-primary">
		<div class="panel-heading">
   		 	<h3 class="panel-title">Responder</h3>
 		</div>	
  <div class="panel-body">
<div class="row">

<div class="form-horizontal col-xs-12 col-sm-12 col-md-12">
	{!!Form::label('')!!}
	{!!Form::textarea ('comentario',null,['class'=>'my-editor','id'=>'lfm','placeholder'=>'ingrese la observacion', 'row' => 100, 'cols' => 80])!!}
</div>
<br>
</div>
</div>
</div>