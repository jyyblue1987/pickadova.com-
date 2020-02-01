<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Services;

class ServiceController extends Controller
{
    public function index(Request $request){
        
        if($request->input('_token')){
           
           $service = new Services;
           $service->service_name = $request->service_name;

           if($service->save()){
             $json = array(
             	           'result'=>true,
             	           'message'=>"Service add successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $data = Services::all();
          
    	return view('admin.services',compact('data'));
        }
    
    
    }
    
    public function edit(Request $request, $id){
        
        if($request->input('_token')){
           $service = array();
           $service['service_name'] = $request->service_name;

           if(Services::where('id',$id)->update($service)){
             $json = array(
             	           'result'=>true,
             	           'message'=>"Service Update successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $edata = Services::find($id);
         $data = Services::all();
          
    	return view('admin.services',compact('data'),['edata'=>$edata]);
        }
    
    
    }

    
    public function delete(Request $request){

      
      if($request->input('_token')){

      	if($request->input('id')){

            $delete = Services::find($request->input('id'));
             
            if($delete){
                 
                 if($delete->delete()){
                       

             $json = array(
             	           'result'=>false,
             	           'message'=>"Service deleted successfull"
             	           );

                 }else{

             $json = array(
             	           'result'=>false,
             	           'message'=>"Something Went wrong while service is deleted"
             	           );
                 }

            }else{

             $json = array(
             	           'result'=>false,
             	           'message'=>"Service not found for delete request"
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



}
