<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function images()
    {
    	return $this->hasMany('App\product_image');
    }

    public function brand()
    {
    	return $this->belongsTo(brand::class);
    }
    
    public function category()
    {
    	return $this->belongsTo(category::class);
    }
}
