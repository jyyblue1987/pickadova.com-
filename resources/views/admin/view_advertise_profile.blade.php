<?php use App\Http\Controllers\HomeController; ?>
@extends('admin.layouts.app')

@section('content')


<link rel="stylesheet" type="text/css" href="{{URL::ASSET('css/style.css')}}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css">
<style type="text/css">
    .profile_m{
            padding: 0px !important;
            margin: 0px !important;
            width: 100% !important;
          }
   input.timepicker {
    width: 81px;
}
.upload_video_div {
    width: 50%;
    display: block !important;
    margin-top: 5px;
    float: left;
    height: auto;
}
.upload_video_div iframe {
    width: 100%;
    height: auto;
}
.dissama p {
    font-size: 14px;
   
}
.reveal1 {
    float: left;
    margin-top: 0px !important;
    /* margin-top: 8px!important; */
    width: 60%;
    margin-left: 13px;
    padding: 2px;
   
    border-bottom: 1px solid black;
    border-top: none;
    border-left: none;
    padding-bottom: 10px;
    font-size: 14px;
}
.note-editor.note-frame .note-editing-area {
    border-top: 1px solid #d1d1d1;
    border-right: 1px solid #00000017;
}
.panel.panel-default > .panel-heading
{
    border-right: 1px solid #00000017;
}
.red_btn {
 border-radius: 16px;
}
.note-editor.note-frame {
    border: 1px solid #a9a9a9;
    width: 93%;
}
.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
display: block;
max-width: 100%;
height: auto;
float: left;
width: 13%;
}
input.timepicker {
width: 67px;
margin-left: 10px;
margin-right: 10px;
font-size: 13px;
}



  #progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
}
#progress-wrp .progress-bar{
  height: 20px;
    border-radius: 3px;
    background-color: #f39ac7;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
}
#progress-wrp .status{
  top:3px;
  left:50%;
  position:absolute;
  display:inline-block;
  color: #000000;
}
input.timepicker {
    width: 50%;
    /* margin-left: 10px; */
    /* margin-right: 10px; */
    font-size: 13px;
    border-bottom: 1px solid black;
    /* border: navajowhite; */
    border-top: none;
    border-left: none;
    border-right: none;
}
.service_check label span {
    font-size: 16px;
    font-weight: bold;
    margin-left: 8px;
    float: left;
     margin-top: 0px; 
    margin-right: 10px;
}
.service_check label {
    margin-right: 19px;
}
   input.timepicker {
    width: 64px;
     margin: 0px; 
    float: left;
}
.hours div {
    float: left;
    width: 100%;
    display: inline-flex;
}
.hours_edit span {
    font-size: 14px;
    font-weight: bold;
    display: inline-flex;
}
.hours span {
    float: right;
    margin-right: 14px;
}
.hours_edit p {

float: left;
    width: 100%;
    text-align: left;
    display: inline-flex;

    font-size: 14px;
    font-weight: bold;
}
.hours_edit div {
    margin-bottom: 10px;
    width: 235px;
    margin-left: -10px;
    margin-right: -10px;
}
.hours
{
  width: 190px;
}
.upload_photo {
    float: left;
    margin-top: 30px;
    margin-left: 0px;
    position: relative;
    width: 100%;
}
.upload_photo_div {
    width: 155px;
    margin-right: 5px;
    float: left;
    position: relative;
}
.dissama input, .dissama select {
    float: left;
}
.upload_video_div{
    width: 50%;
    display: flex;
    margin-top: 5px;
   
    float: left;
   
}
.upload_photo a {
    color: #ff0101;
    text-decoration: underline;
    font-weight: bold;
    font-size: 13.5px;
    float: right;
    margin-top: 135px;
    /* padding-left: 2px; */
    margin-left: 8px;
    vertical-align: middle;
}
.img-gallery-box {
float: left;
width: auto !important;
}
.gallery_img_grp img {
width: auto !important;

}
.hours_edit button {
    margin-top: 30px;
}
.pink_bar1 {
  
    font-size: 21px;
    padding: 10px 35px;
   
}
.chatting_text {
    font-size: 14px;
    font-weight: normal;
    display: inline-block;
    margin-top: 9.6px;
    line-height: 22px;
}
.shadow {
    box-shadow: none;
}
</style>
  <section class="content">
            <div class="page-heading">
                <h1>View Profile</h1>
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
            
                    <div class="panel-body">
                   


   <div class="main profile_m">
       <!--  <div>
            <div class="boy_test">
                <h4>Boys Testimonial</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="#">Add New</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Search Now</a></p>
            </div>
            <button class="pause_btn">PAUSE AD</button>
            <div class="credit">
                <h4>Account Credit</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="#">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>$100.00</span></p>
            </div>
        </div> -->
        <div id="edit">
           <!--  <div class="shadow live_bar">
                YOUR PROFILE IS LIVE
                <div>
                    <img src="{{URL::ASSET('images/up_arrow.png')}}">
                    <p class="live_barP">$0.00</p>
                    <p class="live_barP1">BUMP UP</p>
                </div>
            </div>
            <p class="profile_expire">
            @if($user->account_verification)
              Your Profile is not visiable to Visitor, "GO LIVE" to be visible
            @else
              Your profile is not verified please complete your profile
            @endif
            </p> -->
            <div class="pre_profile shadow pre_profile_edit">
                <div class="float">
                 


                  <form action="{{route('view_advertise_profile',$user->id)}}"  method="post" id="basic-profile-form"  onsubmit="return false;" >
                    @csrf

                    <div class="pumpup wow fadeInRight" data-wow-delay="0.2s">
                        <p id="pump_p" style="color: #000;">Wallet:- $ {{$user->wallet}}</p>
                        <!-- <select>
                            <option>Min</option>
                            <option>Max</option>
                        </select> -->
                        <!-- <input class="pump_input" type="text" name=""> -->
                        <div id="verify_box">
                            <button type="button" class="btn red_btn " id="chnge-pswd-btn" data-toggle="modal" data-target='#password-recovery' >Change Password</button>
                            <button type="button" class="btn red_btn " id="add-mount-wallet" data-toggle="modal" data-target='#add-amount-sect' >Add Amount</button>
                            <a href="{{route('transaction',['id'=>$user->id])}}" class="btn red_btn "  >View transaction</a>
                            <!-- <button type="button" class="btn red_btn">Request Verification</button> -->
                            <!-- <div id="verify_boxdiv">
                                <p>Profile highlight</p>
                                <div>$10.00/week</div>
                                <div id="verify_boxdivdiv">
                                    <input class="form-check-input pump_check" type="checkbox" name="remember">
                                    <span>Auto Cycle</span><br />
                                    <span id="verify_boxspan">every week</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="hours hours_edit wow fadeInLeft" data-wow-delay="0.2s">
                        <img id="hours_edit_img" src="{{URL::ASSET('uploaded/user')}}/{{$user->image}}">
                        
                        @if($user->account_verification) 
                        <img id="hours_edit_img1" src="{{URL::ASSET('images/double_ribbon2.png')}}">
                        @endif
                        <button type="button" class="btn red_btn">Change Profile Picture</button>
                        <input type="file" id="profile-image-upload"  style="opacity: 0;top: 214px;position: absolute;" accept="image/*" >
                         <div id="uploaded_image"></div>
                        <h3 class="housh3">WORK HOURS</h3>
                         @php   $start_work = array();
                                $end_work = array();
                                if($user->start_work){
                                   $start_work =json_decode($user->start_work); 
                                   $end_work =json_decode($user->end_work); 
                                  } 

                           @endphp


                        <div>
                            <p><span>Monday</span><input type="text" class="timepicker" name="start_work[mon]" value="@if($start_work){{$start_work->mon}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[mon]" value="@if($end_work){{$end_work->mon}}@endif"></p>
                        </div>
                        <div>
                            <p><span>Tuesday</span><input type="text" class="timepicker" name="start_work[tue]" value="@if($start_work){{$start_work->tue}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[tue]" value="@if($end_work){{$end_work->tue}}@endif"></p>                      </div>
                        <div>
                            <p><span>Wednesday</span><input type="text" class="timepicker" name="start_work[wed]" value="@if($start_work){{$start_work->wed}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[wed]" value="@if($end_work){{$end_work->wed}}@endif"></p>
                        </div>
                        <div>
                            <p><span>Thursday</span><input type="text" class="timepicker" name="start_work[thu]" value="@if($start_work){{$start_work->thu}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[thu]" value="@if($end_work){{$end_work->thu}}@endif"></p>
                        </div>
                        <div>
                            <p><span>Friday</span><input type="text" class="timepicker" name="start_work[fri]" value="@if($start_work){{$start_work->fri}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[fri]" value="@if($end_work){{$end_work->fri}}@endif"></p>
                        </div>
                        <div>
                            <p><span>Saturday</span><input type="text" class="timepicker" name="start_work[sat]" value="@if($start_work){{$start_work->sat}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[sat]" value="@if($end_work){{$end_work->sat}}@endif"></p>
                        </div>
                        <div>
                            <p><span>Sunday</span><input type="text" class="timepicker" name="start_work[sun]" value="@if($start_work){{$start_work->sun}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[sun]" value="@if($end_work){{$end_work->sun}}@endif"></p>
                        </div>
                        <!-- <div>
                            <p>MON____AM<select><option></option></select></p>
                            <span>TO____PM<select><option></option></select></span>
                        </div>
                        <div>
                            <p>MON____AM<select><option></option></select></p>
                            <span>TO____PM<select><option></option></select></span>
                        </div>
                        <div>
                            <p>MON____AM<select><option></option></select></p>
                            <span>TO____PM<select><option></option></select></span>
                        </div> -->
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                        <!-- <button class="btn red_btn">Change Name</button>
                        <button class="btn red_btn">Change Password</button>
                        <button class="btn red_btn">Change Email</button>
                        <button class="btn red_btn red_btn_location"><img src="{{URL::ASSET('images/location_white.png')}}"> Change Location</button> -->
                    </div>
                    <div class="wow fadeInRight user_profile_container" data-wow-delay="0.6s">
                        <div class="info dissama">
                            <div><p>First name*</p>   <input type="text" name="fname" value="{{$user->fname}}" required readonly=""></div>
                            <div><p>Last name*</p>   <input type="text" name="lname" value="{{$user->lname}}" required readonly></div>
                            <div><p>Suburb*</p>   <input type="text" name="address" id="location" value="{{$user->address}}" required readonly></div>
                            <input type="hidden" name="lat" id="lat" value="{{$user->lat}}" readonly>
                            <input type="hidden" name="lang" id="lang" value="{{$user->lang}}" readonly>
                            <div><p>State*</p> <input readonly type="text" name="state" value="{{$user->state}}" id="state_name" required></div>
                             
                            <div><p>City*</p>   <input type="text" name="city" id="city_name" value="{{$user->city}}" required readonly></div>
                            <div><p>Age*</p>   <input type="number" name="age" value="{{$user->age}}" required readonly></div>
                            @if($customfield)
                               
                               @foreach($customfield as $key =>$val)
                                <div>
                                    @if($val->input_type == 'text')
                                    <p>{{$val->label}} @if($val->required) * @endif </p>
                                         <input type="text" name="custom[{{$val->id}}]" value="{{$val->value}}" readonly=""  @if($val->required) required @endif  >
                                    @elseif($val->input_type == 'select')
                                    <p>{{$val->label}} @if($val->required) * @endif </p>
                                       @php $option = json_decode($val->option);  @endphp 
                                       <select name="custom[{{$val->id}}]" disabled=""  @if($val->required) required @endif >
                                                <option value="{{($val->value)?$val->value:''}}" >{{($val->value)?$val->value:'Select Option'}}</option>
                                        @if($option)
                                             @foreach($option as $key =>$o) 
                                                <option value="{{$o}}">{{$o}}</option>
                                             @endforeach 
                                        @endif
                                       </select>
                                    @endif
                                </div> 

                               @endforeach 

                            @endif

                        </div> <div class="other_contact ">
                              <p> <img src="{{URL::ASSET('images/phone.png')}}" class="img-responsive" style="float: left;margin-right: 8px; width: auto;"> <span style="margin-top: 7px; float: left;">Contact Info</span></p><br>
                        <div class="row" >
                               <div class="col-md-6"><p style="font-weight: 100;">Preferred Contact Method</p> 
                              <p  style="font-weight: 100;">Mobile number({{$user->mobile_counter}})</p> 
                                </div>
                                <div class="col-md-6">
  <p>Call&amp;Text</p>
                         <p><input type="number" name="mobile_no" value="{{$user->mobile_no}}"  style="border: none; color: inherit; "  required> </p>
                       <!--      <a href="#"  style="font-weight: 100; font-size:16px;
                            text-decoration:underline;">Click Here To Reveal...</a> -->
                                </div>
                              
                        </div>
                            <p>OTHER CONTACTS</p>
                          
                             
                            @if($customfield)
                               
                            <div class="row" >
                               @foreach($customfield as $key =>$val)
                                @if($val->input_type == 'contact')
                                <div class="col-md-6" >
                                      <img src="{{URL::ASSET('uploaded/icon')}}/{{$val->icon}}" class="img-responsive" height="40" width="40">({{$val->counter}})
                                        <input type="number" class="reveal1" name="custom[{{$val->id}}]" value="{{$val->value}}" placeholder="Enter Your {{$val->label}} No" style=" color: inherit; " @if($val->required) required @endif  > 
                                </div>
                               
                                @endif
                               @endforeach 

                            </div>
                            @endif
                           
                              <button type="submit" class="btn red_btn save_btn">Save</button>
                        </div>                   
                    </div>

                  </form> 
         
                    <div>
                        <form action="{{route('view_advertise_profile',$user->id)}}" method="post" id="service-form" onsubmit="return false;" >
                            @csrf

                        @php  $services_arr = array(); @endphp
                        @if($user->services)
                         @php  $services_arr = explode(',',$user->services); @endphp
                        @endif
                            
                        <div class="pink_bar1">Service selection</div>
                        <div class="form-group form-check service_check">
                            @if($services)
                                @foreach($services as $key =>$v)
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="{{$v->id}}" name="services[]" required="" @if(in_array($v->id,$services_arr)) Checked @endif>
                                    <span> {{$v->service_name}}</span>
                                </label>
                                @endforeach
                            @endif
                        <button class="btn red_btn save_btn save_btn2">Save</button>

                        </div>
                      </form>
                    </div>
                    <div>

                        <form action="{{route('view_advertise_profile',$user->id)}}" method="post" id="about-form" onsubmit="return false;" >
                            @csrf
                        <div class="pink_bar1">About me</div>
                        <div id="widget">
                            <div  id="summernoteemoji" ></div>
                            <textarea class="form-control" name="about_me" id="summernote" required  >{{$user->about_me}}</textarea>
                        </div>

                        <button type="submit" class="btn red_btn save_btn save_btn2" style="margin-right: 80px;">Save</button>
                      </form>
                    </div>
                    <div>
                        <div class="pink_bar1">Video Gallery</div>
                           
                        <button class="btn red_btn save_btn save_btn1"  data-toggle="modal" data-target="#VideoModal">Add Video</button><br>
                        <div class="upload_photo">

                            @if($video)
                              @foreach($video as $key=>$v)    
                               
                                @if($v->video_type == 'file')    
                                <div class="upload_video_div">
                                    <!-- <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}"> -->

                                    <video width="100%" height="40%" controls>
                                      <source src="{{URL::ASSET('uploaded/user')}}/{{$v->name}}" type="video/{{$v->extension}}">
                                    </video>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                     <!--        <input class="form-check-input add-to-lock" type="checkbox" name="remember" data-id="{{$v->id}}"  @if($v->lock) Checked @endif>
                                            <span> LOCK</span> -->
                                        </label>
                                        <a data-id="{{$v->id}}" class="delete-data btn-xs btn-danger" data-url="{{route('advertise_delete_media')}}" data-redirecturl="{{route('view_advertise_profile',$user->id)}}"  style="color: #fff;" ><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                @elseif($v->video_type == 'link')
                                 <div class="upload_video_div">
                                    <!-- <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}"> -->
                                 @php 
                                      $emb_link = explode('/',$v->name);
                                      $lst_key = count($emb_link) -1;   

                                  @endphp

                                 <iframe width="100%" height="40%" src="https://www.youtube.com/embed/{{$emb_link[$lst_key]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                           <!--  <input class="form-check-input add-to-lock" type="checkbox" name="remember"  data-id="{{$v->id}}"  @if($v->lock) Checked @endif>
                                            <span> LOCK</span> -->
                                        </label>
                                        <a data-id="{{$v->id}}" class="delete-data btn-xs btn-danger" data-url="{{route('advertise_delete_media')}}" data-redirecturl="{{route('view_advertise_profile',$user->id)}}"  style="color: #fff;" ><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                @endif
                              @endforeach
                            @else
                            @endif  
                        </div>    
                    </div>
                    <div>
                        <div class="pink_bar1">Photo Gallery</div>
                        <div class="upload_btn"><button class="btn red_btn save_btn" data-toggle="modal" data-target="#ImageModel" >Upload</button>
                          
                      
                        </div>
                        <div class="upload_photo">
                            
                        @if($images)
                            @foreach($images as $key =>$i)
                            
                            <div class="upload_photo_div">
                                <img class="shadow img-thumbnail" src="{{URL::ASSET('uploaded/user/gallery')}}/{{$i->name}}" style="height: 170px">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        
                                @if($i->lock)  
                                        <input class="form-check-input add-to-lock " data-id="{{$i->id}}" type="checkbox" @if($i->admin_approval) Checked @endif>
                                        <span> Approve</span>
                                   @endif 
                                    </label>
                                    <a  data-id="{{$i->id}}" class="delete-data btn-xs btn-danger" style="color: #fff;" data-url="{{route('advertise_delete_media')}}" data-redirecturl="{{route('view_advertise_profile',$user->id)}}" ><i class="fa fa-trash"></i></a>
                                </div>
                                @if($i->lock)
                                <img class="upload_ribbon" src="{{URL::ASSET('images/lock1.png')}}">
                                @endif 
                            </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                </div>
                <div class="chat_body chat_margin_l">
                <div class="pink_bar">Comments</div>
                <!-- <div class="pink_bar pink_bar_btm">
                    <div>Comments ({{count($comment)}})</div>
                    <span>Complaints (0)</span>
                </div> -->
                <ul class="nav nav-tabs pink_bar pink_bar_btm">
                  <li class="active"><a data-toggle="tab" href="#comment-box">Comments ({{count($comment)}})</a></li>
                  <li><a data-toggle="tab" href="#complaint-box">Complaints ({{count($complaint)}})</a></li>
                </ul>
                <div class="tab-content">   
                <div id="comment-box" class="chat_window tab-pane fade in active">
                   @if($comment)
                    @foreach($comment as $key =>$v) 
                    <p class="comment-para">
                           
                        <img class="contact_img" src="{{URL::ASSET('images')}}/person{{mt_rand(1,3)}}.png">
                       
                        <span class="contact_messagebox">{{$v->name}}
                            <br>
                            <span class="chatting_time">{{date('d-m-Y h:i A',strtotime($v->created_at))}}</span>
                            <br>
                            <span class="chatting_text">{{$v->comment}}</span>
                             <span class="chatting_reply delete-data" style="cursor: pointer;" data-id="{{$v->id}}" data-url="{{route('advertise_delete_comment')}}" data-redirecturl="{{route('view_advertise_profile',$user->id)}}"  >Delete</span>
                           @php  $reply_comment = HomeController::comment_reply($v->id); @endphp
                            <span class="chatting_reply1" data-id="{{$v->id}}" >Replies({{count($reply_comment)}})</span>
                        </span>
                        <br>
                    </p>
                     @if($reply_comment)
                           @foreach($reply_comment as $k =>$val)
                           <p class="chat_window_p3">
                            <img class="contact_img" src="{{URL::ASSET('images/person3.png')}}">
                            <span class="contact_messagebox">{{$val->name}}
                                <br>
                                <span class="chatting_time">1{{date('d-m-Y h:i A',strtotime($val->created_at))}}</span>
                                <br>
                                <span class="chatting_text">{{$val->comment}}</span>
                            </span>
                        </p>
                           @endforeach
                     @endif

                    @endforeach
                  @endif
             <form action="{{route('advertise_add_comment')}}" method="post" onsubmit="return false;" id="comment-form"  >
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}" >
                    <div>
                        <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">
                        <span class="nick_name">Nick Name</span>                            
                        <input type="text"  name="name" placeholder="write your name"  required="" value="{{Auth::guard('admin')->user()->name}}" >
                        <br>
                        <textarea name="comment" id="comment_area" placeholder="write your comment here...." required=""></textarea>
                    </div>
                <button class="chat_body_btn">Submit</button>
            </form>
                </div>
                 <div id="complaint-box" class="chat_window tab-pane fade">
                     @if($complaint)
                    @foreach($complaint as $key =>$v) 
                    <p>
                        <img class="contact_img" src="{{URL::ASSET('images')}}/person{{mt_rand(1,3)}}.png">
                        <span class="contact_messagebox">{{$v->name}}
                            <br>
                            <span class="chatting_time">{{date('d-m-Y h:i A',strtotime($v->created_at))}}</span>
                            <br>
                            <span class="chatting_text">{{$v->comment}}</span>
                            <span class="chatting_reply delete-data"  style="cursor: pointer;" data-id="{{$v->id}}"  data-url="{{route('advertise_delete_complaint')}}" data-redirecturl="{{route('view_advertise_profile',$user->id)}}"   >Delete</span>
                                @php  $reply_comment = HomeController::comment_reply($v->id); @endphp
                            <span class="chatting_reply1" data-id="{{$v->id}}" >Replies({{count($reply_comment)}})</span>
                     
                        </span>
                        <br>
                    </p>
                     @if($reply_comment)
                           @foreach($reply_comment as $k =>$val)
                           <p class="chat_window_p3">
                            <img class="contact_img" src="{{URL::ASSET('images')}}/person{{mt_rand(1,3)}}.png">
                            <span class="contact_messagebox">{{$val->name}}
                                <br>
                                <span class="chatting_time">1{{date('d-m-Y h:i A',strtotime($val->created_at))}}</span>
                                <br>
                                <span class="chatting_text">{{$val->comment}}</span>
                            </span>
                        </p>
                           @endforeach
                     @endif

                    @endforeach
                  @endif
                   
             <form action="{{route('advertise_add_complaint')}}" method="post" onsubmit="return false;" id="complaint-form"  >
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}" >
                    <div>
                        <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">
                        <span class="nick_name">Nick Name</span>                            
                        <input type="text"  name="name" placeholder="write your name"  value="{{Auth::guard('admin')->user()->name}}" required="" readonly="">
                        <br>
                        <textarea name="complaint" id="complaint_area" placeholder="write your Complaint here...." required=""></textarea>
                    </div>
                <button class="chat_body_btn">Submit</button>
            </form>
                 </div>   
              </div>
            </div>
            </div>
        </div>
    </div>

    <div id="VideoModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form action="{{route('advertise_upload_video',$user->id)}}" method="post" onsubmit="return false;" id="video-upload" enctype="multipart/form data" >  
            @csrf
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload video Or Add Youtube Link</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Add Youtube link</label>
                <input type="text" name="youtube_link" class="form-control"  id="youTubeUrl">
            </div>
            <div class="form-group">
                <label>Upload Video</label>
                <input type="file" name="video" class="form-control" >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default" id="video-upload-btn" >Submit</button>
          </div>
      </form>
        </div>

      </div>
    </div>
    <div id="password-recovery" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form action="{{route('user_change_password',$user->id)}}" method="post" onsubmit="return false;" id="change-password-form" enctype="multipart/form data" >  
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Change Password</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Enter New Password</label>
                <input type="text" name="new_password" class="form-control" required="" minlength="6" >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default" id="vng-upload-btn" >Submit</button>
          </div>
      </form>
        </div>

      </div>
    </div>

<div id="ImageModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{route('user_upload_image')}}" method="post" onsubmit="return false;" id="image-gallery-upload" enctype="multipart/form data" >  
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Image</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Image</label>
           <input type="file" name="image[]"  class="form-control" accept="image/*" multiple >
        </div>

    <div id="progress-wrp"><div class="progress-bar"></div ><div class="status">0%</div></div>
    <div id="output"><!-- error or success results --></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close1" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" id="image-upload-btn">Submit</button>
      </div>
    </form>
    </div>

  </div>
</div>
    <div id="add-amount-sect" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <form action="{{route('add_wallet_amount')}}" method="post" onsubmit="return false;" id="wallet-form" enctype="multipart/form data" >  
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Amount in wallet</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Enter Amount</label>
                <input type="number" name="amount" class="form-control" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default" id="vng-upload-btn" >Submit</button>
          </div>
      </form>
        </div>

      </div>
    </div>

                    </div>
                </div>
            </div>

  </section>

<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
    </div>
   </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
</div>                  	
@endsection


@section('script')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyACWUZ9OL8BQVQC-4cSsSFmEo71SLDzvlk&libraries=places&language=en"></script>

<script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHA_SITE_KEY')}}
"></script>
<script src="{{URL::ASSET('js/wickedpicker.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js" ></script>
<script type="text/javascript" src="{{URL::ASSET('js/exif.js')}}" ></script>
<script type="text/javascript">
    var emojis = {};
    emojis['emojis'] =['&#x1F642;', '&#x1F641;', '&#x1f600;', '&#x1f601;', '&#x1f602;', '&#x1f603;', '&#x1f604;', '&#x1f605;', '&#x1f606;', '&#x1f607;', '&#x1f608;', '&#x1f609;', '&#x1f60a;', '&#x1f60b;', '&#x1f60c;', '&#x1f60d;', '&#x1f60e;', '&#x1f60f;', '&#x1f610;', '&#x1f611;', '&#x1f612;', '&#x1f613;', '&#x1f614;', '&#x1f615;', '&#x1f616;', '&#x1f617;', '&#x1f618;', '&#x1f619;', '&#x1f61a;', '&#x1f61b;', '&#x1f61c;', '&#x1f61d;', '&#x1f61e;', '&#x1f61f;', '&#x1f620;', '&#x1f621;', '&#x1f622;', '&#x1f623;', '&#x1f624;', '&#x1f625;', '&#x1f626;', '&#x1f627;', '&#x1f628;', '&#x1f629;', '&#x1f62a;', '&#x1f62b;', '&#x1f62c;', '&#x1f62d;', '&#x1f62e;', '&#x1f62f;', '&#x1f630;', '&#x1f631;', '&#x1f632;', '&#x1f633;', '&#x1f634;', '&#x1f635;', '&#x1f636;', '&#x1f637;', '&#x1f638;', '&#x1f639;', '&#x1f63a;', '&#x1f63b;', '&#x1f63c;', '&#x1f63d;', '&#x1f63e;', '&#x1f63f;', '&#x1f640;', '&#x1f643;', '&#x1f4a9;', '&#x1f644;', '&#x2620;', '&#x1F44C;','&#x1F44D;', '&#x1F44E;', '&#x1F648;', '&#x1F649;', '&#x1F64A;'];
  $(function () {
  $('.chat_body textarea').emoji(emojis);
  $("#summernoteemoji").emojis(emojis);
});

$(function(){
    var HightlightButton = function(context) {
  var ui = $.summernote.ui;
  var button = ui.button({
    contents: '&#x1F642;',
    tooltip: 'Emojis',
    click: function(element) {
      $("#summernote-custom-emoji").toggle();
    }
  });

  return button.render();
}

    $('#summernote').summernote({
             height:300,
             toolbar: [
                  ['style', ['highlight', 'bold', 'italic', 'underline', 'clear']],
                  ['font', ['strikethrough', 'superscript', 'subscript']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['view', ['codeview']]
                ],
             buttons: {
              highlight: HightlightButton
            }
    });
    
$('.timepicker').each(function(index, element) { 
     var elementTime =$(this).val();
     $(element).wickedpicker();
     $(element).val(elementTime); 
});
 
});

    $(function(){
    var options1 = 
             {
             componentRestrictions: {country: "AUS"}
             };
         
             var input1 = document.getElementById('location');
             var autocomplete1 = new google.maps.places.Autocomplete(input1, options1);
             google.maps.event.addListener(autocomplete1, 'place_changed', function() 
             {
             var place1 = autocomplete1.getPlace();
             var lat1 = place1.geometry.location.lat();
             var long1 = place1.geometry.location.lng();
               var addr = place1.address_components;  
            
            for (var i = 0; i < addr.length; i++) {
              var check =$.inArray("administrative_area_level_1", addr[i].types);
              var check_city =$.inArray("locality", addr[i].types);
              if(check == 0){
                 $('#state_name').val(addr[i].short_name);
              }
              if(check_city == 0){
                  // $('#city_name').val(addr[i].short_name);
              }
            }
             $('#lat').val(lat1);
             $('#lang').val(long1);
            });
});  


         $("#basic-profile-form").validate({
             rules:{
               
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                        
                        var data=new FormData($(form)[0]);
                        try {
                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href="{{route('view_advertise_profile',$user->id)}}"; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });

         $("#service-form").validate({
             rules:{
               
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                        
                        var data=new FormData($(form)[0]);
                        try {
                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href="{{route('view_advertise_profile',$user->id)}}"; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });

         $("#about-form").validate({
             rules:{
               
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                        
                        var data=new FormData($(form)[0]);
                        try {
                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href="{{route('view_advertise_profile',$user->id)}}"; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });

         $("#video-upload").validate({
             rules:{
               
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                         var check = $("#youTubeUrl").val();

                        if(check != ''){
                          if(!validateYouTubeUrl()){
                               toastr.error("Invalid youtube url");
                            return false;
                          }
                        }
                        $('#video-upload-btn').attr('disable',true);
                        var data=new FormData($(form)[0]);
                        try {

                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href="{{route('view_advertise_profile',$user->id)}}"; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });


         $("#change-password-form").validate({
             rules:{
               
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                        $('#change-password-btn').attr('disable',true);
                        var data=new FormData($(form)[0]);
                        try {

                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href="{{route('view_advertise_profile',$user->id)}}"; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });



// $('body').on('change','#profile-image-upload',async function(e){
// var image = e.target.files[0];
// var _token = '{{csrf_token()}}';
//    var data=new FormData();

//    data.append('_token',_token);
//    data.append('image',image);
//                         try {
//                            var response= await fetch("{{route('view_advertise_profile',$user->id)}}",{
//                                        method:'post', 
//                                        body: data, 
//                                        dataType:'JSON',
//                                        credentials: 'same-origin',
//                                     });
//                            var json =await response.json();;
//                            if (json.result){
                             
//                               toastr.success(json.message);
//                               setTimeout(function(){ 
//                                  location.href="{{route('view_advertise_profile',$user->id)}}"; 
//                               }, 1500);                   
                           
//                            }else{
//                               toastr.error(json.message);
//                            }  
//                         }catch(err) {
//                            console.log(err);
//                            toastr.error("Problem connecting URL");
//                         }



// });


$(document).ready(function(){


var $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(async function(response){
         
     var _token = '{{csrf_token()}}';

     var data=new FormData();

   data.append('_token','{{csrf_token()}}');
   data.append('image',response);
                        try {
                           var response= await fetch("{{route('view_advertise_profile',$user->id)}}",{
                                       method:'post', 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                           var json =await response.json();;
                           if (json.result){
                             
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href=''; 
                              }, 1500);                   
                           
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
                           }else{
                              toastr.error(json.message);
                           }  
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }



    })
  });
        
$('body').on('change','#profile-image-upload',async function(e){
var image = e.target.files[0];
  var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
});
});



//     $("#image-gallery-upload").validate({
//              rules:{
               
//                 },
//             messages:{
         
               
//                },
//             errorElement:'div',
//                submitHandler:async (form,event)=>{
//                         event.preventDefault();
//                         element = $("#image-upload-btn");
//                         startLoader($(form).find('.btn-loader'), $(form));
//                         $('#image-upload-btn').attr('disable',true);
//                         var data=new FormData($(form)[0]);
//                         try {

//                             var response= await fetch('{{route("advertise_upload_image",$user->id)}}',{
//                                        method:'post', 
//                                        body: data, 
//                                        dataType:'JSON',
//                                        credentials: 'same-origin',
//                                     });
//                            var json =await response.json();
//                            console.log(response);
//                            if (json.result){
//                              element.prop('disabled',false);
//                               toastr.success(json.message);
//                               setTimeout(function(){ 
//                                  location.href=''; 
//                               }, 1500);                   
                           
//                            }else{
//                               toastr.error(json.message);
//                            }  
//                         }catch(err) {
//                            console.log(err);
//                            toastr.error("Problem connecting URL");
//                         }



//     }
// });


         $("#image-gallery-upload").validate({
             rules:{
               
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();

                        var element = $("#image-upload-btn");
                        var progress_bar_id = "#progress-wrp";
                        startLoader($(form).find('.btn-loader'), $(form));
                        $('#image-upload-btn').attr('disable',true);
                        var data=new FormData($(form)[0]);
                        $.ajax({
                            url : '{{route("advertise_upload_image",$user->id)}}',
                            type: "POST",
                            data : data,
                            contentType: false,
                            cache: false,
                            processData:false,
                            xhr: function(){
                              //upload Progress
                              var xhr = $.ajaxSettings.xhr();
                              if (xhr.upload) {
                                xhr.upload.addEventListener('progress', function(event) {
                                  var percent = 0;
                                  var position = event.loaded || event.position;
                                  var total = event.total;
                                  if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                  }
                                  //update progressbar
                                  $(progress_bar_id +" .progress-bar").css("width", + percent +"%");
                                  $(progress_bar_id + " .status").text(percent +"%");
                                }, true);
                              }
                              return xhr;
                            },
                            mimeType:"multipart/form-data"
                          }).done(function(json){ //
                             var json = JSON.parse(json);
                              if (json.result){
                               element.prop('disabled',false);
                                toastr.success(json.message);
                                setTimeout(function(){ 
                                   location.href=''; 
                                }, 1500);                   
                             
                             }else{
                                toastr.error(json.message);
                             }  
                          });


    }
});



$('body').on('ifChanged','.add-to-lock',async function(e){

var id = $(this).data('id');
var lock = '0';
if($(this).is(':checked')){
  lock = '1';
}
var _token = '{{csrf_token()}}';
   var data=new FormData();

   data.append('_token',_token);
   data.append('id',id);
   data.append('lock',lock);
                        try {
                           var response= await fetch('{{route("advertise_image_lock",$user->id)}}',{
                                       method:'post', 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                           var json =await response.json();;
                           if (json.result){
                             
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href="{{route('view_advertise_profile',$user->id)}}"; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }  
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }



});




         $("#comment-form").validate({
             rules:{
                  
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                        
                        var data=new FormData($(form)[0]);
                        try {
                         
                        grecaptcha.execute('{{env("RECAPTCHA_SITE_KEY")}}', {action: 'create_comment'}).then(async function(token) {
                          // await $('#comment-token').val(token);
                          // add token to form
                     
                         var form_data = new FormData();
                           form_data.append('_token',data.get('_token')); 
                           form_data.append('user_id',data.get('user_id')); 
                           form_data.append('name',data.get('name')); 
                           form_data.append('comment',data.get('comment')); 
                           form_data.append('token',token); 
                      


                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: form_data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href=''; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                           });    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });
         $("#complaint-form").validate({
             rules:{
                  
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                        
                        var data=new FormData($(form)[0]);
                        try {
                            grecaptcha.execute('{{env("RECAPTCHA_SITE_KEY")}}', {action: 'create_comment'}).then(async function(token) {
                      // await $('#comment-token').val(token);
                      // add token to form
                 
                     var form_data = new FormData();
                       form_data.append('_token',data.get('_token')); 
                       form_data.append('user_id',data.get('user_id')); 
                       form_data.append('name',data.get('name')); 
                       form_data.append('complaint',data.get('complaint')); 
                       form_data.append('token',token); 
                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: form_data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href=''; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                           });    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });



         $("#wallet-form").validate({
             rules:{
               
                },
            messages:{
         
               
               },
            errorElement:'div',
               submitHandler:async (form,event)=>{
                        event.preventDefault();
                        startLoader($(form).find('.btn-loader'), $(form));
                        var data=new FormData($(form)[0]);
                        try {

                           var response=await fetch(form.action,{
                                       method:form.method, 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
        
                              toastr.success(json.message);
                              setTimeout(function(){ 
                                 location.href="{{route('view_advertise_profile',$user->id)}}"; 
                              }, 1500);                   
                           
                           }else{
                              toastr.error(json.message);
                           }    
                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });


function validateYouTubeUrl()
{
    var url = $('#youTubeUrl').val();
        if (url != undefined || url != '') {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                 return true ;    
            }
            else {
                 return false;    
            
            }
        }
}


</script>
@endsection
<style type="text/css">

.other_contact p {
    font-size: 14px;
}
.upload_photo a {
  
    margin-top: 11px !important;
    /* padding-left: 2px; */
    margin-left: 2px !important;
    
}
.pink_bar1 {
    
    width: 100% !important;
   
}
</style>