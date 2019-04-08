<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name',  'image',
    ];
    public function parent(){
    	return $this->belongsTo(category::class,'parent_id');

    }
    public function products(){
    	return $this->hasMany(product::class);

    }

}
