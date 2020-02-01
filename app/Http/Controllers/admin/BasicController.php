<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Report;
use App\AdminModel\Notification;
use App\AdminModel\Admin;

class BasicController extends Controller
{
   
    public function reports(Request $request){

      $data = Report::orderBy('id','DESC')->get();
      $admin = Admin::select('report_txt')->where('type','Admin')->first();
      return view('admin.reports',compact('data','admin'));  

    }

   public function report_status(Request $request){

    if($request->input('_token')){
           
           Report::where('id',$request->id)->update(array('status'=>$request->status));

    }
   }

   
   public function report_config(Request $request){

    $json = array('result'=>false,'message'=>'Something went wrong');

    if($request->input('_token')){
          
          $save['report_txt'] = $request->report_txt;
        
        if(Admin::where('type','Admin')->update($save)){

           $json = array('result'=>true,'message'=>'Update successfull');

        }



    }
    return Response()->json($json);
  } 


   static public function notification(){
      $data = Notification::where('type','Admin')->where('status','0')->get();
      return $data;  
    }
   
   public function notificationstatus(Request $request){

    if($request->input('_token')){
           
           Notification::where('id',$request->id)->update(array('status'=>1));

    }
   }




}
