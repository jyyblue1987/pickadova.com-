<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Admin;
use App\User;


class FeatureController extends Controller
{
   public function index(Request $request){
     $admin = Admin::select('feature_amount','feature_expiry')->where('type','Admin')->first(); 
        $date = date('Y-m-d H:i:s');
     $data = User::select('id','fname','lname','email','address','live_status','feature_profile','state')->where('feature_profile','>',$date)->where('type','Advertise')->get(); 
    
     return view('admin/featured_profile',compact('data','admin'));
   }


    public function feature_config(Request $request){
    
    $json = array('result'=>false,'message'=>'Something went wrong');
   
    if($request->input('_token')){
          
          $save['feature_amount'] = $request->feature_amount;
          $save['feature_expiry'] = $request->feature_expiry;
        
        if(Admin::where('type','Admin')->update($save)){

           $json = array('result'=>true,'message'=>'Update successfull');

        }



    }

    return Response()->json($json);

   }
}
