<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ChatController extends Controller
{
    public function index(Request $request){
        $user1_id = $request->user_id; 
        $user2_id = $request->chat_user_id; 


        if(!$request->user_id){
        	return redirect()->back()->with('emessage','user not found');
        }   
       
       $user1 = User::find($request->user_id);

       if(!$user1){
        	return redirect()->back()->with('emessage','Not valid User');
       }
   
       $user2 = array();
       if($request->chat_user_id){
       	$user2 = User::find($request->chat_user_id);
       }

    	return view('admin.chat',compact('user1','user2'),['user1_id'=>$user1_id,'user2_id'=>$user2_id]);
    }

     public function recent(Request $request){

     $data =User::select('fname','lname','image','id')->find($request->id);
     // var_dump($data); exit();
    return $data;
   }
}
