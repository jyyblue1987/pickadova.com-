<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Notice;
use App\AdminModel\NoticeSend;
use App\User;


class NoticeController extends Controller
{
   
    public function index(Request $request){
        
        if($request->input('_token')){
           
           $notice = new Notice;
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
         
         $data = Notice::all();
          
    	return view('admin.notice',compact('data'));
        }
    
    
    }
    
    public function edit(Request $request, $id){
        
        if($request->input('_token')){
           $notice = array();
           $notice['message'] = $request->message;

           if(Notice::where('id',$id)->update($notice)){
             $json = array(
             	           'result'=>true,
             	           'message'=>"Notice Update successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $edata = Notice::find($id);
         $data = Notice::all();
          
    	return view('admin.notice',compact('data'),['edata'=>$edata]);
        }
    
    
    }

    
    public function delete(Request $request){
      
      if($request->input('_token')){

      	if($request->input('id')){

            $delete = Notice::find($request->input('id'));
             
            if($delete){
                 
                 if($delete->delete()){
                NoticeSend::where('notice_id',$request->id)->delete();
                       

             $json = array(
             	           'result'=>false,
             	           'message'=>"Notice deleted successfull"
             	           );

                 }else{

             $json = array(
             	           'result'=>false,
             	           'message'=>"Something Went wrong while notice is deleted"
             	           );
                 }

            }else{

             $json = array(
             	           'result'=>false,
             	           'message'=>"Notice not found for delete request"
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
 
    
    public function send(Request $request){
          $json = array('result'=>false,'message'=>'Something went wrong');
        if($request->input('_token')){
             if($request->type == 'All'){
               $users = User::select('id')->where('email_verification','1')->get();
                 
                 foreach ($users as $key => $val) {
                        
                   $check = NoticeSend::where('user_id',$val->id)->where('notice_id',$request->notice_id)->first(); 
                    /*if(!$check){*/
                        $save['notice_id'] = $request->notice_id;
                        $save['user_id'] = $val->id;
                     NoticeSend::insert($save);
                  /*  }*/
                  
                  } 
                $json = array('result'=>true,'message'=>'Send Notice to all user successfull');
  

             }elseif($request->type == 'Check'){
                 
                 foreach ($request->users as $key => $val) {
                   $check = NoticeSend::where('user_id',$val)->where('notice_id',$request->notice_id)->first(); 
                   /* if(!$check){*/
                        $save['notice_id'] = $request->notice_id;
                        $save['user_id'] = $val;
                     NoticeSend::insert($save);
                  /*  }*/
                  } 
                $json = array('result'=>true,'message'=>"Send Notice to user's successfull");

             }  
          return Response()->json($json);      
        }else{

             if(!$request->id){
             return redirect()->back()->with('emessage','Id Not found');
             }

             $notice = Notice::find($request->id);
             if(!$notice){
               return redirect()->back()->with('emessage','Invalid Id');
             }

              $data = User::select('users.fname','users.lname','users.id','users.email','users.state','users.type')->where('users.email_verification','1')->orderBy('id','DESC')->get();
              return view('admin.notice_send',compact('data','notice')); 
        }  
    }




}
