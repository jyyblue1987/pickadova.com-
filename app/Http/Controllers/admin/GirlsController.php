<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\AdminModel\Services;
use Illuminate\Support\Facades\storage;

use App\AdminModel\Media;
use App\AdminModel\Comment;
use App\AdminModel\Complaint;
use App\AdminModel\CustomField;
use App\AdminModel\CustomFieldValue;
use Image;

class GirlsController extends Controller
{
   
   public function index(){

        $data = User::select('id','fname','lname','email','address','email_verification','account_verification','wallet')->where('type','Advertise')->orderBy('id','DESC')->get();

        return view('admin.girls_profile',compact('data'));
   }

   public function view(Request $request, $id){
   	$user_id = $id;
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
        //                  $img = Image::make($image->getRealPath());
        //         $img->resize(50, 50, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })->save($destinationPath.'icon/'.$name);
       
        //          $image->move(public_path().'/uploaded/user/', $name);  
        //         $save['image'] = $name;  
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
             GirlsController::Thumbnail(public_path().'/uploaded/user/'.$imageName,public_path().'/uploaded/icon/'.$imageNamejpg);

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


      
      $user = User::find($id); 
      $services = Services::select('id','service_name')->get();
      $video = Media::where('user_id',$user_id)->where('type','video')->get();
      $images = Media::where('user_id',$user_id)->where('type','image')->get();
      
      if(count(CustomFieldValue::where('user_id',$user_id)->get())){

       $customfield =  CustomField::select('*')->get();
         
         $new_arr = array();

         foreach ($customfield as $key => $val) {
           $custom_val = CustomFieldValue::select('value','counter')->where('user_id',$id)->where('custom_id',$val->id)->first();
           if($custom_val){
            $val['value'] = $custom_val->value;
            $val['counter'] = $custom_val->counter;
           }else{
            $val['value'] = '';
            $val['counter'] = '';
           }
           $new_arr[] = $val;
         }
         $customfield = $new_arr;   
      
      }else{
       $customfield =  CustomField::select('*')->get();  
      }
      $comment = Comment::where('user_id',$id)->get();
      $complaint = Complaint::where('user_id',$id)->get();
      
      return view('admin.view_advertise_profile',compact('user','services','video','images','customfield','customfieldvalue','comment','complaint')); 
    }  
   }



  
  public function video(Request $request,$id){
    
    $json = array('result'=>false,'message'=>'Something went wrong');
    
    $save = array();
    
    if($request->has('video')){
     
           $image=$request->file('video');
           $name=time().'-'.$image->getClientOriginalName();
           $ext = $image->getClientOriginalExtension();
           
           if(($ext != 'ogg') && ($ext != 'mp4') && ($ext != 'webm')){
             $json['message'] = 'Video extension invalid Only allow OGG|MP4|WEBM';
            return Response()->json($json); 
           }     

               $destinationPath = public_path().'/uploaded/user/';
        // $img = Image::make($image->getRealPath());
        // $img->resize(100, 100, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$name);
   

                $image->move(public_path().'/uploaded/user/', $name);  
                $save['name'] = $name;  
                $save['type'] = "video";  
                $save['user_id'] = $id;  
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
                $save['user_id'] = $id;
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


 public function image(Request $request,$id){
    $json = array('result'=>false,'message'=>'Something went wrong');
    
    $save = array();


    // var_dump($request->has('image')); 
   
    if($request->input('_token')){
            
      if($request->has('image')){

        for($i=0; $i< count($request->file('image')); $i++){

           $image=$request->file('image')[$i];
           $name=time().'-'.$image->getClientOriginalName();
           $ext = $image->getClientOriginalExtension();
           
           // if(($ext != 'jpg') && ($ext != 'png') && ($ext != 'jpeg')){
           //   $json['message'] = 'Image extension invalid Only allow JPG|JPEG|PNG';
           //  return Response()->json($json); 
           // }  
   
        $destinationPath = public_path().'/uploaded/user/gallery';
        $img = Image::make($image->getRealPath());
        $img->resize(1080, 1080, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$name);
        // $image->move(public_path().'/uploaded/user/', $name);  
                $save['name'] = $name;  
                $save['type'] = "image";  
                $save['user_id'] = $id;  
                $save['extension'] = $ext;    
           Media::insert($save);

       }
    }
       $json =array('result'=>true,'message'=>'Image added successfull');
    }

    return Response()->json($json);

 } 



  
 public function lock_image(Request $request,$id){
      $json = array('result'=>false,'message'=>'Something went wrong');
        
        $save = array();
       
        if($request->input('_token')){
                
           $save['admin_approval'] = $request->input('lock');

          if(Media::where('id',$request->input('id'))->update($save)){
              $c_status = ($request->input('lock'))?"Approved":"Unapproved"; 
                  $json =array('result'=>true,'message'=> 'Image '.$c_status.' successfull');
          }
        }

        return Response()->json($json);
   
 } 


    
     public function add_comment(Request $request){
        
        $json = array('result'=>false,'message'=>'Something went wrong'); 

          if($request->input('_token')){
          
            $save = $request->input();

            unset($save['_token']);

              $save['comment_user_id'] = '0';
             $secretKey = env('RECAPTCHA_SERVER_KEY');
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $request->token;
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array('secret' => $secretKey, 'response' => $captcha);

            $options = array(
              'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
              )
            );
            $context  = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $responseKeys = json_decode($response,true);
                        
           if($responseKeys['success']){

             unset($save['token']);
           

           
            if(Comment::create($save)){
                $json = array('result'=>true,'message'=>"Comment added Successfull");
            }
          }else{
             $json = array('result'=>false,'message'=>"Your complaint is spamed");
          }
          
          }
          return Response()->json($json);

    }

    public function add_complaint(Request $request){
        
        $json = array('result'=>false,'message'=>'Something went wrong'); 

          if($request->input('_token')){
          
            $save = $request->input();

            unset($save['_token']);

              $save['complaint_user_id'] = '0';
             $secretKey = env('RECAPTCHA_SERVER_KEY');
            $ip = $_SERVER['REMOTE_ADDR'];
            $captcha = $request->token;
            // post request to server
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array('secret' => $secretKey, 'response' => $captcha);

            $options = array(
              'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
              )
            );
            $context  = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $responseKeys = json_decode($response,true);
                        
           if($responseKeys['success']){

             unset($save['token']);
           
            if(Complaint::create($save)){
                $json = array('result'=>true,'message'=>"Complaint added Successfull");
            }
          }else{
             $json = array('result'=>false,'message'=>"Your complaint is spamed");
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


    public function delete_comment(Request $request){

      
      if($request->input('_token')){

        if($request->input('id')){

            $delete = Comment::find($request->input('id'));
             
            if($delete){
                 
                 if($delete->delete()){
                       

             $json = array(
                         'result'=>false,
                         'message'=>"deleted successfull"
                         );

                 }else{

             $json = array(
                         'result'=>false,
                         'message'=>"Something Went wrong while comment is deleted"
                         );
                 }

            }else{

             $json = array(
                         'result'=>false,
                         'message'=>"Comment not found for delete request"
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


    public function delete_complaint(Request $request){

      
      if($request->input('_token')){

        if($request->input('id')){

            $delete = Complaint::find($request->input('id'));
             
            if($delete){
                 
                 if($delete->delete()){
                       

             $json = array(
                         'result'=>false,
                         'message'=>"deleted successfull"
                         );

                 }else{

             $json = array(
                         'result'=>false,
                         'message'=>"Something Went wrong while complaint is deleted"
                         );
                 }

            }else{

             $json = array(
                         'result'=>false,
                         'message'=>"Complaint not found for delete request"
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
