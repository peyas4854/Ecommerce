<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use App\product;
use App\product_image;
use App\category;


use Carbon\carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkusertype');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/dashboard/index');
    }
    
    public function product()
    {
         $category = category::where('parent_id',NULL)->get();

        return view('dashboard/pages/product',compact('category'));
    }
    public function brand()
    {
        return view('backend/brand');
    }

    public function category()
    {
        return view('backend/category');
    }
    


}
