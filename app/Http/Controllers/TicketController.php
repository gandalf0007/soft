<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Session;
use Redirect;
use Storage;
use Alert;
use Image;
use DB;
use Input;
use Soft\Ticket;
use Soft\Tickets_comment;
use Auth;

class TicketController extends Controller
{
   
    public function index(Request $request)
    {
        //ordenamos por usu_nombre y lo guaramos en $users
        $tickets = ticket::where('status_id','=',2)->orderBy('created_at','asc');
        $count = ticket::where('status_id','=',2)->count();
        //busqueda por descripccion
        $descripcion=$request->input('descripcion');
        if (!empty($descripcion)) { 
            $tickets->where('subject','LIKE','%'.$descripcion.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('codigo');
        if (!empty($codigo)) {
            $productos->where('codigo','LIKE','%'.$codigo.'%');
        }
        
        $tickets=$tickets->paginate(10);
       
        return view('admin.ticket.index',compact('count','tickets')); 
    }



    public function TicketCompletados(Request $request)
    {
        //ordenamos por usu_nombre y lo guaramos en $users
        $tickets = ticket::where('status_id','=',1)->orderBy('created_at','asc');
        $count = ticket::where('status_id','=',1)->count();
        //busqueda por descripccion
        $descripcion=$request->input('descripcion');
        if (!empty($descripcion)) { 
            $tickets->where('subject','LIKE','%'.$descripcion.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('codigo');
        if (!empty($codigo)) {
            $productos->where('codigo','LIKE','%'.$codigo.'%');
        }
        
        $tickets=$tickets->paginate(10);
        return view('admin.ticket.listar.completados',compact('count','tickets')); 
     }




    public function TicketCambiarStatus(Request $Request , $id){

        $ticket=ticket::find($id);
        $ticket->status_id=$Request['pago'];
        $ticket->save();
         return Redirect::to('/tickets');
    }
    

     public function TicketResponder(Request $Request , $id){
        $comentarios = Tickets_comment::where('ticket_id','=',$id)->get();
        $ticket=ticket::find($id);
        return view('admin.ticket.responder',compact('ticket','comentarios')); 
    }  


    public function TicketComentario(Request $Request , $id){
        


        $comentario = new Tickets_comment;
        $comentario->comment = $Request['comentario'];
        $comentario->user_id = Auth::user()->id;
        $comentario->ticket_id = $id;
        $comentario->save();



     
       return Redirect::to('/tickets');
    }



    
}
