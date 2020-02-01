<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterationMail;
use Hash;
use Auth;
use App\AdminModel\States;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
class RegisterController extends Controller
{
     
     public function index(Request $request){
          
       
         if($request->input('_token')){
               $this->validate($request, [
		            'type'   => 'required',
                'email'   => 'required|email',
		            'password' => 'required|min:6',
		            'fname' => 'required',
		            'lname' => 'required',
		            'address' => 'required',
		            'remember' => 'required',
		        ]);
            
          $user = array();
            
          $check_email = User::select('id')->where('email',$request->email)->get();
          

          if(count($check_email)){
            return redirect()->back()->with('emessage','Email already exist');
          }  


             
           $user['email'] = $request->email;
           $user['password'] = Hash::make($request->password);
           $user['fname'] = $request->fname;
           $user['lname'] = $request->lname;
           $user['lname'] = $request->lname;
           $user['address'] = $request->address;
           $user['lat'] = $request->lat;
           $user['lang'] = $request->lang;
           $user['city'] = $request->city;
           $user['state'] = $request->state;
           $user['ip'] = $request->ip();
           $user['type'] = $request->type;
           $user['device_address'] = ($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
            
                  
           if($data = User::create($user)){
              // var_dump($data); exit();
            $remember_token = sprintf("%06d", mt_rand(1, 999999)); 
            
            User::Where('id',$data->id)->update(array('remember_token'=>$remember_token));

            $objDemo = new \stdClass();
            $objDemo->view = 'emails.registeration';
            $objDemo->subject = 'Verify your account';
            $objDemo->mail_data = array(
            	                   'email'=>$request->email,
            	                   'Verification Code' =>$remember_token
            	                   );

            $mail =  Mail::to($request->email)->send(new RegisterationMail($objDemo));                
             
            if(Mail::failures()){
              
              return redirect()->route('user_verification')->with('message','Sign up Successfull but verification code did not send to you on email')->with('email',$request->email)->with('id',$data->id);
            }else{
              return redirect()->route('user_verification')->with('message','Sign up Successfull verification code sent on your email')->with('email',$request->email)->with('id',$data->id);
            } 

           }else{

              return redirect()->back()->with('emessage','Something went wrong while register your account');
           }           

           
          
         }else{
           
           $states = States::all();
           return view('signup',compact('states'));

         }

     }

    public function verification(Request $request){
          
          if($request->input('_token')){
              $check =User::where('id','=',$request->input('id'))
                            ->where('remember_token','=',$request->input('verifciation_code'))->get();


              if(count($check)){
               
               User::where('id',$request->id)->update(array('email_verification'=>1));
                   
              return redirect()->route('user_signup',['tab'=>'sign-in'])->with('message','verification code matched Successfull');

              }else{
              
              return redirect()->route('user_signup',['tab'=>'sign-in'])->with('emessage','verification code not matched')->with('email',$request->email)->with('id',$request->id);

              }

          }else{
           if($request->session()->has('email')){
            return view('verification',[
            	        'id'=>$request->session()->get('id'),
            	        'email'=>$request->session()->get('email'),
            	         ]);    

           }else{

           	return redirect()->route('user_signup',['tab'=>'sign-in'])->with('message','Something went wrong');
           }  
          }

    }

    
    public function signin(Request $request){
               
       if($request->input('_token')){   

          $this->validate($request, [
              'email'   => 'required|email',
              'password' => 'required'
          ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                 

              if(Auth::user()->email_verification){
				  
				  
				  
                return redirect('/advertise_edit_profile')->with('message','Login Successfull');
              }else{
                  
                  $user_id = Auth::user()->id;
                   Auth::logout();

                // return redirect()->route('user_verification')->with('emessage','Your email is not verified yet')->with('email',$request->email)->with('id',$user_id);

                      $remember_token = sprintf("%06d", mt_rand(1, 999999)); 
                      
                      User::Where('id',$user_id)->update(array('remember_token'=>$remember_token));

                      $objDemo = new \stdClass();
                      $objDemo->view = 'emails.registeration';
                      $objDemo->subject = 'Verify your account';
                      $objDemo->mail_data = array(
                                           'email'=>$request->email,
                                           'Verification Code' =>$remember_token
                                           );

                      $mail =  Mail::to($request->email)->send(new RegisterationMail($objDemo));                
                       
                      if(Mail::failures()){
                        
                        return redirect()->route('user_verification')->with('message','verification code did not send to you on email')->with('email',$request->email)->with('id',$user_id);
                      }else{
                        return redirect()->route('user_verification')->with('message','Please enter verification code sent on your email')->with('email',$request->email)->with('id',$user_id);
                      } 


              }
            }

            return redirect()->route('user_signup',['tab'=>'sign-in'])->with('emessage','email and password invalid')->withInput($request->only('email', 'remember'));
          }else{
              return redirect()->route('user_signup',['tab'=>'sign-in']);
          }


    }

     
    public function ForgotPassword(Request $request){

        if($request->input('_token')){
             $this->validate($request, [
              'email'   => 'required|email'
             ]);
        
          $email = $request->email;
          $check = User::select('id')->where('email',$email)->get();  
          if(count($check)){

            $random_str = Str_random(40);
            
            $save['remember_token'] = $random_str;

            User::where('id',$check[0]->id)->update($save);

            $link  = '<a href="'.url('reset-password/'.$random_str).'">Click here to reset</a>';
            $objDemo = new \stdClass();
            $objDemo->view = 'emails.forgot-password';
            $objDemo->subject = 'Forgot Password ';
            $objDemo->mail_data = array(
                                 'email'=>$request->email,
                                 'Link' =>$link
                                 );

            $mail =  Mail::to($request->email)->send(new RegisterationMail($objDemo));                
             
            if(Mail::failures()){
              
              return redirect()->back()->with('emessage','Something went wrong while email sent');
            }else{
              return redirect()->back()->with('message','Password reset link sent Successfully');
            }   




          }else{
             return Redirect()->back()->with('emessage','Email not found');
          }

       
        }else{
          return view('forgot-password');
        }
    } 

    public function ResetPassword(Request $request, $id){
              
      $check = User::where('remember_token',$id)->get();

      if(count($check)){
          
          if($request->input('_token')){
            $this->validate($request, [
              'new_password'   => 'required|min:6',
              'confirm_password'   => 'required|min:6|same:new_password'
             ]);

            
            $save['password'] = Hash::make($request->new_password); 
            $save['remember_token'] = '';

            if(User::where('remember_token',$id)->update($save)){
       
                 return redirect()->route('user_signup',['tab'=>'sign-in'])->with('message','Password Changed Successfull');
            }else{
                 return redirect()->redirect()->with('emessage','Something went wrong');
            } 



          }else{
            return view('reset-password');
          }
           

      
      }else{
        return redirect()->route('user_signup',['tab'=>'sign-in'])->with('emessage','Your link is expired');
      } 
    }



    public function resend_verification(Request $request){
        
        $json = array('result'=>false,'message'=>'Something went wrong');
             $user_id = $request->id;
         
             $remember_token = sprintf("%06d", mt_rand(1, 999999)); 
             User::Where('id',$user_id)->update(array('remember_token'=>$remember_token));

                      $objDemo = new \stdClass();
                      $objDemo->view = 'emails.registeration';
                      $objDemo->subject = 'Verify your account';
                      $objDemo->mail_data = array(
                                           'email'=>$request->email,
                                           'Verification Code' =>$remember_token
                                           );

                      $mail =  Mail::to($request->email)->send(new RegisterationMail($objDemo));                
                       
                     if(Mail::failures()){
                       
                     $json = array('result'=>false,'message'=>'mail not sent to you');
                     }else{
                     $json = array('result'=>true,'message'=>'New verification code sent on your mail');
                     }
      
      return Response()->json($json);


    }
  



}
