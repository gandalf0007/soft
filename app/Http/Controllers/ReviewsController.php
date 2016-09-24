<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
use Soft\Http\Requests;

use Soft\Review;
use Input;
use Validator;
use Redirect;
use Soft\Producto;
use Auth;
use Alert;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Reviews($slug)
    {

    
   $producto = Producto::where('slug','=', $slug)->firstOrFail();
   $user = Auth::user()->id;
   
    $input = array(
    'comment' => Input::get('comment'),
    'rating'  => Input::get('rating')
  );

  // instantiate Rating model
  $review = Review::create([
      'producto_id'=>$producto->id,
      'user_id'=>$user,
      'rating'=>$input['rating'],
      'comment'=>$input['comment'],
      'approved'=>1,
      'spam'=>0,
    ]);


  $review->storeReviewForProduct($slug, $input['comment'], $input['rating']);
     return Redirect::back()->with('review_posted',true);
  //return Redirect::to('products/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
    }





    public function ReviewsVer($slug){
       
        $producto = Producto::where('slug','=', $slug)->firstOrFail();
        $reviews = Review::where('producto_id','=',$producto->id)->orderBy('created_at','desc')->get();
        
        return view('admin.producto.review.review',compact('reviews'));
    }


    public function ReviewsDelete($id){
        $Review = Review::find($id);
        $Review->delete();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Review Eliminado');
        return Redirect::back();
    }


    public function ReviewsConfirm($id){
        $Review = Review::find($id);
        $Review->approved = 1;
        $Review->save();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Review Aprobado');
        return Redirect::back();
    }


    public function ReviewsSpam($id){
        $Review = Review::find($id);
        $Review->approved = 0;
        $Review->save();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Review Spam');
        return Redirect::back();
    }

}
