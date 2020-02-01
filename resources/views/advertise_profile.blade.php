<?php use App\Http\Controllers\HomeController; ?>
<?php use App\Http\Controllers\BasicController; ?>
@extends('layouts.app')


@section('content')
<style type="text/css">
  .week-work {
   float: left;
   width: 100%;
}

span.dash-time {
   float: left;
   /* width: 20%; */
}

span.day-name {
float: left;
width: 100%;
text-transform: capitalize;
font-size: 14px;
}

audio, canvas, progress, video {
display: inline-block;
vertical-align: baseline;
margin-top: 21px;
}

.chat_window_p3 {
    margin-left: 30% !important;
}
.not-li
{
  padding: 10px 5px;
    background-color: #f84f73;
    margin-bottom: 8px;
    border-radius: 5px;
    color: white;
    font-size: 18px;

}
.message1 {
    float: left;
    width: 100%;
    background-color: pink;
    padding-top: 20px;
    padding-bottom: 19px;
    padding-left: 80px;
    padding-right: 80px;
    color: black;
    font-size: 20px;
    border-bottom: 7px solid #f98d9f;
    display: flex;
}
.close-btn {
    background-color: #f84f73;
    border: navajowhite;
    padding: 0px 25px 0px 25px;
    border-radius: 30px;
    float: left;
    height: 40px;
    line-height: 40px;
    margin-top: 10px;
    align-items: center;
}
    .live_bar {
    width: 100%;
    height: 69px;
    text-align: center;
    margin-top: 22px;
    float: left;
    background-color: white;
    color: #249042;
    font-size: 20px;
    font-weight: bold;
    padding-top: 10px;
}
.live_bar div {
    float: right;
    font-weight: bold;
    font-size: 17px;
    width: 137px;
    color: #fff;
    margin-right: 25px;
    margin-top: -94px;
}
.hours_ribbon {
    position: absolute;
    left: 14px;
    top: 133px;
    width: 180px;
}
.hours {
    float: left;
    position: relative;
    text-align: center;
    width: 210px;
     margin-left: 0px; */
}
.message1 small{
  font-size: 70%;
}
audio, canvas, progress, video {
    display: inline-block;
    vertical-align: baseline;
    margin-top: 0px;
}

.img-gallery-box {
float: left;
width: auto !important;
}
.gallery_img_grp img {
width: auto !important;

}
.video-gallery-section .upload_photo_div {
    width: 28% !important;
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
div#bump-up-profile {
    float: right;
    font-weight: bold;
    font-size: 17px;
    width: 137px;
    color: #f84f73;
    margin-right: 25px;
    margin-top: 15px;
    
}
div#bump-up-profile img {
    float: left;
    width: 45px;
    margin-right: 6px;
}
.live_barP {
    margin-bottom: 0;
    float: left;
    margin-top: 5px;
    color: #fff;
    
}
.live_barP1 {
    float: left;
    margin-top: -5px;
    color: #fff;
   
}
</style>
<div class="container pink11">
  




  @if(count($admin_notice))
    @foreach($admin_notice as $key =>$v)            
     <div class="message1">
    <p style="float: left;width: 100%;">
      <b>Admin Notice<small> {{date('m/d/Y',strtotime($v->created_at))}}</small></b>
    <br>
  {{$v->message}}</p>
    <button class="close-btn change_notice_status"  data-id="{{$v->id}}"  >Okay</button>
  </div>
  @endforeach
@endif
</div>
  <div class="main profile_m">
        
            @php $user = Auth::user();
                 $date = date('Y-m-d H:i:s');  @endphp
        <div>
            <div class="boy_test">
                <h4>Boys Testimonial</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a   data-toggle="modal" data-target="#boys-testimonial"  >Add New</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a  data-toggle="modal" data-target="#testimonial-search"   >Search Now </a></p>
            </div>
            @if($user->live_status == 'OFF')

               @if($live->live_amount)
                <button class="pause_btn pause_btn_go " data-toggle='modal' data-target='#Go-live-modal'   >GO LIVE</button>
              @else
               <button id="paypal-live-btn" type="button" class="pause_btn pause_btn_go" data-id="{{$user->id}}" data-expiry="{{$live->live_expiry}}" >Go LIVE</button>

              @endif

            @elseif($user->live_status == 'Pause')
            @php $date = date('Y-m-d H:i:s'); @endphp
             
            @if($user->live_expiry >= $date)
              <button class="pause_btn pause_btn_go live-btn-funct"  data-status='{{$user->live_status}}'   style="background: #249042">Resume</button>
              @else
                @if($live->live_amount)
                  <button class="pause_btn pause_btn_go " data-toggle='modal' data-target='#Go-live-modal'   >GO LIVE</button>
                @else
                 <button id="paypal-live-btn" type="button" class="pause_btn pause_btn_go" data-id="{{$user->id}}" data-expiry="{{$live->live_expiry}}" >Go LIVE</button>
                @endif
             @endif
  
            @else 
            <button class="pause_btn pause_btn_go live-btn-funct"  data-id="{{$user->id}}" data-expiry="{{$live->live_expiry}}" data-status='{{$user->live_status}}'   style="background: #249042">Pause</button>
        
            @endif  
        
            <div class="credit">
                <h4>Account Credit</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="{{route('payment')}}">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>${{$user->wallet}}</span></p>
            </div>
        </div>
        <div class="navbar_btm midnav shadow">
            <ul>
                <a class="ancer" href="{{url('advertise_profile')}}" ><li class="midnav_active">PREVIEW</li></a>
                <a class="ancer" href="{{url('advertise_edit_profile')}}" ><li>EDIT</li></a>
                <a  class="ancer" href="{{url('payment')}}"><li>PAYMENT</li></a>
            </ul>
             <div id="bump-up-profile" style="cursor: pointer;">
                    <img src="{{URL::ASSET('images/up_arrow.png')}}" style="float: left;">
                    <p class="live_barP">${{$live->bump_up_amount}}</p>
                    <p class="live_barP1">BUMP UP</p>
                </div>
        </div>
        <div id="previewLogin">
               @if($user->live_status == 'ON') 
            <div class="shadow live_bar">
                YOUR PROFILE IS LIVE<br>
                <small style="color: #000000ed;
    font-weight: lighter;
    font-size: 15px;
   
    display: table;
    margin: auto;">Expire on - {{$user->live_expiry}}</small>
               @elseif($user->live_status == 'Pause')
            <div class="shadow live_bar live_bar1">
                YOUR PROFILE IS <a href="#">Pause</a> NOW
               @else
            <div class="shadow live_bar live_bar1">
                YOUR PROFILE IS <a href="#">NOT</a> LIVE
               @endif 
               
            </div>
            <p class="profile_expire">
            @if($user->account_verification)
             @if($user->live_status == 'ON') 
              {{$live->live_message}}
              @else
              {{$live->pause_message}}
             @endif

            @else
              Your profile is not verified please complete your profile
            @endif
            </p>
            <div class="pre_profile shadow pre_profile_userlogin">
                <div class="float">
                    <div class="hours wow fadeInLeft" data-wow-delay="0.2s">
                        <img class="hours_img" src="{{URL::ASSET('uploaded/user')}}/{{$user->image}}"> 
                        @if($user->account_verification) 
                      
                      
                        @if($date < $user->feature_profile ) 
                         <img id="hours_edit_img1" src="{{URL::ASSET('images/double_ribbon2.png')}}">
                         @else
                           <img class="hours_ribbon" src="{{URL::ASSET('images/verified.png')}}">
                           
                          @endif
                        @endif
                        <!-- <div class="hours_small">
                            <img src="{{URL::ASSET('images/pre_profile_s.png')}}">
                            <img src="{{URL::ASSET('images/pre_profile_s.png')}}">
                            <img src="{{URL::ASSET('images/pre_profile_s.png')}}">
                        </div> -->
                        <h3>Work Hours</h3>
                        @php   $start_work = array();
                                $end_work = array();
                                if($user->start_work){
                                   $start_work =json_decode($user->start_work); 
                                   $end_work =json_decode($user->end_work); 
                                  } 
                           @endphp
                        
                        @foreach($start_work as  $key=>$v)
                        <div class="week-work" >
                          <p>
                            <span class="day-name" >@php echo BasicController::day_name($key); @endphp {{$v}} - {{$end_work->$key}}</span></p></div>
                        @endforeach
                       <!--  <div><p>Wed 10:00</p>   <span>AM–8:00 PM</span></div>
                        <div><p>Thu&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div>
                        <div><p>Fri&nbsp;&nbsp;&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div>
                        <div><p>Sat&nbsp;&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div>
                        <div><p>Sun&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div> -->
						
                    </div>
                    <div class="preview_top_right wow fadeInRight" data-wow-delay="0.2s">

                        <div class="comment_boxdiv">
                            <img class="pre_browser_divimg" src="{{URL::ASSET('images/comment.png')}}">
                            <a href="{{url('chat')}}" ><p class="chat_comment">Chat Here</p></a>
                        </div>
                        <h2>{{$user->fname}} {{$user->lname}}<p>Online</p></h2><br />
                        <div class="info">
                            <span class="p_infomamtion">
                                <img src="{{URL::ASSET('images/location.png')}}">
                                <!-- <h5>{{$user->city}}</h5> -->
                                <br><h4>{{$user->address}}</h4>
                            </span><br />
                            <div><p>Name</p>   <span>{{$user->fname}} {{$user->lname}}</span></div>
                            <div><p>Age</p>   <span>{{$user->age}}</span></div>
                            <div><p>Height</p>   <span>{{$user->height}}</span></div>
                            <div><p>Damage</p>   <span>@if($user->damage)$ {{$user->damage}} @endif</span></div>
                            <div><p>Suburb</p>   <span>{{$user->address}}</span></div>
                            <!-- <div><p>City</p>   <span>{{$user->city}}</span></div> -->
                            <div><p>State</p>   <span>{{$user->state}}</span></div>
                             @if($customfield)
                               @foreach($customfield as $key =>$val)
                                @if($val->input_type != 'contact')
                              <div><p>{{$val->label}}</p>   <span>{{$val->value}}</span></div> 
                           
                                @endif
                               @endforeach 

                            @endif
                           <!--  <div><p>Damage</p>   <span>180/1</span></div>
                            <div><p>Age</p>   <span>{{$user->age}}</span></div>
                            <div><p>VBSive</p>   <span>34D</span></div>
                            <div><p>Room & CD</p>   <span>Included</span></div>
                            <div><p>Service Location</p>   <span>Hotel Apparement</span></div> -->
                        </div>
                       <!--  <div class="info info_top_margin">
                            <span class="p_infomamtion">
                                <img class="info_img_size" src="{{URL::ASSET('images/phone.png')}}">
                                <h4 class="info_h4_margin">Contact Info</h4>
                            </span><br />
                            <div><p>Preffered Contact Method</p>   <span>Call&Text</span></div>
                            <div><p>Mobile number</p>   <span>0411-163-588</span></div>
                            <a href="#">Click Here To Reveal...</a>
                        </div> -->
                     <div class="other_contacts">
                        <p> <img src="{{URL::ASSET('images/phone.png')}}" class="img-responsive" style="float: left;margin-right: 8px;"> Contact Info</p><br>
                        <div class="row" >
                               <div class="col-md-6"><p style="font-weight: 100;">Preferred Contact Method</p> 
                              <p  style="font-weight: 100;">Mobile number</p> 
                                </div>
                                <div class="col-md-6">
                              <p>{{$user->contact_method}}</p>
                         <p>{{$user->mobile_no}} <small style="color: blue;">({{$user->mobile_counter}})</small></p>
                       <!--      <a href="#"  style="font-weight: 100; font-size:16px;
                            text-decoration:underline;">Click Here To Reveal...</a> -->
                                </div>
                              
                        </div>
                          <p> Other Contact</p><br>
                              @if($customfield)
                               <div class="row" >
                               @foreach($customfield as $key =>$val)
                                @if($val->input_type == 'contact')
                            
                                <div class="col-md-6" >
                                      <img src="{{URL::ASSET('uploaded/icon')}}/{{$val->icon}}" class="img-responsive" height="40" width="40">
                                       <p class="reveal">{{$val->value}} <small style="color: blue;">({{$val->counter}})</small></p>
                                </div>
                                
                            
                                @endif
                               @endforeach 
</div>
                            @endif

<!--                         <span><img src="{{URL::ASSET('images/message.png')}}"> 0411-163-588</span>
                        <span class="other_contacts_span"><img src="{{URL::ASSET('images/call.png')}}"> 0411-163-588</span> -->
                    </div>
                    </div>
                </div>
                <div class="pre_mid_profile">
                    <div class="pink_bar">Profile Details</div>
                    <div class="profile_detail_contain">
                        <h3>My Services</h3>
                        @php $ser_arr = array(); @endphp

                        @if($user->services)
                         @php $ser_arr = explode(',',$user->services);
                         @endphp 
                        @endif 
                       
                        @foreach($services as $key =>$v) 
                         @if(in_array($v->id,$ser_arr))
                          <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;{{$v->service_name}}&nbsp;&nbsp;</span>
                        @endif
                        @endforeach
                        <!-- <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span>
                        <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span>
                        <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span>
                        <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span> -->
                        <h4>About Me</h4>
                        <p>@php echo html_entity_decode($user->about_me); @endphp </p>
                    </div>
                </div>
                <div class="info_top_margin">
                    <div class="pink_bar">Image Gallery</div>
                    <div class="gallery_img_grp">
                      
                       @if($images)
                          @foreach($images as $key =>$v)  
                          <div class="img-gallery-box" >
                          <img class="wow flipInY view-image-modal img-thumbnail" data-wow-delay="0.4s" src="{{URL::ASSET('uploaded/user/gallery')}}/{{$v->name}}">
                          <p class="quantity"> <i class="fa fa-eye btn-xs" ></i>(@if($v->counter) {{$v->counter}} @else 0 @endif) 
                          </div>
                         @endforeach
                       @endif
                    </div>
                </div>
                <div class="info_top_margin">
                    
                    <div>
                        <div class="pink_bar">Video Gallery</div>
                        
                        <div class="upload_photo video-gallery-section">

                            @if($video)
                              @foreach($video as $key=>$v)    
                               
                                @if($v->video_type == 'file')    
                                <div class="upload_video_div">
                                    <!-- <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}"> -->

                                    <video width="100%" height="40%" controls>
                                      <source src="{{URL::ASSET('uploaded/user')}}/{{$v->name}}" type="video/{{$v->extension}}">
                                    </video>
                                </div>
                                @elseif($v->video_type == 'link')
                                 <div class="upload_video_div">
                                    <!-- <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}"> -->
                                 @php 
                                      $emb_link = explode('/',$v->name);
                                      $lst_key = count($emb_link) -1;   

                                  @endphp

                                 <iframe width="100%" height="40%" src="https://www.youtube.com/embed/{{$emb_link[$lst_key]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                @endif
                              @endforeach
                            @else
                            @endif  
                        </div>    
                    </div>
                </div>
<!--                 <div class="chat_body">
                    <div class="pink_bar">Comments</div>
                    <div class="pink_bar pink_bar_btm">
                        <div>Comments ({{count($comment)}})</div>
                        <span>Complaints (0)</span>
                    </div>
                    <div class="chat_window">
                       
                   @if($comment)
                    @foreach($comment as $key =>$v) 
                    <p>
                        <img class="contact_img" src="{{URL::ASSET('images/person1.png')}}">
                        <span class="contact_messagebox">{{$v->name}}
                            <br>
                            <span class="chatting_time">{{date('d-m-Y h:i A',strtotime($v->created_at))}}</span>
                            <br>
                            <span class="chatting_text">{{$v->comment}}</span>
                            <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                            <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                            <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                            <span class="chatting_reply">Replies(0)</span>
                        </span>
                        <br>
                    </p>
                    @endforeach
                  @endif

                        <p>
                            <img class="contact_img" src="{{URL::ASSET('images/person1.png')}}">
                            <span class="contact_messagebox">Anonomus User1
                                <br>
                                <span class="chatting_time">10-05-19 05:30PM</span>
                                <br>
                                <span class="chatting_text">This is My Comment for this profile This is for long Comments.</span>
                                <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                                <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                                <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                                <span class="chatting_reply">Replies(0)</span>
                            </span>
                            <br>
                        </p>

                        <p>
                            <img class="contact_img" src="{{URL::ASSET('images/person2.png')}}">
                            <span class="contact_messagebox">Anonomus User1
                                <br>
                                <span class="chatting_time">10-05-19 05:30PM</span>
                                <br>
                                <span class="chatting_text">This is My Comment for this Profile.</span>
                                <img class="chat_smile" src="{{URL::ASSET('images/tongue.png')}}">
                                <span class="chatting_reply">Replies(1)</span>
                            </span>
                            <br>
                        </p>

                        <p class="chat_window_p3">
                            <img class="contact_img" src="{{URL::ASSET('images/person3.png')}}">
                            <span class="contact_messagebox">Anonomus User1
                                <br>
                                <span class="chatting_time">10-05-19 05:30PM</span>
                                <br>
                                <span class="chatting_text">This is My Comment for this Profile.</span>
                            </span>
                        </p>
                        <form action="{{route('add_comment')}}" method="post" onsubmit="return false;" id="comment-form"  >
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}" >
                                            <div>
                                                <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">
                                                <span class="nick_name">Nick Name</span>                            
                                                <input type="text"  name="name" placeholder="write your name"  required="" >
                                                <br>
                                                <textarea name="comment" id="comment_area" placeholder="write your comment here...." required=""></textarea>
                                            </div>
                                        </div>
                                        <button class="chat_body_btn">Submit</button>
                                    </form>
                </div> -->
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
                  <div class="comment1">
                  @if($comment)
                    @foreach($comment as $key =>$v) 
                    <p class="comment-para">
                           
                        <img class="contact_img" src="{{URL::ASSET('images')}}/person{{mt_rand(1,3)}}.png">
                       
                        <span class="contact_messagebox"><span class="name" >{{$v->name}}</span>
                            <br>
                            <span class="chatting_time">{{date('d-m-Y h:i A',strtotime($v->created_at))}}</span>
                            <br>
                            <span class="chatting_text">{{$v->comment}}</span>
                           @php  $reply_comment = HomeController::comment_reply($v->id); @endphp
                            <span class="chatting_reply" data-id="{{$v->id}}" >Replies({{count($reply_comment)}})</span>
                        </span>
                        <br>
                    </p>
                     @if($reply_comment)
                           @foreach($reply_comment as $k =>$val)
                           <p class="chat_window_p3">
                            <img class="contact_img" src="{{URL::ASSET('images/person3.png')}}">
                            <span class="contact_messagebox">{{$val->name}}
                                <br>
                                <span class="chatting_time">{{date('d-m-Y h:i A',strtotime($val->created_at))}}</span>
                                <br>
                                <span class="chatting_text">{{$val->comment}}</span>
                            </span>
                        </p>
                           @endforeach
                     @endif

                    @endforeach
                  @endif
                 </div>

 <span id="contact_messagebox_reply" class="contact_messagebox" style="margin-left: 127px; display: none;
    margin-top: 15px; background: #8c7e7e82; min-width: 80%;"><span class="name"></span><i class="fa fa-times close-reply-box" aria-hidden="true" style="float: right;
    font-weight: lighter;
    color: #a59ea5b0;"></i>
                                <br>
                                <br>
                                <span class="chatting_text"></span>
                            </span>
             <form action="{{route('add_comment')}}" method="post" onsubmit="return false;" id="comment-form"  >
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}" >
                <input type="hidden" name="reply_comment" id="input-reply-id" >
                    <div>
                        <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">
                        <span class="nick_name">Nick Name</span>                            
                        <input type="text"  name="name" placeholder="write your name" value="{{$user->fname}} {{$user->lname}}"  required="" >
                        <br>
                        <textarea name="comment" id="comment_area" placeholder="write your comment here...." required=""></textarea>
                    </div>
                <button class="chat_body_btn">Submit</button>
            </form>
                </div>
                 <div id="complaint-box" class="chat_window tab-pane fade">
                     @if($complaint)
                    @foreach($complaint as $key =>$val) 
                    <p>
                        <img class="contact_img" src="{{URL::ASSET('images/person1.png')}}">
                        <span class="contact_messagebox">{{$val->name}}
                            <br>
                            <span class="chatting_time">{{date('d-m-Y h:i A',strtotime($val->created_at))}}</span>
                            <br>
                            <span class="chatting_text">{{$val->complaint}}</span>
                           <!--  <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                            <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}">
                            <img class="chat_smile" src="{{URL::ASSET('images/love.png')}}"> -->
                            <!-- <span class="chatting_reply">Replies(0)</span> -->
                        </span>
                        <br>
                    </p>
                    @endforeach
                  @endif
                   
             <form action="{{route('add_complaint')}}" method="post" onsubmit="return false;" id="complaint-form"  >
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}" >
                    <div>
                        <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">
                        <span class="nick_name">Nick Name</span>                            
                        <input type="text"  name="name" placeholder="write your name"  value="{{$user->fname}} {{$user->lname}}" required="" >
                        <br>
                        <textarea name="complaint" id="complaint_area" placeholder="write your comment here...." required=""></textarea>
                    </div>
                <button class="chat_body_btn">Submit</button>
            </form>
                 </div>   
              </div>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Go-live-modal" role="dialog">
          <div class="modal-dialog gallery_modal">
          
            <!-- Modal content-->
            <div class="modal-content gallery_modal_content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
              </div>
              <div class="modal-body navbar_btm gallery_modal_body">
                <img src="{{URL::ASSET('images/lock.png')}}">
                <h3>Go Live</h3>
                <p>For visible on the home page.</p>
                <h4>You have to pay <br />${{$live->live_amount}}<br /> amount for {{$live->live_expiry}} Days and  Pay Direct Via Wallet</h4>
              </div>
              <div class="modal-footer gallery_modal_footer">
               
                    <button id="paypal-live-btn" type="button" class="btn btn-default" data-id="{{$user->id}}" data-expiry="{{$live->live_expiry}}" style="width: 35%;" >Click here to Go Live</button>

                <!-- <label class="gallery_modal_footer_label3">Regular Customer? <a href="#">Register As Browser</a></label>                -->
              </div>
            </div>
            
          </div>
        </div>
    <div class="modal fade" id="boys-testimonial" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                <h5>Add Boys Testimonial</h5>
              </div>
              <div class="modal-body">

             <form action="{{route('add_testimonial')}}" method="post" onsubmit="return false;" id="testimonial-form"  >
                @csrf
                <div class="form-group">
                    <label>Mobile No</label>
                    <input type="number" name="mobile_no" class="form-control" required="" >

                </div>
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" name="remark" rows="5" required="" ></textarea>
                </div>
                <button type="submit" class="chat_body_btn btn-loader">Submit</button>
            </form>
              
              </div>
              <div class="modal-footer">
              
              </div>
            </div>
            
          </div>
        </div>
    <div class="modal fade" id="testimonial-search" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
                <h5>Search Boys Testimonial</h5>
              </div>
              <div class="modal-body">
                 <div class="form-group" >
                      <input type="number" class="form-control" id="testimonial-search-input" placeholder="Enter a number" >
                 </div>
                 <ul style="padding-left: 0px; height: 200px;
    overflow-y: scroll;"   id="testimonial-result-box"  >
                 </ul>
                 <div class="testimonial-search-result"></div>
              </div>
              <div class="modal-footer">
              
              </div>
            </div>
            
          </div>
        </div>


        <div class="modal fade" id="viewPhotoPop" role="dialog">
          <div class="modal-dialog gallery_modal">
          
            <!-- Modal content-->
            <div class="modal-content gallery_modal_content_unlocked">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body navbar_btm gallery_modal_body_unlocked">
                <span class=""  >
                    <img src="" style="width: 100%;height: 100%;margin-left: 0px;"  id="final-image-show" >    
                </span>
            </div>
            
          </div>
        </div>

       </div>



@endsection
@section('script')

<script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHA_SITE_KEY')}}
"></script>
<script type="text/javascript">
    $(function () {
  $('#comment_area, #complaint_area').emoji({
    emojis: ['&#x1F642;', '&#x1F641;', '&#x1f600;', '&#x1f601;', '&#x1f602;', '&#x1f603;', '&#x1f604;', '&#x1f605;', '&#x1f606;', '&#x1f607;', '&#x1f608;', '&#x1f609;', '&#x1f60a;', '&#x1f60b;', '&#x1f60c;', '&#x1f60d;', '&#x1f60e;', '&#x1f60f;', '&#x1f610;', '&#x1f611;', '&#x1f612;', '&#x1f613;', '&#x1f614;', '&#x1f615;', '&#x1f616;', '&#x1f617;', '&#x1f618;', '&#x1f619;', '&#x1f61a;', '&#x1f61b;', '&#x1f61c;', '&#x1f61d;', '&#x1f61e;', '&#x1f61f;', '&#x1f620;', '&#x1f621;', '&#x1f622;', '&#x1f623;', '&#x1f624;', '&#x1f625;', '&#x1f626;', '&#x1f627;', '&#x1f628;', '&#x1f629;', '&#x1f62a;', '&#x1f62b;', '&#x1f62c;', '&#x1f62d;', '&#x1f62e;', '&#x1f62f;', '&#x1f630;', '&#x1f631;', '&#x1f632;', '&#x1f633;', '&#x1f634;', '&#x1f635;', '&#x1f636;', '&#x1f637;', '&#x1f638;', '&#x1f639;', '&#x1f63a;', '&#x1f63b;', '&#x1f63c;', '&#x1f63d;', '&#x1f63e;', '&#x1f63f;', '&#x1f640;', '&#x1f643;', '&#x1f4a9;', '&#x1f644;', '&#x2620;', '&#x1F44C;','&#x1F44D;', '&#x1F44E;', '&#x1F648;', '&#x1F649;', '&#x1F64A;']
  });
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
                           form_data.append('reply_comment',data.get('reply_comment')); 
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


         $("#testimonial-form").validate({
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
                                 location.href=''; 
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


           $('body').on('click','#paypal-live-btn',async function(){
                   
                   var acc_status = "{{$user->account_verification}}";

                   // if(acc_status == '0'){
                   //   swal("Your account is not verified yet")
                   // return false;
                   // }  
                
                  var _token = '{{csrf_token()}}';
                  var id = $(this).data("id"); 
                  
                  var expiry = $(this).data("expiry");
                    var data=new FormData();
                     data.append('_token',_token);
                     data.append('id',id);
                     data.append('expiry',expiry);
                 
                   var response=await fetch("{{route('go_live')}}",{
                                       method:"post", 
                                       body: data, 
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

           $('body').on('click','.live-btn-funct',async function(){
                var status = $(this).data('status');

                 var txt_status = 'Pause';
                 
                 if(status == 'Pause' ){
                   txt_status = 'Resume';
                 }

                // if(status != 'ON' ){
                //   return false;
                // }
                  var _token = '{{csrf_token()}}';
                  var id = '{{$user->id}}'; 
                  var status = $(this).data('status');
                    var data=new FormData();
                     data.append('_token',_token);
                     data.append('id',id);
                     data.append('status',status);
           var swal_rslt = await  swal({
                 title: "Are you sure?",
                  text: `Do you want to ${txt_status} your profile?`,
                  icon: 'warning',
                  buttons: true,
              }).then((result) => {
                   
                   return result;

              });   

              if(!swal_rslt){
                return false;
              }
                   var response=await fetch("{{route('go_live')}}",{
                                       method:"post", 
                                       body: data, 
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


   var scrolled=$(window).height();

    $("body").on('click','.chatting_reply',function(){
        

      var val = $(this).data("id");
        
      $("#input-reply-id").val(val);
  
      $('.comment-para').css("background",'rgb(255, 254, 254)');

      $(this).parent().parent('.comment-para').css('background','#f5476c');
     
     var name = $(this).parent().find('.name').text();
      // var msg = $(this).parent().find('.chatting_text').text();
     var msg = 'Your Replying to "'+name+'" Comment';
     $('#contact_messagebox_reply').find('.name').text(msg);   
     // $('#contact_messagebox_reply').find('.chatting_text').text(msg);   
     $('#contact_messagebox_reply').show();
      // console.log($(this).parent().parent('.comment-para').html());  
        
        $("body").animate({
                scrollTop:  scrolled
           });

    });

    $("body").on('click','.close-reply-box',function(){
     $('#contact_messagebox_reply').hide();
     $('.comment-para').css("background",'rgb(255, 254, 254)');
      $("#input-reply-id").val("");

    });


   
   $('body').on('click','#bump-up-profile',async function(){
         
         var swal_rslt = await  swal({
                 title: "Are you sure?",
                  text: "Do you want to Bump Up your profile?",
                  icon: 'success',
                  buttons: true,
              }).then((result) => {
                   
                   return result;

              });   

              if(!swal_rslt){
                return false;
              }
           var data = new FormData();
           data.append('_token','{{csrf_token()}}');
            var response=await fetch("{{route('bump_up_profile')}}",{
                                       method:"post", 
                                       body: data, 
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


   $("body").on('click','.change_notice_status',async function(){
     var id  = $(this).data('id');

       if(id == ''){
        return false;
       }
     
      var data = new FormData();
           data.append('_token','{{csrf_token()}}');
           data.append('id',id);
            var response=await fetch("{{route('change_notice_status')}}",{
                                       method:"post", 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           if (json.result){
                              window.location.href="";                     
                           }  
     



   });





$("body").on('keyup','#testimonial-search-input',async function(){
  var mobile_no = $(this).val();

console.log(mobile_no.length);
  if(mobile_no.length > 4){
    

      var data = new FormData();
           data.append('_token','{{csrf_token()}}');
           data.append('mobile_no',mobile_no);
            var response=await fetch("{{route('search_testimonial')}}",{
                                       method:"post", 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json();
                           
                              $("#testimonial-result-box").empty();
                              if(json.length == 0 ){
                               var html  = `<li class="not-li">Comment Not found</li>`;  
                                $("#testimonial-result-box").append(html);

                              }
                              $.each(json,function(index,element){
                               var html  = `<li class="not-li">${element.fname} ${element.lname} <br>${element.remark} <br>${element.created_at}</li>`;  
                             
                                console.log(element);
                              $("#testimonial-result-box").append(html);
                              });

                         
  }

});



$("body").on('click','.view-image-modal',function(){
  
   var img = $(this).attr('src');
   $('#final-image-show').attr('src',img);
   $("#viewPhotoPop").modal('show');

});



</script>
@endsection


<style type="text/css">
  
  .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    display: unset!important;
    float: left!important;
    margin-right: 5px;
  }
  p.quantity {
    float: left;
    width: auto;
}
.img-gallery-box {
    float: left;
    width: 155px;
    margin-right: 0px;
}
.gallery_img_grp
{
  width: 100%;
}
p.quantity {
    float: left;
    width: 100%;
    text-align: center;
    font-size: 22px;
}
img.wow.flipInY {
    height: 120px;
}
.gallery_img_grp img {
width: 100% !important;
margin-right: 12px;
box-shadow: 4px 4px 12px #bbb;
margin-bottom: 10px;
height: 170px !important;
}
</style>