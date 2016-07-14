<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\web_post;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;

class PaginasController extends Controller
{
     public function postDetail()
    {
        
        /*seccion para el layout*/
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $posts=DB::table('web_posts')->orderBy('created_at', 'asc')->get();
         return view ('shop.blog-details',compact(
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'posts'
                                          ));
    }

 
}
