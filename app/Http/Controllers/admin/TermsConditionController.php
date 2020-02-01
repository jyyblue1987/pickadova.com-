<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Admin;

class TermsConditionController extends Controller
{
    public function index(Request $request){
        if($request->input('_token')){
          $json = array('result'=>false,'message'=>'Something went wrong');
        
           $save =  array();
           $save['terms_and_condition'] = $request->terms_and_conditions; 
           if(Admin::where('type','admin')->update($save)){
                                
             $json = array('result'=>true,'message'=>'Updated Successfull');

           }

          return Response()->json($json);  
        }else{
        	$data = Admin::select('terms_and_condition')->where('type','admin')->get();
            $terms_and_condition = '';
            if(count($data)){
            	$terms_and_condition = $data[0]['terms_and_condition'];
            }

          return view('admin.terms_and_conditions',compact('terms_and_condition'));
        }
    }

}
