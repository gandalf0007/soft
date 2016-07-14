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

class WebPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=web_post::all();
    return view ('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        web_post::create($request->all());

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
        $post=web_post::find($id);
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
         $post=web_post::find($id);
        $post->fill($request->all());
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
        $post=web_Post::find($id);
        $post->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Post Eliminado');
        return Redirect::to('/post');
    }
}
