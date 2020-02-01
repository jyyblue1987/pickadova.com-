<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Admin;
use App\User;
class BumpUpController extends Controller
{
    public function index(Request $request){
        
     $admin = Admin::select('bump_up_amount')->where('type','Admin')->first(); 
        $date = date('Y-m-d H:i:s');
    
     $data = User::select('id','fname','lname','email','address','live_status','bump_up','state')->where('account_verification','1')->where('type','Advertise')->where('bump_up','!=','0')->orderBy('bump_up','DESC')->get(); 

        return view('admin/bump_up',compact('admin','data'));
    }
    
    
    public function config(Request $request){

	    $json = array('result'=>false,'message'=>'Something went wrong');

	    if($request->input('_token')){
	          
	          $save['bump_up_amount'] = $request->bump_up;
	        
	        if(Admin::where('type','Admin')->update($save)){

	           $json = array('result'=>true,'message'=>'Update successfull');

	        }



	    }
	    return Response()->json($json);
    }

}
