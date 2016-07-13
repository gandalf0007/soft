@foreach($informacions as $informacion)
<div class="modal fade" id="confirmDelete-{{ $informacion->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Confirm info Deletion</h4>
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea eliminar la informacion ?</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>

              {!! Form::open(['method' => 'DELETE', 'route' => ['informacion.destroy',$informacion->id]]) !!}
             <button type="submit" class="btn btn-danger">Delete</button>
               {!! Form::close() !!}
         </div>
     </div>
   </div>
 </div>
	@endforeach