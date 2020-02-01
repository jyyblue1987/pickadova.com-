<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\storage;
use Image;
use App\AdminModel\BlockUser;
use Auth;

class ChatController extends Controller
{
    public function index(Request $request){
      $id='';
      $user2name = '';
      $user2image = '';
      $user2type = '';
      $blockstatus = false;
      $user = Auth::user();
      if($request->id){
      	$id =$request->id;
      	$chat_user = User::select('fname','lname','image','type','id')->find($id);
      	if($chat_user){
      		$user2name = $chat_user->fname.' '.$chat_user->lname;
          $user2image = $chat_user->image;
          $user2type = $chat_user->type;
      	}
        
        if($user->type == 'Advertise'){

        $check = BlockUser::select('id')->where('user_id',$user->id)->where('block_user_id',$request->id)->first();  
        }else{
          $check = BlockUser::select('id')->where('user_id',$request->id)->where('block_user_id',$user->id)->first();  
        } 
        
        if($check){
          $blockstatus = true;
        }

      }
     
     return view('chat',compact('user'),['id'=>$id,'user2name'=>$user2name,'user2image'=>$user2image,'blockstatus'=>$blockstatus,'user2type'=>$user2type]);
      
    }

  public function get_user_data(Request $request){

     $data =User::select('fname','lname')->find($request->id);
     // var_dump($data); exit();
    return $data;
   }

  public function chat_file_upload(Request $request){
   $json = array('result'=>false,'message'=>'Something went wrong while file is upload');
   if($request->input('_token')){

    
        if($request->has('file')){

        $destinationPath = public_path().'/uploaded/';
           $image=$request->file('file');
                $name=time().'-'.$image->getClientOriginalName();
                $ext = $image->getClientOriginalExtension(); 
              if($ext == 'jpg' || $ext == 'png' || $ext == 'JPEG' ){

                $img = Image::make($image->getRealPath());
                $img->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'chat/'.$name);
              }else{
           $image->move(public_path().'/uploaded/chat/', $name);  

              }  
           
           $json['result'] =true;
           $json['chat'] = $name;  
           $json['file_type'] = $ext;  
        }

   }
   return Response()->json($json);

  } 

  
  public function block(Request $request){
       $json = array('result'=>false,'message'=>'Something went wrong');

       if($request->input("_token")){
          $user = Auth::user();
          $save['block_user_id'] = $request->block_id;
          $save['user_id'] = $user->id;
          if($request->status == 'Block'){

              $check = BlockUser::select('id')->where('user_id',$user->id)->where('block_user_id',$request->block_id)->first(); 
              if(!$check){

                  if(BlockUser::insert($save)){
                    $json = array('result'=>true,'message'=>'block successfull');
                  }
              }else{

                $json = array('result'=>false,'message'=>'You already block this user');
              }
          }elseif($request->status == 'Unblock'){
             
             if(BlockUser::select('id')->where('user_id',$user->id)->where('block_user_id',$request->block_id)->delete()){
                    $json = array('result'=>true,'message'=>'Unblock successfull');

             }

          } 
  
       }

     return Response()->json($json); 

  }



}
