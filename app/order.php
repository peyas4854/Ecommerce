<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
   protected $fillable = [
        'member_id',
         'ip_addresss',
          'name',
          'phone_no',
          'Shipping_address',
          'email',
          'message',
          'is_paid',
          'is_complete',
          'is_seen_by_admin',
          
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function card(){
      return $this->belongsTo(card::class);
    }
}
