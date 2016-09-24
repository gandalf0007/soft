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

// Validate that the user's input corresponds to the rules specified in the review model
  $validator = Validator::make( $input, $review->getCreateRules());

  // If input passes validation - store the review in DB, otherwise return to product page with error message 
  if ($validator->passes()) {
    $review->storeReviewForProduct($slug, $input['comment'], $input['rating']);
     return Redirect::back()->with('review_posted',true);
   // return Redirect::to('products/'.$id.'#reviews-anchor')->with('review_posted',true);
  }
  return Redirect::back()->withErrors($validator)->withInput();
  //return Redirect::to('products/'.$id.'#reviews-anchor')->withErrors($validator)->withInput();
    }

}
