<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\webpost;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use Soft\User;
use Auth;
class WebPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=webpost::orderBy('created_at','desc')->paginate(10);
        $user= User::where('perfil_id', '=','1')->lists('nombre','id');
        
    return view ('admin.post.index',compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $user= User::where('perfil_id', '=','1')->lists('nombre','id');
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.post.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new webpost;
        $post->titulo = $request['titulo'];
        $post->descripcioncorta = $request['descripcioncorta'];
        $post->descripcionlarga = $request['descripcionlarga'];
        $post->user_id = Auth::user()->id;
        $post->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Post Creado');
       return Redirect::to('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=webpost::find($id);
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $post=webpost::find($id);
        $post->titulo = $request['titulo'];
        $post->descripcioncorta = $request['descripcioncorta'];
        $post->descripcionlarga = $request['descripcionlarga'];
        $post->user_id = Auth::user()->id;
        $post->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Post Modificado');
       return Redirect::to('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=webPost::find($id);
        $post->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Post Eliminado');
        return Redirect::to('/post');
    }
}
