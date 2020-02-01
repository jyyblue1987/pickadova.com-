<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Admin;
use App\User;

class LiveController extends Controller
{
   
   public function index(Request $request){

   	    $admin = Admin::select('live_amount','live_expiry','live_message','pause_message','inactive_duration','live_verification')->where('type','Admin')->first(); 
        
        $data = User::select('id','fname','lname','email','address','live_status','live_expiry','online')->where('live_status','!=','OFF')->get(); 
           
         return view('admin/go_live',compact('admin','data'));
   }
   

   public function live_config(Request $request){
    
    $json = array('result'=>false,'message'=>'Something went wrong');
   
    if($request->input('_token')){
          
          $save['live_amount'] = $request->live_amount;
          $save['live_expiry'] = $request->live_expiry;
          $save['live_message'] = $request->live_message;
          $save['pause_message'] = $request->pause_message;
          $save['inactive_duration'] = $request->inactive_duration;
          $save['live_verification'] = $request->live_verification;

        if(Admin::where('type','Admin')->update($save)){

           $json = array('result'=>true,'message'=>'Update successfull');

        }



    }

    return Response()->json($json);

   }


   
    public function change_status(Request $request){
        
   
      
      if($request->input('_token')){

        if($request->input('id')){
                $save['live_status'] = $request->input('val');
            if(User::where('id',$request->id)->update($save)){
               $json = array(
                           'result'=>true,
                           'message'=>"Live status change successfull"
                           );
            }else{

               $json = array(
                           'result'=>false,
                           'message'=>"Something Went wrong while Changing status"
                           );
            }

           


        }else{

             $json = array(
                         'result'=>false,
                         'message'=>"id not found"
                         );
        }

       return Response()->json($json);
     }
      
    
    }

   
    public function online_status(Request $request){
        
   
      
      if($request->input('_token')){

        if($request->input('id')){
                $save['online'] = $request->input('val');
            if(User::where('id',$request->id)->update($save)){
               $json = array(
                           'result'=>true,
                           'message'=>"status change successfull"
                           );
            }else{

               $json = array(
                           'result'=>false,
                           'message'=>"Something Went wrong while Changing status"
                           );
            }

           


        }else{

             $json = array(
                         'result'=>false,
                         'message'=>"id not found"
                         );
        }

       return Response()->json($json);
     }
      
    
    }
   
    public function change_expiry_date(Request $request){
        
   
      
      if($request->input('_token')){

        if($request->input('id')){
                $save['live_expiry'] = $request->input('val');
            if(User::where('id',$request->id)->update($save)){
               $json = array(
                           'result'=>true,
                           'message'=>"Expiry date change successfull"
                           );
            }else{

               $json = array(
                           'result'=>false,
                           'message'=>"Something Went wrong while Changing expiry date"
                           );
            }

           


        }else{

             $json = array(
                         'result'=>false,
                         'message'=>"id not found"
                         );
        }

       return Response()->json($json);
     }
      
    
    }




}
