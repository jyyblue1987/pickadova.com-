<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\States;

class StatesController extends Controller
{
   public function index(Request $request){
      
       if($request->input('_token')){
           
           $states = new States;
           $states->name = $request->name;
           $states->short_name = $request->short_name;

           if($states->save()){
             $json = array(
             	           'result'=>true,
             	           'message'=>"State add successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
          
    	$data = States::all();
      return view('admin.states',compact('data'));
        } 
    

   }

    public function edit(Request $request, $id){
        
        if($request->input('_token')){
           $service = array();
           $service['name'] = $request->name;
           $service['short_name'] = $request->short_name;

           if(States::where('id',$id)->update($service)){
             $json = array(
             	           'result'=>true,
             	           'message'=>"State Update successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $edata = States::find($id);
         $data = States::all();
          
    	return view('admin.states',compact('data'),['edata'=>$edata]);
        }
    
    
    }

    static public function get(){
      $data = States::all();
      return $data;
    }

    static public function get_ip_state(){
     $ip_state ='';
     $ip = $_SERVER['REMOTE_ADDR'];
       $ipInfo = @file_get_contents('http://ip-api.com/json/'.$ip);
       if($ipInfo){
        $ipInfo =json_decode($ipInfo); 
         if($ipInfo->status == 'success'){
        
             $ip_state =$ipInfo->region;
          }
        }
      return $ip_state;
    }



}
