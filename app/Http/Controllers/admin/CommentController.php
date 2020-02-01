<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Comment;
use App\User;


class CommentController extends Controller
{
   
    public function index(Request $request){
        
        if($request->input('_token')){
           
           $notice = new Comment;
           $notice->message = $request->message;

           if($notice->save()){
             $json = array(
             	           'result'=>true,
             	           'message'=>"Notice add successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $data = Comment::all();
          
    	return view('admin.comment',compact('data'));
        }
    
    
    }
    
  

}
