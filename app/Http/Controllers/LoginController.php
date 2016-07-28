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
    public function logged(){
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         
         return view ('shop.logged',compact('categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));


    }


     public function LoginRedirect()
    {
        return Redirect::back();
    }



}
