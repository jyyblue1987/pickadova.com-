<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Transation;
use App\AdminModel\Admin;
use App\User;
use Auth;

class FeatureController extends Controller
{
    
    public function index(){

    }

    
    public function pay(Request $request){
    
     
  
    }


    public function feature_response(Request $request){
       $json = array('result'=>false,'message'=>'Something went wrong'); 

       if($request->input('_token')){
         $user =Auth::user();
         $admin = Admin::where('type','admin')->first();
         
         if($user->wallet < $admin->feature_amount){
            $json['message'] = 'Your wallet not have sufficient balance';
            return Response()->json($json);
         }
         if($user->live_status != 'ON'){
            $json['message'] = 'You need to go live first';
            return Response()->json($json);
         }

         

       $wallet = $user->wallet - $admin->feature_amount;
         $txt_day  = '+ '.$admin->feature_expiry.' days'; 

         $amount['feature_profile'] = date('Y-m-d H:i:s',strtotime($txt_day));
         $amount['wallet'] = $wallet;

        $up = User::where('id',$user->id)->update($amount); 

         
         $trans_id = Transation::orderBy('id','DESC')->first();
         $save['amount'] = $admin->feature_amount;  
         $save['user_id'] = Auth::user()->id;  
         $save['type'] = 'Feature';  
    
         if($trans_id){
           $order_id = ++$trans_id->order_id;             
           $save['order_id'] = $order_id;  
         }else{
           $save['order_id'] = 'PIC-000001';  
         }
         $save['payment']='Dr';
         $save['status']='Completed';

        Transation::insert($save); 

        $json = array('result'=>true,'message'=>'Your profile highlighted successfull for '.$admin->feature_expiry.' days');

       }

       return Response()->json($json);
    }


}
