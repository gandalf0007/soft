<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\web_carrucel;
use Soft\web_marca;
use Soft\web_footer;
use Soft\web_informacion;
use Soft\web_facebook;
use Soft\web_logo;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
class PaginasController extends Controller
{
    /**
     * esto envia los datos al backend osea a la parate de paginas de la administracion
     *
     * @return \Illuminate\Http\Response
     */


   public function ConfigCarrucel()
    {
        $imagenes=web_carrucel::all();
    return view ('admin.paginas.home.carrucel.index',compact('imagenes'));
    }

    public function ConfigCarrucelmarcas()
    {
        $imagenesMarcas=web_marca::all();
    return view ('admin.paginas.home.marcas.index',compact('imagenesMarcas'));
    }


    public function ConfigFooter()
    {
    $footers=web_footer::all();
    $informacions=web_informacion::all();
    $boxs=web_facebook::all();
    return view ('admin.paginas.home.footer.index',compact('footers','informacions','boxs'));
    }

    public function ConfigHeader()
    {
    $logos=web_logo::all();
    return view ('admin.paginas.home.header.index',compact('logos'));
    }
}
