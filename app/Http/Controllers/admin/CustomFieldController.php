<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\CustomField;
use Illuminate\Support\Facades\storage;


class CustomFieldController extends Controller
{
    public function index(){
         
         $data = CustomField::where('input_type','!=','contact')->get();

         return view('admin.custom_field',compact('data'));
    }
   
    public function contact(){
         
         $data = CustomField::where('input_type','=','contact')->get();

         return view('admin.contact_info',compact('data'));
    }
    

    
    public function add(Request $request){
      
        $json = array('result'=>false,'message'=>"Something Went wrong");

        if($request->input('_token')){
        
  
             $save = $request->input();
             unset($save['_token']);
             
             if($request->input_type == 'select'){
                $save['option'] = json_encode($request->option);
             }
            
             if($request->has('icon')){
                   $image=$request->file('icon');
                   $name=time().'-'.$image->getClientOriginalName();
                   $ext = $image->getClientOriginalExtension();
                   
                   if(($ext != 'png') && ($ext != 'jpg') && ($ext != 'jpeg')){
                     $json['message'] = 'Image extension invalid Only allow PNG|JPG|JPEG';
                    return Response()->json($json); 
                   }     

                  $destinationPath = public_path().'/uploaded/icon/';
             
                  $image->move(public_path().'/uploaded/icon/', $name);
                  $save['icon'] = $name; 
             }
      

           $service = new CustomField;
        
           if($service->insert($save)){
             $json = array(
                           'result'=>true,
                           'message'=>"Field added successfull"
                           );
           }else{
             $json = array(
                           'result'=>false,
                           'message'=>"Something went wrong"
                           );
           }
      
         return Response()->json($json);


        }
        return Response()->json($json);
   
    }

    public function edit(Request $request,$id){
      
        $json = array('result'=>false,'message'=>"Something Went wrong");

        if($request->input('_token')){
        
  
             $save = $request->input();
             unset($save['_token']);
             
            if(!$request->has('required')){
                $save['required'] = 0;
            }

             if($request->input_type == 'select'){
             	$save['option'] = json_encode($request->option);
             }
    
      

           $service = new CustomField;
        
           if($service->where('id',$id)->update($save)){
             $json = array(
             	           'result'=>true,
             	           'message'=>"Field updated successfull"
             	           );
           }else{
             $json = array(
             	           'result'=>false,
             	           'message'=>"Something went wrong"
             	           );
           }
      
         return Response()->json($json);


        }else{
         
         $data = CustomField::where('input_type','!=','contact')->get();
         $edata = CustomField::find($id);

         return view('admin.custom_field',compact('data','edata'));
        }
    
    }

    public function editcontact(Request $request,$id){
      
        $json = array('result'=>false,'message'=>"Something Went wrong");

        if($request->input('_token')){
        
  
             $save = $request->input();
             unset($save['_token']);
             
            if(!$request->has('required')){
                $save['required'] = 0;
            }

               if($request->has('icon')){
                   $image=$request->file('icon');
                   $name=time().'-'.$image->getClientOriginalName();
                   $ext = $image->getClientOriginalExtension();
                   
                   if(($ext != 'png') && ($ext != 'jpg') && ($ext != 'jpeg')){
                     $json['message'] = 'Image extension invalid Only allow PNG|JPG|JPEG';
                    return Response()->json($json); 
                   }     

                  $destinationPath = public_path().'/uploaded/icon/';
             
                  $image->move(public_path().'/uploaded/icon/', $name);
                  $save['icon'] = $name; 
             }
    
      

           $service = new CustomField;
        
           if($service->where('id',$id)->update($save)){
             $json = array(
                         'result'=>true,
                         'message'=>"Field updated successfull"
                         );
           }else{
             $json = array(
                         'result'=>false,
                         'message'=>"Something went wrong"
                         );
           }
      
         return Response()->json($json);


        }else{
         
         $data = CustomField::where('input_type','=','contact')->get();
         $edata = CustomField::find($id);

         return view('admin.contact_info',compact('data','edata'));
        }
    
    }





   public function delete(Request $request){

      
      if($request->input('_token')){

        if($request->input('id')){

            $delete = CustomField::find($request->input('id'));
             
            if($delete){
                 
                 if($delete->delete()){
                       

             $json = array(
                         'result'=>false,
                         'message'=>"Field deleted successfull"
                         );

                 }else{

             $json = array(
                         'result'=>false,
                         'message'=>"Something Went wrong while Field  deleted"
                         );
                 }

            }else{

             $json = array(
                         'result'=>false,
                         'message'=>"Field not found for delete request"
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
