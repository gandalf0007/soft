<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Movie;


class FrontController extends Controller
{


    public function __construct()
    {
        //se aplica el auth al metodo admin de esta clase
        //$this->middleware('auth',['only' => 'admin']);
        
    }


    public function index()
    {
       //retornando una vista
        return view ('index');
    }
    
    public function welcome()
    {
       //retornando una vista
        return view ('welcome');
    }

    
}
