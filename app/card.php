<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    protected $fillable = [
        'user_id',
         'product_id',
          'order_id',
          'product_quantity',
          'ip_address',
          
          
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function product(){
    	return $this->belongsTo(product::class);
    }
    public function order(){
    	return $this->belongsTo(order::class);
    }

 // count total cards
    public static function total_cards(){



      if (Auth::check()) {
      $carts = card::Where('user_id', Auth::id())
      ->where('order_id',NULL)
      ->Where('ip_address', request()->ip())
      ->get();
    }else {
       $carts = card::Where('user_id', NULL)
       ->where('order_id',NULL)
      ->Where('ip_address', request()->ip())
      ->get();

    }

    $total_item = 0;

    foreach ($carts as $cart) {
      $total_item += $cart->product_quantity;
    }

    return $total_item;
  }
// all card 
  public static function cards(){



      if (Auth::check()) {
      $carts = card::Where('user_id', Auth::id())
      ->Where('ip_address', request()->ip())
      ->get();
    }else {
       $carts = card::Where('user_id', NULL)
      ->Where('ip_address', request()->ip())
      ->get();

    }

    

    return $carts;
  }


    

}
