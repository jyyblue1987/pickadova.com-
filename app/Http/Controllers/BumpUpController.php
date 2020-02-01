<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Admin;
use App\AdminModel\Transation;
use App\User;
use Auth;
class BumpUpController extends Controller
{
     
     public function bump_up(Request $request){
         
         $json = array('result'=>false,'message'=>'Something Went Wrong');

         $admin = Admin::select('bump_up_amount')->where('type','Admin')->first();
         $user = Auth::user();
         
         $b_u_amount = $admin->bump_up_amount;
         $wallet = $user->wallet;

         if($b_u_amount > $wallet){
             $json['message'] = 'Your wallet not have sufficient balance for bump up your profile'; 
             return Response()->json($json);
         }

         if($user->live_status != 'ON'){
             $json['message'] = 'You need to go live first'; 
             return Response()->json($json);
         }
        
         $save['bump_up'] = date('Y-m-d H:i:s');
         $save['wallet'] = $user->wallet - $admin->bump_up_amount;

         User::where('id',$user->id)->update($save);

          $trans_id = Transation::orderBy('id','DESC')->first();
               $save1['amount'] = $admin->bump_up_amount;  
               $save1['user_id'] = $user->id;  
               $save1['type'] = 'BumpUp';  
          
               if($trans_id){
                 $order_id = ++$trans_id->order_id;             
                 $save1['order_id'] = $order_id;  
               }else{
                 $save1['order_id'] = 'PIC-000001';  
               }
               $save1['payment']='Dr';
               $save1['status']='Completed';

              Transation::insert($save1);

            $json = array('result'=>true,'message'=>'Your Profile Bump Up');
             return Response()->json($json);
       
     }

     
     public function update_pump_up(Request $request){
      $json = array('result'=>false,'message'=>'Something Went Wrong');
       
       if($request->input('_token')){
          $save['auto_pump_up'] =$request->time;
           $id = Auth::user()->id;
           User::where('id',$id)->update($save);
           $json = array('result'=>true,'message'=>'Update pump up auto cycle time successfull');
          return Response()->json($json);
       }   
    
     }

    static public function autobump(){
      
      $variable = User::select('id','bump_up','wallet','auto_pump_up')->where('auto_pump_up','!=','0')->get();
      foreach ($variable as $key => $user) {
      
         $cur_pump = strtotime($user->bump_up);
         $cur_date = date('Y-m-d H:i:s'); 
         $set_time_str =$cur_pump." +".$user->auto_pump_up." minutes";
         $change_pump =date('Y-m-d H:i:s',strtotime($set_time_str)); 
               
         if($cur_date  < $change_pump){
                   continue;
         }

         $admin = Admin::select('bump_up_amount')->where('type','Admin')->first();
         $b_u_amount = $admin->bump_up_amount;
         $wallet = $user->wallet;

         if($b_u_amount > $wallet){
               continue;
         }

          

        
         $save['bump_up'] = date('Y-m-d H:i:s');
         $save['wallet'] = $user->wallet - $admin->bump_up_amount;

         User::where('id',$user->id)->update($save);

          $trans_id = Transation::orderBy('id','DESC')->first();
               $save1['amount'] = $admin->bump_up_amount;  
               $save1['user_id'] = $user->id;  
               $save1['type'] = 'BumpUp';  
          
               if($trans_id){
                 $order_id = ++$trans_id->order_id;             
                 $save1['order_id'] = $order_id;  
               }else{
                 $save1['order_id'] = 'PIC-000001';  
               }
               $save1['payment']='Dr';
               $save1['status']='Completed';

              Transation::insert($save1);
     }

     }

}
