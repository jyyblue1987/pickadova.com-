<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\BoysTestimonial;
use Auth;

class BoysTestimonialController extends Controller
{
    
    public function add_testimonial(Request $request){
       
       $json = array('result'=>false,'message'=>'Something went wrong');

        if($request->input('_token')){
               
               $save['user_id'] = Auth::user()->id; 
               $save['mobile_no'] = $request->mobile_no; 
               $save['remark'] = $request->remark; 
            
             if(BoysTestimonial::insert($save)){
             	$json = array('result'=>true,'message'=>"Add testimonial successfull");
             }


        } 
      return Response()->json($json); 
    }

    public function search_testimonial(Request $request){

     $data = array();    
        if($request->input('_token')){
          /* $data = BoysTestimonial::select('id','remark')->where('mobile_no','LIKE','%'.$request->mobile_no.'%')->orderBy('id','DESC')->get();*/

           $data = BoysTestimonial::join('users','boys_testimonial.user_id','=','users.id')->select('boys_testimonial.*','users.fname','users.lname')->where('boys_testimonial.mobile_no','LIKE','%'.$request->mobile_no.'%')->orderBy('boys_testimonial.id','DESC')->get();
        } 

      return $data;
    } 

}
