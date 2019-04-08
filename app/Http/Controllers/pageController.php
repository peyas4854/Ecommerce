<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\User;
use App\member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use App\card;
use App\order;
use Carbon\carbon;
class pageController extends Controller
{
 
    


	public function member_register(){
		return view('front-end/member_register');
	} 

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'first_name ' => ['required', 'string', 'max:255'],
            'last_name ' => ['required', 'string', 'max:255'],
            'phone_no ' => ['required', 'string', 'max:255','unique:member'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:member'],
            'street_address' => ['required', 'string', 'string', 'max:255', 'unique:member'],

            
        ]);
    }
	public function member_add( Request $request){


                 $user_id = user::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'password' => Hash::make($request['password']),

               ]);
                // echo $user_id->id;

		 member::insert([
             'user_id'=>$user_id->id,
             'first_name' => $request->first_name,
             'last_name' => $request->last_name,
             'username'=>$request->username,
             'phone_no' => $request->phone_no,
             'email'=>$request->email,

            'street_address' => $request->street_address,
        ]);
        return back()->withstatus(' Your registration successfull Please login.');
       
	}

    public function cart_store(Request $request){
      //get user id 
      $auth=Auth::id();

      if(Auth::check()){

        $card=card::Where('user_id',$auth)
                 ->Where('product_id',$request->product_id)
                  ->first();


      }else{
        $card=card::Where('product_id',$request->product_id)
                  ->where('ip_address', $request->ip())
                  ->first();

      }

      


      if (!is_null($card)) {

        $card->increment('product_quantity');

          
      }
      else{
        card::insert([
             'user_id'=>$auth,
             'product_id' => $request->product_id,
             'ip_address' => $request->ip(),

             
        ]);
              //echo 'nai';

      }

        
        return back()->withstatus(' Product Added to card.');




       


        
        
    }

    public function card_index(){

      return view('front-end/card');

    } 
    public function card_delete($id){
      
      
      card::find($id)->delete();

       return back()->withstatus(' Delete Card Item');



    }

    public function card_update(Request $request){

      
      
        $id= $_POST['id'];
        $product_quantity = $_POST['product_quantity'];
        

        card::where('id','=',$id)->update([
          'product_quantity' => $product_quantity,
          

        ]);
         return back()->withstatus(' Product quantity Updated ');


        



    }

    public function order_store(Request $request){

      if(auth::check()){

        $auth=Auth::id();

             $order_id=order::insertGetId([

            'user_id'=>Auth::id(),
            'ip_address' => $request->ip(),
            'name'=>$request->name,
            'phone_no'=>$request->phone_no,
            'shipping_address'=>$request->shipping_address,
            'message'=>$request->message,
            'email'=>$request->email,
            'payment_id'=>1,

            'created_at'=>Carbon::now()

          

               ]);

             card::where('user_id','=', Auth::id())->update([
                 'order_id'=>$order_id,



              ]);




      

      }
      else{



             $order_id=order::insertGetId([
            'ip_address' => $request->ip(),
            'name'=>$request->name,
            'phone_no'=>$request->phone_no,
            'shipping_address'=>$request->shipping_address,
            'email'=>$request->email,
            'message'=>$request->message,
            'payment_id'=>1,

            'created_at'=>Carbon::now()

          

               ]);

              card::where( 'user_id',NULL)
              ->where('ip_address',$request->ip())
              ->update([
                 'order_id'=>$order_id,
               ]);


      }

        return back()->withstatus(' You order is Submitted! Thank you ! ');


    



    }
    














}
