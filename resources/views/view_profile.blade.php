<?php use App\Http\Controllers\HomeController; ?>

<?php use App\Http\Controllers\BasicController; ?>

@extends('layouts.app')

@section('content')

<style type="text/css">
    .pink_bar_btm li.active {
            border-bottom: 4px solid #f84f73;
            float: left;
    }
    span.day-name {
    float: left;
    width: 100%;
    text-transform: capitalize;
    font-size: 14px;
    }
    a.reveal-no-btn {
font-size: 15px;
}
.reveal {
float: right;
margin-right: 14px!important;

}

.chat_window_p3 {
    margin-left: 30% !important;
}
audio, canvas, progress, video {
display: inline-block;
vertical-align: baseline;
margin-top: 21px;
}
.reveal-no a:hover {
    color: #23527c !important;
    }
.img-gallery-box {
    float: left;
    width: 30%;
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

.img-gallery-box {
    float: left;
    width: 155px;
}
.video-gallery-section .upload_photo_div {
    width: 155px !important;
    float: left;
    width: 100%;
    margin-right: 5px!important;
}
audio, canvas, progress, video {
    display: inline-block;
    vertical-align: baseline;
    margin-top: 0px;
}
.upload_photo {
    float: left;
    margin-top: 30px;
    margin-left: 0px;
    position: relative;
    width: 100%;
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
.hours_ribbon {
position: absolute;
left: 12px;
top: 121px;
width: 180px;

}

.img-gallery-box {
float: left;
width: auto !important;
}
.gallery_img_grp img {
width: auto !important;

}
.gallery_modal_body_unlocked {
   height: auto;
}
.gallery_modal_body_unlocked img {
   margin-top: -10px;
   margin-left: 36px;
   height: auto!important;
}
.gallery_modal_content_unlocked {
width: 850px;
}    
.modal-dialog {
    width: 600px;
    margin: 0px auto;
    display: table;
}
div#comment-box p {
    float: left;
    width: 92%;
}
/*@media screen and (min-width: 1440px)
{
.navbar_btm {
padding-left: 9px !important;
}}*/
</style>
    
    <div class="main">
        <div class="inner">
        <div class="profile_view_left">
            <div class="left_lock shadow wow flipInY" data-wow-delay="0.2s">
                <img src="{{URL::ASSET('images/lock.png')}}"><br />
                <div>Some Girls Choose to Lock Their Some of their Picture for privacy purposes and will only reveal their photos to a Genuine Customers</div>
            </div>
            @php $date = date('Y-m-d H:i:s'); @endphp
            <p class="profile_left_recent">Recent Profiles</p>
            @if($recent_profile)
              @foreach($recent_profile as $key =>$r)
            <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
                <h3>{{$r->fname}} {{$r->lname}}</h3>
                <h4><img src="{{URL::ASSET('images/pinkpin.png')}}">{{$r->address}}</h4>
                <p><img src="{{URL::ASSET('images/yellowcircle.png')}}">Message Me</p>
                <a href="{{route('view_profile',$r->id)}}" ><img class="profile_box_img" src="{{URL::ASSET('uploaded/user')}}/{{$r->image}}"></a>
                <span class="profile_box_span">Age</span>
                <span class="profile_box_span1">{{$r->age}}</span>
            </div>
              @endforeach
            @endif  
            <!-- 
            <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
                <h3>Kayla Smith</h3>
                <h4><img src="{{URL::ASSET('images/pinkpin.png')}}">Holden Hill</h4>
                <p><img src="{{URL::ASSET('images/yellowcircle.png')}}">Message Me</p>
                <img class="profile_box_img" src="{{URL::ASSET('images/kayla.png')}}">
                <span class="profile_box_span">Age</span>
                <span class="profile_box_span1">20-25</span>
            </div>
            <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
                <h3>Kayla Smith</h3>
                <h4><img src="{{URL::ASSET('images/pinkpin.png')}}">Holden Hill</h4>
                <p><img src="{{URL::ASSET('images/yellowcircle.png')}}">Message Me</p>
                <img class="profile_box_img" src="{{URL::ASSET('images/kayla.png')}}">
                <span class="profile_box_span">Age</span>
                <span class="profile_box_span1">20-25</span>
            </div> -->
        </div>
        <div class="pre_profile">
            <div class="float">
                <div class="hours wow fadeInLeft" data-wow-delay="0.2s">
                    <img class="hours_img" src="{{URL::ASSET('uploaded/user')}}/{{$user->image}}">
                    @if($user->account_verification) 
                      
                      @if($date < $user->feature_profile)
                         
                       <img class="hours_ribbon" src="{{URL::ASSET('images/double_ribbon2.png')}}">
                      @else
                       <img class="hours_ribbon" src="{{URL::ASSET('images/verified11.png')}}">
                       
                      @endif
                    @elseif($date < $user->feature_profile)
                          <img class="hours_ribbon" src="{{URL::ASSET('images/featured.png')}}">
                    @endif
                    <div class="hours_small">
                      <!--   <img class="hours_small1" src="{{URL::ASSET('images/pre_profile_s.png')}}">
                        <img class="hours_small1" src="{{URL::ASSET('images/pre_profile_s.png')}}">
                        <img class="hours_small1" src="{{URL::ASSET('images/pre_profile_s.png')}}"> -->
                    </div>
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
                              <span class="day-name" >@php echo BasicController::day_name($key); @endphp {{$v}} - {{$end_work->$key}}</span>
                            </p>
                          </div>
                        @endforeach
                        <div>
                            {!!$user->about_me !!}
                        </div>  
                  <!--   <div><p>Mon 10:00</p>   <span>AM–8:00 PM</span></div>
                    <div><p>Wed 10:00</p>   <span>AM–8:00 PM</span></div>
                    <div><p>Thu&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div>
                    <div><p>Fri&nbsp;&nbsp;&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div>
                    <div><p>Sat&nbsp;&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div>
                    <div><p>Sun&nbsp; 10:00</p>   <span>AM–8:00 PM</span></div> -->
                </div>
                <div class="preview_top_right wow fadeInRight" data-wow-delay="0.2s">
                    <div class="comment_boxdiv">
                        <a href="{{route('chat')}}?id={{$user->id}}" ><img class="pre_browser_divimg" src="{{URL::ASSET('images/comment.png')}}">
                        <p class="chat_comment">Chat Here</p></a>
                    </div>
                    <h2>{{$user->fname}} {{$user->lname}}<p>Online</p></h2><br />
                    <div class="info">
                        <span class="p_infomamtion" style="text-align: left;">
                            <img src="{{URL::ASSET('images/location.png')}}">
                            <!-- <h5>{{$user->city}}</h5> -->
                            <br><h4>{{$user->address}}</h4>
                        </span><br />
                        <div><p>Name</p>   <span>{{$user->fname}} {{$user->lname}}</span></div>
                        <div><p>Age</p>   <span>{{$user->age}}</span></div>
                        <div><p>Height</p>   <span>@if($user->height) {{$user->height}} cm @endif</span></div>
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
                    </div>
                    <div class="other_contacts">
                        <p> <img src="{{URL::ASSET('images/phone.png')}}" class="img-responsive" style="float: left;margin-right: 8px;"> Contact Info</p><br>
                        <div class="row" >
                               <div class="col-md-6"><p style="font-weight: 100;">Preffered Contact Method</p> 
                              <p  style="font-weight: 100;">Mobile number</p> 
                                </div>
                                <div class="col-md-6">
                              <p>{{$user->contact_method}}</p>
                         <p class="reveal-no-sec" ><span class="reveal-no" style="display: none;" ><a href="tel:{{$user->mobile_no}}">{{$user->mobile_no}}</a></span><a class="reveal-no-btn" data-type="static"   >Click here to reveal no.</a></p>
                           <!--  <a href="#"  style="font-weight: 100; font-size:16px;
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
                                      <p class="reveal-no-sec reveal" ><span class="reveal-no" style="display: none;" ><a href="tel:{{$val->value}}">{{$val->value}}</a></span><a class="reveal-no-btn" data-type="custom" data-id='{{$val->id}}' >Click here to reveal no.</a></p>
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
                   <!--  <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span>
                    <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span>
                    <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span>
                    <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span>
                    <span><img src="{{URL::ASSET('images/check.png')}}"> &nbsp;Testing Longone&nbsp;&nbsp;</span> -->
                    <h4>About Me</h4>
                    
                     <p style="text-align: justify;">@php echo html_entity_decode($user->about_me); @endphp </p>
            </div>
            <div class="info_top_margin">
                <div class="pink_bar">Image Gallery</div>
                <div class="gallery_img_grp">
           
               @if($images)
                  @foreach($images as $key =>$v)  
              

                   <div class="img-gallery-box" >
                         
                    <img data-img="{{URL::ASSET('uploaded/user/gallery')}}/{{$v->name}}" @if($v->lock) style="filter: blur(8px) !important; -webkit-filter: blur(8px);" class="wow flipInY open-modal img-thumbnail test" src="{{URL::ASSET('uploaded/user/gallery')}}/blur{{$v->name}}"  @else  class="wow flipInY open-modal img-thumbnail"   data-wow-delay="0.4s" src="{{URL::ASSET('uploaded/user/gallery')}}/{{$v->name}}" @endif data-id="{{$v->id}}"   data-toggle="modal" data-target="@php echo ($v->lock)?'#galleryModal':'#viewPhotoPop'; @endphp" style="height:170px" data-amount="{{$v->amount}}" >
                    <p class="quantity" style="width: 33% !important;"> <i class="fa fa-eye  btn-xs" ></i> {{$v->counter}} </p>
                    <p class="quantity1" style="font-size: 20px"> <i class="fa fa-heart  btn-xs" ></i> {{$v->like}} </p>
                  </div>
                  @endforeach
               @endif
                    <!-- 
                    <img class="wow flipInY" data-wow-delay="0.6s" src="{{URL::ASSET('images/pre_profile_b.png')}}" data-toggle="modal" data-target="#galleryModal">
                    <img class="wow flipInY" data-wow-delay="0.8s" src="{{URL::ASSET('images/pre_profile_c.png')}}" data-toggle="modal" data-target="#galleryModal_unlocked">
                    <img class="wow flipInY" data-wow-delay="1s" src="{{URL::ASSET('images/pre_profile_b.png')}}" data-toggle="modal" data-target="#galleryModal">
                    <img class="wow flipInY" data-wow-delay="1.2s" src="{{URL::ASSET('images/pre_profile_b.png')}}" data-toggle="modal" data-target="#galleryModal">
                    <img class="wow flipInY" data-wow-delay="0.4s" src="{{URL::ASSET('images/pre_profile_c.png')}}" data-toggle="modal" data-target="#galleryModal_unlocked">
                    <img class="wow flipInY" data-wow-delay="0.6s" src="{{URL::ASSET('images/pre_profile_b.png')}}" data-toggle="modal" data-target="#galleryModal">
                    <img class="wow flipInY" data-wow-delay="0.8s" src="{{URL::ASSET('images/pre_profile_c.png')}}" data-toggle="modal" data-target="#galleryModal_unlocked">
                    <img class="wow flipInY" data-wow-delay="1s" src="{{URL::ASSET('images/pre_profile_b.png')}}" data-toggle="modal" data-target="#galleryModal">
                    <img class="wow flipInY" data-wow-delay="1.2s" src="{{URL::ASSET('images/pre_profile_b.png')}}" data-toggle="modal" data-target="#galleryModal"> -->
                </div>
            </div>
                <div class="info_top_margin video-gallery-section">
                    
                    <div>
                        <div class="pink_bar">Video Gallery</div>
                        
                        <div class="upload_photo">

                            @if($video)
                              @foreach($video as $key=>$v)    
                               
                                @if($v->video_type == 'file')    
                                <div class="upload_video_div">
                                    <!-- <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}"> -->

                                    <video width="100%" height="300px" controls src="{{URL::ASSET('uploaded/user')}}/{{$v->name}}" > 
                                      <!-- <source src="{{URL::ASSET('uploaded/user')}}/{{$v->name}}" type="video/{{$v->extension}}"> -->
                                    </video>
                                </div>
                                @elseif($v->video_type == 'link')
                                 <div class="upload_video_div">
                                    <!-- <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}"> -->
                                 @php 
                                      $emb_link = explode('/',$v->name);
                                      $lst_key = count($emb_link) -1;   

                                  @endphp

                                 <iframe width="100%" height="300px" src="https://www.youtube.com/embed/{{$emb_link[$lst_key]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                @endif
                              @endforeach
                            @else
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
                  
 <div class="comment1">
                  @if($comment)
                    @foreach($comment as $key =>$v) 
                   
                    <p class="comment-para">
                        <img class="contact_img" src="{{URL::ASSET('images')}}/person{{mt_rand(1,3)}}.png">
                        <span class="contact_messagebox"><span class="name">{{$v->name}}</span>
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
                <input type="hidden" name="user_id" value="{{$profile_id}}" >
                <input type="hidden" name="reply_comment"  id="input-reply-id" >

                    <div>

                        <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">

                        <span class="nick_name">Nick Name</span>    
                       @php $login_user = Auth::user(); @endphp  
                       @if($login_user)
                        <input type="text"  name="name" placeholder="write your name" value="{{$login_user->fname}} {{$login_user->lname}}"  required="" readonly="">
                       @else
                        <input type="text"  name="name" placeholder="write your name" value=""  required="" >
                       @endif 
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
                            <span class="chatting_text">{{$v->complaint}}</span>
                            
                        </span>
                        <br>
                    </p>
                    @endforeach
                  @endif
                   
             <form action="{{route('add_complaint')}}" method="post" onsubmit="return false;" id="complaint-form"  >
                @csrf
                <input type="hidden" name="user_id" value="{{$profile_id}}" >
                    <div>
                        <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">
                        <span class="nick_name">Nick Name</span>@if($login_user)                            
                        <input type="text"  name="name" placeholder="write your name" value="{{$login_user->fname}} {{$login_user->lname}}"  required=""  readonly="">
                        @else
                        <input type="text"  name="name" placeholder="write your name"  required="" >
                        @endif
                        <br>
                        <textarea name="complaint" id="comment_area" placeholder="write your comment here...." required=""></textarea>
                    </div>
                <button class="chat_body_btn">Submit</button>
            </form>
                 </div>   
              </div>
            </div>
        </div>
    </div>
 <div class="modal fade" id="galleryModal" role="dialog">
          <div class="modal-dialog gallery_modal">
          
            <!-- Modal content-->
            <div class="modal-content gallery_modal_content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body navbar_btm gallery_modal_body">
                <img src="{{URL::ASSET('images/lock.png')}}">
                <h3>Unlock Photo</h3>
                <p>{{$user->fname}} {{$user->lname}} Has Locked Her Photo for Privacy<br />Purposes to ensure her identity is only Revealed<br />to a Genuine Customers.</p>
                <h4>To Unlock her Photo TestUser1 Requires<br />$<span id="lock-text-amount" ></span><br />You Can Pay Direct Via Paypal</h4>
              </div>
              <div class="modal-footer gallery_modal_footer">
                <form action="{{route('lock_photo_payment')}}" method="post"   >
                  @csrf
                    <input type="hidden"  name="id" value="" id="lock-photo-id"  >
                    <input type="hidden"  name="photo_user_id" value="{{$user->id}}"   >
                    <label class="gallery_modal_footer_label" for="fname">Email </label>
                    <input type="email" id="email" name="email" value="{{($login_user)?$login_user->email:''}}" placeholder="Email.."  @if($login_user) readonly @else required @endif  ><br />
                    <label class="gallery_modal_footer_label1" for="subject"  >we will email you a backup link</label><br />
                    <button id="paypal" type="submit" class="btn btn-default"></button>
                </form> 
                <label class="gallery_modal_footer_label3">Regular Customer? <a href="{{url('signup-signin')}}">Register As Browser</a></label>               
              </div>
            </div>
            
          </div>
        </div>

        <div class="modal fade" id="galleryModal_unlocked" role="dialog">
          <div class="modal-dialog gallery_modal">
          
            <!-- Modal content-->
            <div class="modal-content gallery_modal_content_unlocked">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body navbar_btm gallery_modal_body_unlocked">
                <img src="{{URL::ASSET('images/unlocked.png')}}">
                <h3>Photo Unlocked!</h3>
                <p class="gallery_modal_body_unlocked_p"  >
                    <a data-toggle="modal" data-target="#viewPhotoPop" data-note="unlocked"  id="view-photo"  >Click Here</a>
                    <span>To View Photo</span>
                </p>
                <p class="gallery_modal_body_unlocked_p1">
                    <span>
                       This photo Will Remain Unlocked For X Hours 
                    </span><br>
                    We also emailed you a Backup Link to the photo<br>
                    This link Will also expire in X hours<br>
                    <span>
                        Thank you!
                    </span>
                </p>
                
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
</div>
</div>
@endsection
@section('script')
<script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHA_SITE_KEY')}}
"></script>
<script>

/*document.onkeydown = function(e) {

if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}*/

$(function () {
  $('textarea').emoji({
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
                        $(form).find('.btn-loader').prop('disabled',true);
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
                          /* console.log(err);*/
                           toastr.error("Problem connecting URL");
                        }

                        $(form).find('.btn-loader').prop('disabled',false);
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
                          /* console.log(err);*/
                           toastr.error("Problem connecting URL");
                        }
                        endLoader($(form).find('.btn-loader'),$(form)); 
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

   $('body').on('click','.reveal-no-btn',async function(){
      
      $(this).hide();
      $(this).siblings('.reveal-no').show();
      try{
      var _token = '{{csrf_token()}}';
      var type = $(this).data('type');
      var  id= $(this).data('id');
      var  user_id = '{{$profile_id}}';

      var data = new FormData();
      data.append('_token',_token);
      data.append('type',type);
      data.append('id',id);
      data.append('user_id',user_id);

       var response=await fetch('{{route("count_number")}}',{
                                       method:'post', 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                               var json= await response.json(); 
       
                           /* console.log(json);*/   

                        }catch(err) {
                       /*    console.log(err);*/
                           toastr.error("Problem connecting URL");
                        }
   });



$('body').on('click','.open-modal',function(){
  
  var x = $(this).data('img');
  var y = $(this).data('id');
  var amount = $(this).data('amount');
  $("#lock-text-amount").text(amount);
  $("#lock-photo-id").val(y);
  $('#final-image-show').attr('data-id',y);
  $('#final-image-show').attr('src',x);

});



var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

$(function(){

  var pid = getUrlParameter('pid');  
  var x = getUrlParameter('image');  

if((typeof pid === 'undefined') || (x === 'undefined' )){
  return false;
} 
if((pid == '') || (x == '')){
  return false;
} 

  var img = '{{URL::ASSET("uploaded/user/gallery")}}/'+x;

  $('#final-image-show').attr('data-id',pid);
 
  $('#final-image-show').attr('src',img);
  $('#viewPhotoPop').attr('note','locked');
 $('#viewPhotoPop').modal('show');
likecounter();
});




 var test =    $('#viewPhotoPop').is(':visible');
 
$("body").on('click','.open-modal',async function(){
   $('#viewPhotoPop').attr('note','unlocked');
  likecounter(); 
});

function likecounter(){
  setTimeout(async function(){
    var test =    $('#viewPhotoPop').is(':visible');

    if(!test){
      return false;
    }

    var id = $("#final-image-show").data('id');
    var form_data = new FormData();
       form_data.append('_token',"{{csrf_token()}}"); 
       form_data.append('id',id); 
      
                               var response=await fetch("{{route('add_image_counter')}}",{
                                           method:"POST", 
                                           body: form_data, 
                                           dataType:'JSON',
                                           credentials: 'same-origin',
                                        });
                                   var json= await response.json();
                                 
    },3000);
}


$('#viewPhotoPop').on('hidden.bs.modal',async function () {
  var type =  $('#viewPhotoPop').attr('note');
  if(type == 'locked')
  {
  var id = $('#final-image-show').data('id');
/*  console.log(id);*/

var swal_rslt = await  swal({
                 title: "Do you like this photo?",
                  buttons: {
                            cancel: {
                              text: "No",
                              value: false,
                              visible: true,
                              className: "",
                              closeModal: true,
                            },
                            confirm: {
                              text: "Yes",
                              value: true,
                              visible: true,
                              className: "",
                              closeModal: true
                            }
                          },
              }).then((result) => {
                   
                   return result;
              });   

  if(swal_rslt){
     var form_data = new FormData();
       form_data.append('_token',"{{csrf_token()}}"); 
       form_data.append('id',id); 

         var response=await fetch("{{route('like_photo')}}",{
                     method:"POST", 
                     body: form_data, 
                     dataType:'JSON',
                     credentials: 'same-origin',
                  });

          var json=  response.json();

  }
}
})



</script>
@endsection
<style>
    .p_infomamtion h4
    {
        float: none!important;
    }
    .comment_boxdiv {
   
    left: 311px!important;

}


.carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img
{
    display: unset!important;
    margin-bottom: 7x!important;
}

.reveal {
    float: right;
    margin-right: 40px!important;
    margin-top: 8px!important;
}

  p.quantity {
    float: left;
    width: auto;
}
.img-gallery-box {
    float: left;
    width: 20%;
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