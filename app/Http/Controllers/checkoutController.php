<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function index(){
    	return view('/front-end/checkout');
    }
}
