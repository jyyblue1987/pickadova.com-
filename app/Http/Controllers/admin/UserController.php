<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\AdminModel\Transation;
use App\AdminModel\CustomField;
use App\AdminModel\CustomFieldValue;
use Hash;
class UserController extends Controller
{
    public function index(){

        $data = User::select('id','fname','lname','email','address','state','email_verification','account_verification','wallet')->where('type','Browser')->get();

     
        return view('admin.users',compact('data'));
    }

   
   public function view(Request $request, $id){
       
    if($request->input('_token')){
                  $json =array('result'=>false,'message'=>'Something went wrong');
       $save = $request->input();

       if($save){
         unset($save['_token']);
        
          if($request->input('image')){
            $image = $request->image;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time().str_random(10).'-user.'.'png';
            \File::put(public_path().'/uploaded/user/'. $imageName, base64_decode($image));
            $save['image'] = $imageName;
          }
           if($request->has('custom')){
          
           $custom = $request->custom;

           foreach ($custom as $key => $value) {
                  $set_c = array();
                  $set_c['user_id'] = $user_id;
                  $set_c['custom_id'] = $key;
                  $set_c['value'] = $value;
             
              $check_s = CustomFieldValue::where('user_id',$user_id)->where('custom_id',$key)->get();
              if(count($check_s)){
                 CustomFieldValue::where('id',$check_s[0]['id'])->update($set_c);
              }else{
                 CustomFieldValue::insert($set_c);

              }


           }  
          unset($save['custom']);
        }
        
        

         if(User::where('id',$id)->update($save)){
                  $json =array('result'=>true,'message'=>'update successfull');
         }

       }   
       
       return Response()->json($json);

      }else{   
       $user = User::find($id);
       if(count(CustomFieldValue::where('user_id',$user->id)->get())){

       $customfield =  CustomField::select('*')->get();
         
         $new_arr = array();

         foreach ($customfield as $key => $val) {
           $custom_val = CustomFieldValue::select('value','counter')->where('user_id',$id)->where('custom_id',$val->id)->first();
           if($custom_val){
            $val['value'] = $custom_val->value;
            $val['counter'] = $custom_val->counter;
           }else{
            $val['value'] = '';
            $val['counter'] = '';
           }
           $new_arr[] = $val;
         }
         $customfield = $new_arr;   
      
      }else{
       $customfield =  CustomField::select('*')->get();  
      }
       if(!$user){
          return redirect()->back()->with('emaessage','User not found');
       }   

      return view('admin.view_user_profile',compact('user','customfield','customfieldvalue'));
    } 
   } 



    public function verify(Request $request){
        
   
      
      if($request->input('_token')){

      	if($request->input('id')){
                $save['account_verification'] = $request->input('val');
            if(User::where('id',$request->id)->update($save)){
	             $json = array(
	             	           'result'=>true,
	             	           'message'=>"Account status change successfull"
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


    public function Changepassword(Request $request){
      
      if($request->input('_token')){

        if($request->input('user_id')){
                $save['password'] = Hash::make($request->input('new_password'));
            if(User::where('id',$request->user_id)->update($save)){
               $json = array(
                           'result'=>true,
                           'message'=>"Password updated successfull"
                           );
            }else{

               $json = array(
                           'result'=>false,
                           'message'=>"Something Went wrong while Changing password"
                           );
            }

           


        }else{

             $json = array(
                         'result'=>false,
                         'message'=>"User id not found"
                         );
        }

       return Response()->json($json);
     }
      
    }

    public function add_amount(Request $request){
        $json = array('result'=>false,'message'=>'Something Went Wrong');
        if($request->input('_token')){
           $user =User::select('wallet')->where('id',$request->user_id)->first();

           $wallet['wallet'] = $user->wallet + $request->amount;

           User::where('id',$request->user_id)->update($wallet);
           $trans_id = Transation::orderBy('id','DESC')->first();
               $save1['amount'] = $request->amount;  
               $save1['user_id'] = $request->user_id;  
               $save1['type'] = 'Admin';  
          
               if($trans_id){
                 $order_id = ++$trans_id->order_id;             
                 $save1['order_id'] = $order_id;  
               }else{
                 $save1['order_id'] = 'PIC-000001';  
               }
               $save1['payment']='Cr';
               $save1['status']='Completed';

              Transation::insert($save1);

             $json = array('result'=>true,'message'=>'Amount added successfull');

        }
   
               return Response()->json($json);
    }

}
