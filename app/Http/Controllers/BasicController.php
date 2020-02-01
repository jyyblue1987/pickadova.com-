<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Media;
use App\AdminModel\Report;
use App\AdminModel\NoticeSend;
use Auth;
class BasicController extends Controller
{


  public function home_page_search(Request $request){
     $services = '';

     if($request->input('services')){
     	$services =implode(',', $request->services);
     }
    $check_search = true;

   return redirect()->back()->with('name',$request->name)->with('age',$request->age)->with('to',$request->to)->with('height',$request->height)->with('location',$request->location)->with('within',$request->within)->with('lat',$request->lat)->with('lang',$request->lang)->with('services',$services)->with('check_search',$check_search);
  }

  
  public function add_image_counter(Request $request){
     $json = array('result'=>false,'message'=>"Something went wrong");
     if($request->input('_token')){
           $id = $request->input('id');
        
           $media = Media::find($id);

           if($media){
               $media  = $media->counter;
               
               $save['counter'] = ++$media;

               Media::where('id',$id)->update($save);
                 $dt1="  <p class='quantity1'> <i class='fa fa-heart  btn-xs' ></i>".$media->counter."</p>";
            $json = array('result'=>true,'message'=>"Count",'counter'=>$dt1);
           }
     }

     return Response()->json($json); 
  }

  
  public function addreport(Request $request){
    
 
      if($request->input('_token')){

            $this->validate($request, [
              'name'   => 'required',
              'email'   => 'required|email',
              'title'   => 'required',
              'report'   => 'required'
             ]);
        
          

             $secretKey = env('RECAPTCHA_SERVER_KEY');
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
             
             $user = Auth::user();

             if($user){

             $report['user_id'] = $user->id;
             }

             $report['name'] = $request->name;
             $report['email'] = $request->email;
             $report['title'] = $request->title;
             $report['report'] = $request->report;
             $report['ip'] = ($request->ip())?$request->ip():'';
             $report['device_address'] = ($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'';
            
             if(Report::insert($report)){

            return redirect()->back()->with('message','Report submitted successfull');
             }else{

            return redirect()->back()->with('emessage','Something went wrong');
             }

             
          }else{
            return redirect()->back()->with('emessage','Your report is spam');
          } 
        
           



      }

  }


  public function change_notice_status(Request $request){
        $json = array('result'=>false,'message'=>'Something went wrong');
        if($request->input('_token')){
           if($request->id){
                $save['status'] = 1;
                NoticeSend::where('id',$request->id)->update($save);
                $json = array('result'=>true,'message'=>'status change successfull');
           }  

        }
        return Response()->json($json);
   }

 
  public static function day_name($name){
     
     if($name == 'mon'){
      return "Monday";
     }
     else if($name == 'tue'){
      return "Tuesday";
     }
     else if($name == 'wed'){
      return "Wednesday";
     }
     else if($name == 'thu'){
        return "Thursday";
     }else if($name == 'fri'){
      return "Friday";
     }else if($name == 'sat'){
      return "Saturday";
     }else if($name == 'sun'){
      return "Sunday";
     }else{
      return "Monday";
     }


  }



}
