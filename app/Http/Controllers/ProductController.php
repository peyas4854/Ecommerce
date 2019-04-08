<?php

namespace App\Http\Controllers;
use App\product;
use App\product_image;
use App\category;
use Carbon\carbon;
use Auth;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\card;
class ProductController extends Controller
{
  
   public function index(Request $request)
    {
        $products = product::orderBy('id','desc')->paginate(9);
        $product_image= product_image::all();
        //echo $product_image;

        


        

        
        
      return view('front-end.index',compact('products','product_image'));
       
    }
    public function all_product()
    {
        $products = product::orderBy('id','desc')->paginate(15);
        $product_image= product_image::all();
        //echo $product_image;
       
        return view('/front-end/product/all_product',compact('products','product_image'));
    }
    
    public function show_product()
    {
        $info=product::orderBy('id','desc')->get();
        $product_image=product_image::all();
        //echo $info;
        //echo "<br>";
    
        //echo $product_image;
    	return view('/dashboard/pages/show_product',compact('info','product_image'));
       
    }




    public function product_edit($id){

        $old_product = product::findorfail($id);
        //echo $old_product;
     /*return view('admin/contact/message/edit',compact('old_message'));*/
        return view('/dashboard/pages/edit_product',compact('old_product'));
    }
    public function product_update( ){
        $id= $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        product::where('id','=',$id)->update([
          'title' => $title,
          'description' => $description,
          'price' => $price,

        ]);
        return back()->with('status','Product updated successfully!');  

        }


    public function product_delete($id)  {
      product ::find($id)->delete();
      return back()->with('status','Product delete successfully!');

    }
    
    public function category_product($id){
   $category= Category::find($id);
   if (!is_null($category)){
    return view('/front-end.category.category_product',compact('category'));

   }
  else{
    return back();
  }
}

    public function single_product($slug)   {

      $single_product = product::where('slug',$slug)->firstOrFail();
      $id=$single_product->id;
       $product_image= product_image::where('product_id',$id)->firstOrFail();
       

      if ($single_product!=NULL) {

       return view('/front-end/product/single_product',compact('single_product','product_image'));
      }


    
      
    }
    public function search_product(Request $request){
     
      // $search = Input::get ( 'search' );
      

      $search = $request->get('search');

     $products = product::orWhere('title','like','%'.$search.'%')
     ->orWhere('description','like','%'.$search.'%')
     ->orderBy('id','desc')
     ->paginate(2);

     return view('/front-end/search',compact('search','products'));

    }
    public function product_store(Request $request) {

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'image'=>'required',
        ]);


        $info=product::insertGetId([
            "admin_id"=>1,
            "title"=>$request->title,
            "category_id"=>$request->category_id,
            "description"=>$request->description,
            "slug"=>str_slug($request->title),
           
            "price"=>$request->price,
            "status"=>1,
            "brand_id"=>$request->brand_id,
            "created_at"=>Carbon::now()

        ]);
       
       if ($request->hasFile('image')) {
         $path = $request->file('image')->store('product_image');

        product_image::insert([
            "product_id"=>$info,
            "image"=>$path
        ]);
       

    }
       return back()->with('status','Product added successfully!');
}



}
