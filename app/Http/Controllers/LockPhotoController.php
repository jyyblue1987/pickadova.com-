<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Media;
use App\AdminModel\PhotoUnlock;
use App\AdminModel\Admin;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterationMail;
use URL;
class LockPhotoController extends Controller
{
   
    public function paypal(Request $request){
       if($request->input('_token')){
	        $user = Auth::user();

	        $photo  = Media::find($request->id);

	        if(!$photo){
	        	return redirect()->back()->with('emessage','Photo not found');
	         } 

	        $save['photo_id'] = $request->id;
	        $save['photo_user_id'] = $request->photo_user_id;
	        if($user){
	           $save['user_id'] =$user->id;
	        }

	        $save['email'] = $request->email;
	        $save['amount'] = $photo->amount;

		    if($output = PhotoUnlock::create($save)){
		                          
		         $paypalURL = env("PAYPALURL",'https://www.sandbox.paypal.com/cgi-bin/webscr');
		        
		         $form = array();
		         $form['business'] = env("PAYPALID",'lokesh.laabhaa-buyer@gmail.com');
		         $form['cmd'] = '_xclick';
		         $form['custom'] = $photo->name;
		         $form['item_number'] = $output->id;
		         $form['item_name'] = "Photo";
		         $form['amount'] = $output->amount;
		         $form['currency_code'] = 'USD';
		         $form['cancel_return'] = url('view_profile/'.$photo->user_id).'?status=cancel';
		         $form['return'] = url('view_profile/'.$photo->user_id)."?status=success&pid=".$photo->id."&image=".$photo->name;
		         $form['notify_url'] = route('lock_photo_payment_res');
		         
		          // print_r($form);

		         return view('payment_form',compact('form'),['paypalURL'=>$paypalURL]);  



		      }else{
		     	return redirect()->back()->with('emessage','Something went wrong');
		      }
         

        
       }else{

       	return redirect()->back()->with('emessage','Something went wrong');
       
       }

    }


    public function  paypalresponse(Request $request){
    	  
	    if($request->input('payment_status') == 'Completed'){
	         $filename = date('h_i_s_A').$request->custom;
             $success = \File::copy(base_path('public/uploaded/user/gallery/'.$request->custom),base_path('public/uploaded/temp/'.$filename));
	         $admin = Admin::select('photo_expire')->where('type','Admin')->first(); 
	         $save['payment_status'] = $request->payment_status;
	         $save['txn_id'] = $request->txn_id;
	         $save['link'] = $filename;
	          
	         if($admin->photo_expire){
	         	$daysext = '+ '.$admin->photo_expire.' days';
	            $save['expiry_date'] = date('Y-m-d H:i',strtotime($daysext));
	         } 
	        
	         PhotoUnlock::where('id',$request->item_number)->update($save);
            
            $photo = PhotoUnlock::find($request->item_number);
            
            $objDemo = new \stdClass();
            $objDemo->view = 'emails.photounlock';
            $objDemo->subject = 'Unlock Photo';
            $objDemo->mail_data = array(
            	                   'Email'=>$photo->email,
            	                   'Link' =>URL::ASSET('uploaded/temp').'/'.$filename
            	                   );

            $mail =  Mail::to($photo->email)->send(new RegisterationMail($objDemo));                
             



	     }else{
	         $save['payment_status'] = $request->payment_status;
	         $save['txn_id'] = $request->txn_id;
	       
	        PhotoUnlock::where('id',$request->item_number)->update($save);

	     }     
    }

    
    public function like_photo(Request $request){
       $json = array('result'=>false,'message'=>'Something went wrong');
       if($request->input('_token')){
              $photo = Media::select('like','counter')->find($request->id);
              if($photo){
              
                 $save['like'] = ++$photo->like;
                 Media::where('id',$request->id)->update($save); 
                 $dt="  <p class='quantity'> <i class='fa fa-eye  btn-xs' ></i>".$photo->like."</p>";
               
                $json = array('result'=>true,'message'=>'Like Successfull','like'=>$dt);
              }    
       }
      return Response()->json($json);
    }


}
