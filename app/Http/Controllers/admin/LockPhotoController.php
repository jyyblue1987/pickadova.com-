<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\PhotoUnlock;
use App\AdminModel\Admin;
use App\AdminModel\Transation;

class LockPhotoController extends Controller
{
      
      public function index(Request $request){
           

           $data = PhotoUnlock::orderBy('id','Desc')->get();    
           $admin = Admin::select('user_percentage','photo_expire','max_amount')->where('type','Admin')->first();   
          return view('admin.unlock_photo',compact('data','admin'));
           
      }
     
     public function config(Request $request){

	    $json = array('result'=>false,'message'=>'Something went wrong');
	   
	    if($request->input('_token')){
	          
	          $save['user_percentage'] = $request->user_percentage;
	          $save['photo_expire'] = $request->photo_expire;
	          $save['max_amount'] = $request->max_amount;
	        // print_r($save); exit();
	        if(Admin::where('type','Admin')->update($save)){

	           $json = array('result'=>true,'message'=>'Update successfull');

	        }



	    }

	    return Response()->json($json);

	}

    public function pay_photo_amount(Request $request){
        $json = array('result'=>false,'message'=>"Something Went Wrong");

        if($request->input('_token')){
           // print_r($request->input()); exit();
            $photo['user_amount'] = $request->amount;
            $photo['user_percentage'] = $request->percentage;
             
             if(PhotoUnlock::where('id',$request->unlock_id)->update($photo)){

		        	 $trans_id = Transation::orderBy('id','DESC')->first();
			         $save['unlock_id'] = $request->unlock_id;  
			         $save['amount'] = $request->amount;  
			         $save['user_id'] = $request->user_id;  
			         $save['type'] = 'Photo';  
			         $save['payment_method'] = 'Wallet';  
			         $save['payment'] = 'Cr';  
			         $save['status'] = 'Completed';  
			         if($trans_id){
			           $order_id = ++$trans_id->order_id;             
			           $save['order_id'] = $order_id;  
			         }else{
			           $save['order_id'] = 'PIC-000001';  
			         }  
                   Transation::insert($save);   
              $json = array('status'=>true,'message'=>'Pay to user successfull');  
             }

        }
        return Response()->json($json);

    }

}
