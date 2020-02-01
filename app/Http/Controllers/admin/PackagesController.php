<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Packages;

class PackagesController extends Controller
{
    public function index(Request $request){
        
        if($request->input('_token')){
           
             $save = $request->input();

               unset($save['_token']); 
             
             $packages = new Packages;
           if($packages->insert($save)){
             $json = array(
             	           'result'=>true,
             	           'message'=>"Package add successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $data = Packages::all();
          
    	return view('admin.packages',compact('data'));
        }
    
    
    }
    
    public function edit(Request $request, $id){
        
        if($request->input('_token')){
             $save = $request->input();

               unset($save['_token']); 

           if(Packages::where('id',$id)->update($save)){
             $json = array(
             	           'result'=>true,
             	           'message'=>"Package Update successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $edata = Packages::find($id);
         $data = Packages::all();
          
    	return view('admin.packages',compact('data'),['edata'=>$edata]);
        }
    
    
    }

    
    public function delete(Request $request){

      
      if($request->input('_token')){

      	if($request->input('id')){

            $delete = Packages::find($request->input('id'));
             
            if($delete){
                 
                 if($delete->delete()){
                       

             $json = array(
             	           'result'=>false,
             	           'message'=>"Package deleted successfull"
             	           );

                 }else{

             $json = array(
             	           'result'=>false,
             	           'message'=>"Something Went wrong while Package is deleted"
             	           );
                 }

            }else{

             $json = array(
             	           'result'=>false,
             	           'message'=>"Package not found for delete request"
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
