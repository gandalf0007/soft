<?php

namespace Soft\Http\Controllers;

use Soft\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Alert;
use Session;
use Redirect;
use Storage;
use Image;
class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
        
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/logueado');
    }


}
