<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\AdminModel\Admin;
use App\AdminModel\Services;
use Illuminate\Support\Facades\storage;

use App\AdminModel\Media;
use App\AdminModel\Comment;
use App\AdminModel\Complaint;
use App\AdminModel\CustomField;
use App\AdminModel\CustomFieldValue;
use App\AdminModel\Notification;
use App\AdminModel\Transation;
use App\AdminModel\NoticeSend;
use App\AdminModel\States;
use Illuminate\Support\Facades\File;
use Image;
class AdvertiseController extends Controller
{
   


   public function index(){
    // echo phpinfo(); exit();
$user_id  = Auth::user()->id;
    $services = Services::select('id','service_name')->get();
    $video = Media::where('user_id',$user_id)->where('type','video')->get();
    $images = Media::where('user_id',$user_id)->where('type','image')->get();
    $comment = Comment::where('user_id',$user_id)->where('reply_comment','=',NULL)->get();
   $complaint = Complaint::where('user_id',$user_id)->get();
   $live = Admin::select('live_amount','live_expiry','live_message','pause_message','bump_up_amount','live_verification')->where('type','Admin')->first();
   $admin_notice = NoticeSend::leftjoin('notice','notice_send.notice_id','=','notice.id')->select('notice_send.id','notice_send.created_at','notice.message')->where('user_id',$user_id)->where('status','0')->get();


      if(count(CustomFieldValue::where('user_id',$user_id)->get())){
        
        $customfield =  CustomField::select('*')->get();
         
         $new_arr = array();

         foreach ($customfield as $key => $val) {
           $custom_val = CustomFieldValue::select('value','counter')->where('user_id',$user_id)->where('custom_id',$val->id)->first();
           if($custom_val){
            $val['value'] = $custom_val->value;
            $val['counter'] = $custom_val->counter;
           }else{
            $val['value'] = '';
            $val['counter'] = '0';
           }
           $new_arr[] = $val;
         }
         $customfield = $new_arr;   
      
      }else{
       $customfield =  CustomField::select('*')->get();  
      }

    return view('advertise_profile',compact('services','video','images','comment','complaint','live','customfield','admin_notice'));
   }

   public function go_live(Request $request){
     
     $json = array('result'=>false,'message'=>'Somethig went wrong');  
     
     if($request->input('_token')){ 
           $user = Auth::user();
          if($request->has('status')){

             if($request->status == 'ON'){
               $pause = array();
               $pause['live_status']='Pause';
               // $pause['live_expiry']=date('Y-m-d H:i:s');
              // print_r($pause); exit();
               User::where('id',$user->id)->update($pause);

               $json = array('result'=>true,'message'=>"You are now Paused");
               return Response()->json($json);  

             } 
             if($request->status == 'Pause'){
               $pause = array();
               $pause['live_status']='ON';
               // $pause['live_expiry']=date('Y-m-d H:i:s');
              // print_r($pause); exit();
               User::where('id',$user->id)->update($pause);

               $json = array('result'=>true,'message'=>"You are now Live");
               return Response()->json($json);  

             }
          }

           if(!empty(Auth::user()->age)){


           $admin = Admin::select('live_amount')->where('type','Admin')->first();

          

         
           $live_status = $user->live_status;   

           

             if($admin->live_amount > $user->wallet){
                $json['message'] = 'Your wallet have insuficient balance for go live';
                return Response()->json($json);
               }
              
               $expiry =' + '.$request->expiry.' days';
               if($request->has('status')){
                 $save['live_status'] = $request->status;
               }else{
                
               $save['live_status'] = 'ON';
               $save['wallet'] = $user->wallet - $admin->live_amount;
               $save['live_expiry'] =date('Y-m-d H:i', strtotime($expiry));
               $save['bump_up'] =date('Y-m-d H:i:s');
               }
             
          if(User::where('id',$user->id)->update($save)){
               $trans_id = Transation::orderBy('id','DESC')->first();
               $save1['amount'] = $admin->live_amount;  
               $save1['user_id'] = $user->id;  
               $save1['type'] = 'Live';  
          
               if($trans_id){
                 $order_id = ++$trans_id->order_id;             
                 $save1['order_id'] = $order_id;  
               }else{
                 $save1['order_id'] = 'PIC-000001';  
               }
               $save1['payment']='Dr';
               $save1['status']='Completed';

              Transation::insert($save1);
               

   
            if($request->has('status')){
             $json = array('result'=>true,'message'=>"You are now Pause");
            }else{
             $json = array('result'=>true,'message'=>"You are now Live");

            }

          }
         }else{
          $json = array('result'=>false,'message'=>"Please Complete your profile for go live");

         }
 
     }
      
     return Response()->json($json);     

   }
   
   public function edit(Request $request){
         $user_id =Auth::user()->id;
     if($request->input('_token')){
        
        $save = array();
        $save = $request->input();
         
        unset($save['_token']); 

        
        if(($request->has('start_work')) || $request->has('end_work')){
            $save['start_work'] = json_encode($request->start_work);
            $save['end_work'] = json_encode($request->end_work);

        }
        if($request->has('services')){

           $save['services'] = implode(',', $request->services);
        }
        if($request->has('about_me')){

           $save['about_me'] = $request->about_me;
        }
        // if($request->has('image')){

        // $destinationPath = public_path().'/uploaded/';
        //    $image=$request->file('image');
        //         $name=time().'-'.$image->getClientOriginalName();
        //         $img = Image::make($image->getRealPath());
        //         $img->resize(30, 30, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($destinationPath.'icon/'.$name);
        //    $image->move(public_path().'/uploaded/user/', $name);  
       
        //    $save['image'] = $name;  
        // }


        if($request->input('image')){
            $image = $request->image;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $timecur_s = time().str_random(10);
            $imageName = $timecur_s.'-user.'.'png';
            $imageNamejpg = $timecur_s.'-user';
            \File::put(public_path().'/uploaded/user/'. $imageName, base64_decode($image));
            // \File::put(public_path().'/uploaded/icon/'. $imageName, base64_decode($image));
             AdvertiseController::Thumbnail(public_path().'/uploaded/user/'.$imageName,public_path().'/uploaded/icon/'.$imageNamejpg);

            $save['image'] = $imageName;
          }
        
        if($request->has('custom')){
          
           $custom = $request->custom;

           foreach ($custom as $key => $value) {
                  $set_c = array();
                  $set_c['user_id'] = $user_id;
                  $set_c['custom_id'] = $key;
                  $set_c['value'] = $value;
             
              $check_s = CustomFieldValue::where('user_id',$user_id)->where('custom_id',$key)->get();
              if(count($check_s)){
                 CustomFieldValue::where('id',$check_s[0]['id'])->update($set_c);
              }else{
                 CustomFieldValue::insert($set_c);

              }


           }  
          unset($save['custom']);
        }
        

        if(!count($save)){

         $json = array(
                      'result'=>false,
                      'message'=>"You do not have any value",
                      );
        }else{

          if(User::where('id',$user_id)->update($save)){
           
           $json = array(
           	            'result'=>true,
           	            'message'=>"update successfull",
                        );

          }else{

           $json = array(
           	            'result'=>false,
           	            'message'=>"Something went wrong",
                        );
          }
       }
       return Response()->json($json);

     }else{

      $services = Services::select('id','service_name')->get();
      $video = Media::where('user_id',$user_id)->where('type','video')->get();
      $images = Media::where('user_id',$user_id)->where('type','image')->get();
      $states = States::all();
      if(count(CustomFieldValue::where('user_id',$user_id)->get())){

      // $customfield =  CustomField::leftjoin('custom_field_value','custom_field.id','=','custom_field_value.custom_id','and','custom_field_value.user_id','=',$user_id)->select('custom_field.*','custom_field_value.value')->get();

        $customfield =  CustomField::select('*')->get();
         
         $new_arr = array();

         foreach ($customfield as $key => $val) {
           $custom_val = CustomFieldValue::select('value')->where('user_id',$user_id)->where('custom_id',$val->id)->first();
           if($custom_val){
            $val['value'] = $custom_val->value;
           }else{
            $val['value'] = '';
           }
           $new_arr[] = $val;
         }
         $customfield = $new_arr;   

      }else{
       $customfield =  CustomField::select('*')->get();  
      }

     $live = Admin::select('live_amount','live_expiry','live_message','pause_message','feature_amount','feature_expiry','bump_up_amount','live_verification')->where('type','Admin')->first();
     $comment = Comment::where('user_id',$user_id)->where('reply_comment','=',NULL)->get();
     $complaint = Complaint::where('user_id',$user_id)->get();
      
     $requested = Notification::select('id')->where('notification_type','Verification')->where('sender_id',$user_id)->first(); 
   
       $admin_notice = NoticeSend::leftjoin('notice','notice_send.notice_id','=','notice.id')->select('notice_send.id','notice_send.created_at','notice.message')->where('user_id',$user_id)->where('status','0')->get();
      
      // var_dump($customfieldvalue[0]); exit();
      return view('advertise_edit_profile',compact('services','video','images','customfield','customfieldvalue','live','comment','complaint','requested','states','admin_notice'));
     }
   }
   

  
  public function video(Request $request){
    
    $json = array('result'=>false,'message'=>'Something went wrong');
    
    $save = array();
    
    if($request->has('video')){
     
           $image=$request->file('video');
           $name=time().'-'.$image->getClientOriginalName();
           $ext = $image->getClientOriginalExtension();
           $ext = strtolower($ext);
           if(($ext != 'ogg') && ($ext != 'mp4') && ($ext != 'MP4') && ($ext != 'webm') && ($ext != 'm3u8') && ($ext != 'ts') && ($ext != 'flv') && ($ext != '3gp') && ($ext != 'mov') && ($ext != 'MOV' && ($ext != 'wmv') && ($ext != 'WMV')  ) ){
             $json['message'] = ' Video extension invalid Only allow OGG|MP4|WEBM|m3u8|ts|flv|3gp|mov';
            return Response()->json($json); 
           }     

               $destinationPath = public_path().'/uploaded/user/';
       
                $image->move(public_path().'/uploaded/user/', $name);  
                $save['name'] = $name;  
                $save['type'] = "video";  
                $save['user_id'] = Auth::user()->id;  
                $save['extension'] = $ext;  
                $save['video_type'] = 'file';  

    }

    if(!empty($request->input('youtube_link'))){
        $youtube_link = $request->input('youtube_link');
              if (strpos($youtube_link, 'watch?v=') !== false) {
                      $youtube_link = str_replace('watch?v=','',$youtube_link);
                  }
                $save['name'] = $youtube_link;  
                $save['type'] = "video";  
                $save['user_id'] = Auth::user()->id;
                $save['video_type'] = 'link';    
    }

    
    if(count($save)){
       
         if(Media::insert($save)){
              $json =array('result'=>true,'message'=>'Video added successfull');
         }





    }else{
      $json['message'] = 'No input value found';
    }

 
    return Response()->json($json);


  } 



 public function image(Request $request){
    $json = array('result'=>false,'message'=>'Something went wrong');
    
    $save = array();


    // var_dump($request->has('image')); 
   
    if($request->input('_token')){
            
      if($request->has('image')){

        for($i=0; $i< count($request->file('image')); $i++){

           $image=$request->file('image')[$i];
           $name=time().'-'.$image->getClientOriginalName();
           /*$name1='blur'.time().'-'.$image->getClientOriginalName();*/
           $ext = $image->getClientOriginalExtension();
           
           $destinationPath = public_path().'/uploaded/user/gallery';
           $img = Image::make($image->getRealPath());
         /*  $img1 = Image::make($image->getRealPath());
           $img1->blur('70');*/
           $img->resize(1080, 1080, function ($constraint) {
           $constraint->aspectRatio();
           })->save($destinationPath.'/'.$name);           
          /* $img1->resize(1080, 1080, function ($constraint) {
           $constraint->aspectRatio();
           })->save($destinationPath.'/'.$name1);*/
   
        // $image->move(public_path().'/uploaded/user/', $name);  
   
                $save['name'] = $name;  
                $save['type'] = "image";  
                $save['user_id'] = Auth::user()->id;  
                $save['extension'] = $ext;    
           Media::insert($save);

       }
    }
       $json =array('result'=>true,'message'=>'Image added successfull');
    }

    return Response()->json($json);

 } 


  
 public function lock_image(Request $request){
      $json = array('result'=>false,'message'=>'Something went wrong');
        
        $save = array();
       
        if($request->input('_token')){
                
           $save['lock'] = $request->input('lock');
           $save['amount'] = $request->input('amount');
             $admin = Admin::select('max_amount')->where('type','Admin')->first();
                   
           if($request->input('image')){
           $destinationPath = public_path().'/uploaded/user/gallery';
           $image=public_path().'/uploaded/user/gallery/'.$request->input('image');
           if (!file_exists(public_path($destinationPath.$image))) { 
           $name1='blur'.$request->input('image');
           $ext = $request->input('ext');
           
           $img1 = Image::make($image);
           $img1->blur('70');
               
           $img1->resize(1080, 1080, function ($constraint) {
           $constraint->aspectRatio();
           })->save($destinationPath.'/'.$name1);
           }
       

      
   
          if($admin->max_amount >= $save['amount'])
          {
          if(Media::where('id',$request->input('id'))->update($save)){
             $result_text = ($request->input('lock') == '1')?"Lock":"unlock";

                  $json =array('result'=>true,'message'=> 'Image '.$result_text.' successfull');
          }
          }
          else
          {
             $json =array('result'=>false,'message'=> 'Maximum limit is $'.$admin->max_amount.'.00');
          }
        }
 }
        return Response()->json($json);
   
 } 


 public function request_verification(Request $request){
       
     $json = array('result'=>false,'message'=>"Something went wrong");

     if($request->input('_token')){
        $user = Auth::user();
        $save['sender_id'] = $user->id;
        $save['reciever_id'] = '0';
        $save['title'] = 'Verification Request';
        $save['message'] = $user->fname.' '.$user->lname.' is requested for verification';
        $save['link'] = 'admin/view_advertise_profile/'.$user->id;
        $save['type'] = 'Admin';
        $save['notification_type'] = 'Verification';
      
       if(Notification::insert($save)){
        $json = array('result'=>true,'message'=>'Requested successfull');
       }
     }

   return Response()->json($json); 
 }



    public function delete_media(Request $request){

      
      if($request->input('_token')){

        if($request->input('id')){

            $delete = Media::find($request->input('id'));
             
            if($delete){
                 
                 if($delete->delete()){
                       

             $json = array(
                         'result'=>false,
                         'message'=>"deleted successfull"
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
                         'message'=>"Media not found for delete request"
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






   public function Thumbnail($url, $filename, $width = 30, $height = true) {

       // download and create gd image
       $image = ImageCreateFromString(file_get_contents($url));

       // calculate resized ratio
       // Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
       $height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;

       // create image 
       $output = ImageCreateTrueColor($width, $height);
       ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));

       // save image
       imageJPEG($output, $filename.'.jpg', 95); 
       imagepng(imagecreatefromstring(file_get_contents($filename.'.jpg')), $filename.'.png');
      unlink($filename.'.jpg');

       // return resized image
       return $output; // if you need to use it
      }






}
