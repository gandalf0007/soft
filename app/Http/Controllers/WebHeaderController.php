<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\web_logo;

class WebHeaderController extends Controller
{
    public function ConfigHeader()
    {
    $logos=web_logo::all();
    return view ('admin.paginas.home.header.index',compact('logos'));
    }


}
