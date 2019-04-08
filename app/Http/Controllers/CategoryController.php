<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Carbon\carbon;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index(){
    	$category=category::orderBy('id','desc')->get();
    	//echo $category;
    	return view('/dashboard/pages/show_category',compact('category'));


    }
    public function add(){
    	$category=category::where('parent_id',NULL)->get();
    	//echo $category;

    	return view('/dashboard/pages/add_category',compact('category'));
    }


    public function store(Request $request){

         $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

        $info=category::insertGetId([
            'name'=>$request->name,
            'description'=>$request->description,
            'parent_id'=>$request->parent_id,




        ]);
        if ($request->hasFile('image')) {
         $path = $request->file('image')->store('category_image');

        category::find($info)->update([
            "id"=>$info,
           
            "image"=>$path
        ]);
       return back()->with('status','Category  added successfully!');
       

   }



}

public function delete_category($id)  {
      $category = category ::find($id);
       if (!is_null($category)) {
        //if it is primary category delete sub category 
                if ($category->parent_id == NULL) {
                    //delete sub category 
     $sub_category=category::orderBy('name','desc')->where('parent_id',$category->id)->get();

     foreach ($sub_category as $sub) {
        if (!is_null($sub)) {
            Storage::delete($sub->image);
           
        }
        
        $sub->delete();
         # code...
     }
                    
     }

        //delete category image

      Storage::delete($category->image);

    }
    //delete brand 
     $category->delete();
     return back()->with('status','Category delete successfully!');




    }

    public function edit_category($id){
        $main_category = category::where('parent_id',NULL)->get();
        $old_category= category::findorfail($id);
        if (!is_null($old_category)) {
             return view('dashboard/pages/edit_category',compact('old_category','main_category'));
            
        }else{
            return redirect('dashboard/pages/show_category');
        }


       
    }

    public function category_update(Request $request){
        $id= $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $parent_id = $_POST['parent_id'];

        category::where('id','=',$id)->update([
          'name' => $name,
          'description' => $description,
          'parent_id' => $parent_id,

        ]);
        if ($request->hasFile('image')) {
            //delete old image
              $category = category ::find($id);
              Storage::delete($category->image);

         $path = $request->file('image')->store('category_image');
            //update new image
        category::find($id)->update([
            "id"=>$id,
           
            "image"=>$path
        ]);
         
        }
         return back()->with('status','category updated successfully!');

 }



}
