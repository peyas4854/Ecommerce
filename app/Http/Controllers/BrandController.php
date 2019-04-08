<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use Carbon\carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=brand::orderBy('id','desc')->get();
       
        return view('/dashboard/pages/show_brand',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('/dashboard/pages/add_brand');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

       $info=brand::insertGetId([

            "name"=>ucwords($request->name),
            "description"=>$request->description,
            "created_at"=>Carbon::now()

        ]);

      

       


       if ($request->hasFile('image')) {
         $path = $request->file('image')->store('brand image');

        brand::find($info)->update([
            "image"=>$path
        ]);
       

        return back()->with('status','Brand added successfully!');
    }
      /*$converted = ucwords('samsung fdgh');
      echo $converted;*/

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        
       $brand = brand ::find($id);
       if (!is_null($brand)) {
        //delete brand image
       Storage::delete($brand->image);


    }
    //delete brand 
     $brand->delete();
     return back()->with('status','Brand delete successfully!');

    }
}
