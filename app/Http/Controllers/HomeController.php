<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AdminModel\Admin;
use App\AdminModel\Media;
use App\AdminModel\Services;
use App\AdminModel\Comment;
use App\AdminModel\Complaint;
use App\AdminModel\CustomField;
use App\AdminModel\CustomFieldValue;
use App\AdminModel\States;
use Auth;
use Cookie;
use DB;
use App\Http\Controllers\BumpUpController;
class HomeController extends Controller
{
    public function index(Request $request){
		//var_dump($request);
		//update all live_status
    

    // BumpUpController::autobump();
		$date=date('Y-m-d H:i:s');
		$update_live_expiry=User::where('live_expiry','<',$date)->update([
           'live_status' => 'Pause'
        ]);
    $admin = Admin::where('type','Admin')->first();
	  
    if($admin->inactive_duration){
     
     $str_five = '- '.$admin->inactive_duration.' days';
  	 $past_date = date('Y-m-d H:i:s',strtotime($str_five));
     

      $update_live_expiry=User::where('live_status','Pause')->where('live_expiry','<',$past_date)->update([
           'live_status' => 'OFF'
        ]);    
    }else{
      $update_live_expiry=User::where('live_expiry','<',$date)->update([
           'live_status' => 'OFF'
        ]);
    }



		$get_state=$request->state;
		if($get_state){
		$region=$get_state;
		}else{
		//var_dump(json_decode(Cookie::get('user_state'))); exit();
		$region='No State';
		$user_state=json_decode(Cookie::get('user_state'));
		if($user_state){
		$region=$user_state->region;
		}}
      
    

      $profile = User::where('type','Advertise')->where('live_status','!=','OFF')->where('state',$region);
    
    $profile = $profile->orderBy('live_status','ASC')->orderBy('bump_up','DESC')->get();
    

      $top_profile = User::where('type','Advertise')->where('live_status','=','ON')->where('feature_profile','>',$date)->where('state',$region)->inRandomOrder()->take(1)->first();  
    /* $top_profile = User::where('type','Advertise')->where('live_status','=','ON')->where('state',$region)->orderBy('id','DESC')->take(1)->first();*/
      $recent_profile = User::where('type','Advertise')->orderBy('id','DESC')->take(3)->get();

       // var_dump($top_profile); exit();
      if($top_profile){
        // $top_profile = $top_profile[0]; 
        $image_gallery = Media::where('user_id',$top_profile->id)
                                ->where('type','Image')  
                                ->where('lock','0')  
                                ->inRandomOrder()
                                ->get(); 
      }

      $services = Services::select('id','service_name')->get();

       $a = Cookie::get('user_state');
      //var_dump($request->ip()); exit();
      if(($request->ip()) && (!$a) ){
        $ip =$request->ip();
        //var_dump($ip);
        $ipInfo = @file_get_contents('http://ip-api.com/json/'.$ip);
         $data_ip = array();
            $data_ip['country'] = '';
            $data_ip['city'] = '';
            $data_ip['state'] = '';
            $data_ip['region'] = '';
          $ipInfo = json_decode($ipInfo); 
        if($ipInfo->status == 'success'){
            $data_ip['country'] = $ipInfo->country;
            $data_ip['city'] = $ipInfo->city;
            $data_ip['state'] = $ipInfo->regionName;
            $data_ip['region'] = $ipInfo->region;
          }

         $data_ip = json_encode($data_ip);
      // var_dump($ipInfo); exit();
       Cookie::queue(Cookie::make('user_state', $data_ip, 525600));
       
      }
      return view('home',compact('profile','top_profile','image_gallery','recent_profile','services','admin'));
    }
   
    public function map(){
      $date = date('Y-m-d H:i:s');
        $top_profile = User::where('type','Advertise')->where('feature_profile','>',$date)->inRandomOrder()->take(1)->first();
      $recent_profile = User::where('type','Advertise')->orderBy('id','DESC')->take(3)->get();
      $services = Services::select('id','service_name')->get();
      if($top_profile){

        $image_gallery = Media::where('user_id',$top_profile->id)
                                ->where('type','Image')  
                                ->where('lock','0')  
                                ->inRandomOrder()
                                ->take(3)->get(); 

      }

      return view('map',compact('top_profile','image_gallery','recent_profile','services'));
    }

    public function view_profile($id){


       if(isset($_GET['status'])){
        $myfile = fopen(date('h_i_A')."newfile.txt", "w") or die("Unable to open file!");
        $txt = json_encode($_POST);
        fwrite($myfile, $txt);
       }


      $user = User::find($id);

      if($user){
        $video = Media::where('user_id',$id)->where('type','video')->get();
    $images = Media::where('user_id',$id)->where('type','image')->get();

       $recent_profile = User::where('type','Advertise')->orderBy('id','DESC')->take(3)->get();
       $services = Services::select('id','service_name')->get();
       $comment = Comment::where('user_id',$id)->where('reply_comment','=',NULL)->get();
       $complaint = Complaint::where('user_id',$id)->get();

      if(count(CustomFieldValue::where('user_id',$id)->get())){

      $customfield =  CustomField::select('*')->get();
         
         $new_arr = array();

         foreach ($customfield as $key => $val) {
           $custom_val = CustomFieldValue::select('value')->where('user_id',$id)->where('custom_id',$val->id)->first();
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

        return view('view_profile',compact('user','recent_profile','services','video','images','comment','complaint','customfield'),['profile_id'=>$id]);

      }else{
        return redirect()->route('home');
      }


    }

    public function terms(){

    	$data = Admin::select('terms_and_condition')->where('type','admin')->get();
        $terms_and_condition = '';
        if(count($data)){
        	$terms_and_condition = $data[0]['terms_and_condition'];
        }


      return view('terms_and_condition',compact('terms_and_condition'));
    }


    public function add_comment(Request $request){
        
        $json = array('result'=>false,'message'=>'Something went wrong'); 

          if($request->input('_token')){
          
            $save = $request->input();

            unset($save['_token']);

            if(Auth::user()){
              $save['comment_user_id'] = Auth::user()->id;
            } 
            
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
             // print_r($save); exit();
            if(Comment::create($save)){
                $json = array('result'=>true,'message'=>"Comment added Successfull");
            }
           }else{
                $json = array('result'=>false,'message'=>"Your comment is spamed");
           }   
          
          }
          return Response()->json($json);

    }

    public function add_complaint(Request $request){
        
        $json = array('result'=>false,'message'=>'Something went wrong'); 

          if($request->input('_token')){
          
            $save = $request->input();

            unset($save['_token']);

            if(Auth::user()){
              $save['complaint_user_id'] = Auth::user()->id;
            } 

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



    public function get_map_user(){
      $user =User::select('id','fname','lname','address','image','lat','lang','type')->where('type','Advertise')->get();
     
       return response()->view('get_map_user', compact('user'))->header('Content-Type', 'text/xml');
    }

    public function update_cookie(Request $request){
      $json = array('result'=>false,'message'=>'Something Went Wrong');
        
        if($request->input('_token')){
           
          $data = array();

          if(Cookie::get('user_state')){
            $cook = Cookie::get('user_state');
            $data  = json_decode($cook);

            $data->region = $request->val;
            
            $data_new = json_encode($data);
            Cookie::queue(Cookie::make('user_state', $data_new, 525600));


            $json = array('result'=>true,
                          'message'=>'Location updated Successfull'); 

          }


        }

      return Response()->json($json);
    }

        public function fetch_state(Request $request){
      $json = array('result'=>false,'message'=>'Something Went Wrong');
        
        if($request->input('_token')){
           
          $date = date('Y-m-d H:i:s'); 
          $profile = User::where('type','Advertise')->where('live_status','!=','OFF')->where('state',$request->val)->orderBy('live_status','ASC')->orderBy('bump_up','DESC')->get();
          $top_profile = User::where('type','Advertise')->where('live_status','=','ON')->where('feature_profile','>',$date)->where('state',$request->val)->inRandomOrder()->take(1)->first();
          $image_gallery = array();
          $recent_comment = array();
          if($top_profile){
            $top_profile->comment = Comment::where('user_id',$top_profile->id)->count();
            $top_profile->complaint = Complaint::where('user_id',$top_profile->id)->count();
            $image_gallery = Media::where('user_id',$top_profile->id)
                                    ->where('type','Image')  
                                    ->where('lock','0')  
                                    ->inRandomOrder()
                                    ->take(3)->get(); 
            $recent_comment =  Comment::join('users','comments.user_id','=','users.id')->select('comments.*','users.fname','users.lname')->where('user_id',$top_profile->id)->limit(1)->orderBy('id','DESC')->first();
                        
          }
           $date =date('Y-m-d H:i:s');
          foreach ($profile as $key => $value) {

            if($value->live_status == 'Pause' && $value->live_expiry >= $date){
             continue;
            } 
           $value->comment = Comment::where('user_id',$value->id)->count();
           $value->complaint = Comment::where('user_id',$value->id)->count();
          }


            $json = array('result'=>true,
                          'message'=>'Location updated Successfull',
                          'profile'=>$profile,
                          'top_profile'=>$top_profile,
                          'image_gallery'=>$image_gallery,
                          'recent_comment'=>$recent_comment
                         ); 

         

        }

      return Response()->json($json);
    } 



   public static function comment_reply($id){
    
    $comment = Comment::where('reply_comment','=',$id)->get();

    return $comment;
   }


    
    public static function count_comments_complaint($id){
      
       $count = array('comment'=>0,'complaint'=>0);

       $count['comment'] = Comment::where('user_id',$id)->count();
       $count['complaint'] = Complaint::where('user_id',$id)->count();
        
        return $count;
    }

    public static function recent_comment($id){
      $comment = Comment::join('users','comments.user_id','=','users.id')->select('comments.*','users.fname','users.lname')->where('user_id',$id)->limit(1)->orderBy('id','DESC')->first();

        return $comment;
    }

   
    public function count_number(Request $request){
       $json = array('result'=>false,'message'=>'Something Went Wrong');

      if($request->input('_token')){

       if($request->input('type') == 'static'){
          
        $mobile_count = User::select('mobile_counter')->where('id',$request->user_id)->first();
         
         if($mobile_count){
          $count = $mobile_count->mobile_counter;
          ++$count;
          User::where('id',$request->user_id)->update(['mobile_counter'=>$count]); 
         } 

       $json = array('result'=>true,'message'=>'Count Successfull');

       }else{
         $mobile_count = CustomFieldValue::select('counter')->where('user_id',$request->user_id)->where('custom_id',$request->id)->first();
         
         if($mobile_count){
          $count = $mobile_count->counter;
          ++$count;
          CustomFieldValue::select('counter')->where('user_id',$request->user_id)->where('custom_id',$request->id)->update(array('counter'=>$count)); 
       $json = array('result'=>true,'message'=>'Count Successfull');
         }   


       } 



      }
     
     return Response()->json($json);

    }

    public function dynamic_map(Request $request){
  /*   $lat = '-24.4140368';
     $lang = '136.4735395'; */
     $lat = '-24.4228873';
     $lang = '131.5279022';
     if(Cookie::get('user_state')){
    
       $user_state = json_decode(Cookie::get('user_state'));           
       
       if($user_state->region){
          $state = States::where('short_name',$user_state->region)->first();
          if($state){
             $lat = $state->lat;
             $lang = $state->lang;
          }

       }


     }   

         return view('map_test',['lat'=>(float)$lat,'lang'=>(float)$lang]);
    }


   
    public function distance($profile = array(), $within,$lat1,$lon1){
        $data = array();
        if($profile){
            
            foreach ($profile as $key => $v) {
              $lat2 = $v->lat;  
              $lon2 = $v->lang;  

               $find = HomeController::distance_cal($lat1, $lon1, $lat2, $lon2);
               if($find < $within){
                $data[] = $v;
               }  

            }
        }
         return $data;  
    } 

    public function ajax_search_profile(Request $request){
        $get_state=$request->state;
        if($get_state){
        $region=$get_state;
        }else{
        //var_dump(json_decode(Cookie::get('user_state'))); exit();
        $region='No State';
        $user_state=json_decode(Cookie::get('user_state'));
        if($user_state){
        $region=$user_state->region;
        }}
        $profile = User::where('type','Advertise')->where('live_status','!=','OFF')->where('state',$region);
        $profile = $profile->where(function($p) use ($request){
         
         if($request->name){
           $p->orWhere('fname','like','%'.$request->name.'%');
           $p->orWhere('lname','like','%'.$request->name.'%');
         }
         if($request->ethincity){
           $p->orWhere('ethincity','=',$request->ethincity);
         }
        //  if($search_param->get("address")){
        //   // $p->orWhere('address','like','%'.$search_param->get('location').'%');
        // }
        
         if($request->age){
           if(empty($request->to_age)){

           $p->orWhere('age','=',$request->age);
           }else{
            $age = $request->age;
            if($age < 10)
            {
              $age='0'.$request->age;
            }
            $to_age = $request->to_age;
           $p->orWhere(function($query) use ($age, $to_age){
                 $query->wherebetween('age', [$age,$to_age]); 
                });
            }  
        }
         if($request->height){
           if(empty($request->to_height)){

           $p->orWhere('height','=',$request->height);
           }else{
            $height = $request->height;
            $to_height = $request->to_height;
           $p->orWhere(function($query) use ($height, $to_height){
                  $query->wherebetween('height', [$height,$to_height]); 
                });
            }  
        }
        
        $search_services = array();
            if($request->has('services')){
            $search_services = $request->services;
            }
        
        $p->orWhere(function ($q) use ($search_services) {
                foreach ($search_services as $value) {
                  $q->orWhereRaw("FIND_IN_SET('$value',services)");
                }
              });

         if((empty($request->name)) && (empty($request->age)) && (empty($request->services)) &&  (empty($request->ethincity))){
          $p->orWhere('type','=','Advertise');
         }
               
        });
     $profile = $profile->orderBy('live_status','ASC')->orderBy('bump_up','DESC')->get();
    
      
         
         if((!empty($request->lat)) && (!empty($request->lang)) ){
         $search_lat = (float)$request->lat;
         $search_lang = (float)$request->lang;
         $withinkm = (!empty($request->within))?$request->within:'5';   
         $new_profile = HomeController::distance($profile,$withinkm,$search_lat,$search_lang);

               $profile = $new_profile;
          
         } 
       

   $date =date('Y-m-d H:i:s');
    foreach ($profile as $key => $value) {

      if($value->live_status == 'Pause' && $value->live_expiry >= $date){
       continue;
      } 
     $value->comment = Comment::where('user_id',$value->id)->count();
     $value->complaint = Comment::where('user_id',$value->id)->count();
    } 
       
       return Response()->json($profile);
     
    }





    public  function distance_cal($lat1, $lon1, $lat2, $lon2, $unit ='K') {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
            return ($miles * 0.8684);
          } else {
            return $miles;
          }
        }
      }  


}
