@foreach($gastos as $gasto)
<div class="modal fade" id="confirmDelete-{{ $gasto->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Confirm gasto Deletion</h4>
         </div>
         <div class="modal-body">
             <p>Esta seguro que desea eliminar el Gasto seleccionado?</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>

              {!! Form::open(['method' => 'DELETE', 'route' => ['gasto.destroy',$gasto->id]]) !!}
             <button type="submit" class="btn btn-danger">Delete</button>
               {!! Form::close() !!}
         </div>
     </div>
   </div>
 </div>
	@endforeach