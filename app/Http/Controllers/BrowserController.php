<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use Illuminate\Support\Facades\storage;
use Image;
class BrowserController extends Controller
{


      public function index(){
       $user = Auth::user();

      	return view('browser_profile',compact('user'));
      }

      public function edit(Request $request){
         
          $user = Auth::user();
        if($request->input('_token')){
          $json = array('result'=>true,'message'=>'Something went wrong');
           $save = $request->input();
           unset($save['_token']);

        //     if($request->has('image')){

        //    $destinationPath = public_path().'/uploaded/';
        //    $image=$request->file('image');
        //         $name=time().'-'.$image->getClientOriginalName();
        //         $img = Image::make($image->getRealPath());
        //         $img->resize(250, 250, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($destinationPath.'user/'.$name);
        //    $save['image'] = $name;  
        // }

   
          if($request->input('image')){
            $image = $request->image;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time().str_random(10).'-user.'.'png';
            \File::put(public_path().'/uploaded/user/'. $imageName, base64_decode($image));
            $save['image'] = $imageName;
          }
        

           if(User::where('id',$user->id)->update($save)){
              $json = array('result'=>true,'message'=>'Update Successfull');       
           }    

           return Response()->json($json);

        }else{
          return view('browser_edit_profile',compact('user'));
       }
      }


      public function change_password(Request $request){
        
          if($request->input('_token')){
            $this->validate($request, [
              'current_password'   => 'required|min:6',
              'new_password'   => 'required|min:6',
              'confirm_password'   => 'required|min:6|same:new_password'
             ]);
              
              $user = Auth::user();
                

              if(!Hash::check($request->current_password,$user->password)){
                return redirect()->back()->with('emessage','Current Password not matched');
              }

            $save['password'] = Hash::make($request->new_password); 
         
            if(User::where('id',$user->id)->update($save)){
       
                 return redirect()->route('advertise_profile')->with('message','Password Changed Successfull');
            }else{
                 return redirect()->back()->with('emessage','Something went wrong');
            } 



          }else{
           return view('change_password');
          }
           

      }

      
      public function user_change_email(Request $request){

          if($request->input('_token')){

               $user = Auth::user()->id;

             $check = User::select('id')->where('email',$request->email)->where('id','!=',$user)->get();

             if(!count($check)){
                 
                $save['email_verification'] = '0';
                $save['email'] = $request->email;

                if(User::where('id',$user)->update($save)){
                      
                      Auth::logout();
                      return redirect()->route('user_signup',['tab'=>'sign-in'])->with('message','Email change Successfull');
                }else{
                     return redirect()->back()->with('emessage','Something went wrong');
                }
                    

             }else{
                return redirect()->back()->with('emessage','Email already exist');
             }
 



          }else{
            return redirect()->back()->with('emessage','Something went wrong');
          }


      }
    



}
