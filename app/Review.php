<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\Producto;
use Soft\User;
class Review extends Model
{


	protected $fillable = [
        'id',
        'producto_id',
        'user_id',
        'rating',
        'comment',
        'approved',
        'spam',
        
    ];


     // Validation rules for the ratings
    public function getCreateRules()
    {
        return array(
            'comment'=>'required|min:10',
            'rating'=>'required|integer|between:1,5'
        );
    }


    // Relationships
    public function user()
    {
    	//un review tiene un usuario
        return $this->belongsTo(User::class);
    }

    public function producto()
    {	
    	//un review tiene un producto
        return $this->belongsTo(Producto::class);
    }




    // Scopes
    public function scopeApproved($query)
    {
       	return $query->where('approved', true);
    }

    public function scopeSpam($query)
    {
       	return $query->where('spam', true);
    }

    public function scopeNotSpam($query)
    {
       	return $query->where('spam', false);
    }

    // Attribute presenters
    public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    // this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
    public function storeReviewForProduct($slug, $comment, $rating)
    {
        $producto = Producto::where('slug','=', $slug)->firstOrFail();
        
        //$this->user_id = Auth::user()->id;
        $this->comment = $comment;
        $this->rating = $rating;
        $producto->reviews()->save($this);

        // recalculate ratings for the specified product
        $producto->recalculateRating($rating);
    }
}
