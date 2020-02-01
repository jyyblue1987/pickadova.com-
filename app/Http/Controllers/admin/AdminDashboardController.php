<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\AdminModel\Admin;
use Auth;
use Hash;
use Illuminate\Support\Facades\storage;

class AdminDashboardController extends Controller
{
     
     public function index(User $user){
       
       $total_user = $user->count();
       $total_advertiser = $user->where('type','Advertise')->count();
       $total_browser = $user->where('type','Browser')->count();
     

     	return view('admin.dashboard',compact('total_user', 'total_advertiser', 'total_browser'));
     }


     public function change_password(Request $request){
         if($request->input('_token')){
            $this->validate($request, [
              'current_password'   => 'required|min:6',
              'new_password'   => 'required|min:6',
              'confirm_password'   => 'required|min:6|same:new_password'
             ]);
              
              $user = Auth::guard('admin')->user();
                

              if(!Hash::check($request->current_password,$user->password)){
                return redirect()->back()->with('emessage','Current Password not matched');
              }


            $save['password'] = Hash::make($request->new_password); 
         
            if(User::where('id',$user->id)->update($save)){
       
                 return redirect()->back()->with('message','Password Changed Successfull');
            }else{
                 return redirect()->back()->with('emessage','Something went wrong');
            } 



          }else{
            return view('admin.change_password');
          }  
     }

    
     public function admin_profile(Request $request){
        $json = array('result'=>false,'message'=>'Something went wrong');
        if($request->input('_token')){
          $admin_id = Auth::guard('admin')->user()->id;   
          $save['name'] = $request->name;
          $save['email'] = $request->email;
          if($request->has('image')){
             $image=$request->file('image');
             $name=time().'-'.$image->getClientOriginalName();
             $ext = $image->getClientOriginalExtension();
             $image->move(public_path().'/uploaded/admin/', $name);  
             $save['image'] = $name;
           } 
          
          if(Admin::where('id',$admin_id)->update($save)){
            $json = array('result'=>true,'message'=>'Profile update Successfull');
          }
          return Response()->json($json);


         
        }else{
           
           return view('admin.admin_profile');
        }

     } 

}
