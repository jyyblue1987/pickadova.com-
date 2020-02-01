<?php use App\Http\Controllers\HomeController; ?>
@extends('layouts.app')


@section('content')
                 @php $user = Auth::user(); @endphp
<link rel="stylesheet" type="text/css" href="{{URL::ASSET('css/wickedpicker.min.css')}}">
<style>
    input.timepicker {
    width: 60%;
    margin: 6px;
}
 .progress {
    position: relative;
    width: 50%;
    top: 38px;
    border: 1px solid #7F98B2;
    padding: 1px;
    border-radius: 3px;
    left: 21px; }
  .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
  .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}

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
.live_bar
{
  padding-top: 10px;
}
.chat_window_p3 {
    margin-left: 30% !important;
}
.live_bar div {

margin-top: -143px;
color: #fff;
}
.upload_photo {
    float: left;
    margin-top: 30px;
    margin-left: 0px;
    position: relative;
    width: 100%;
}
.hours span
{
  float: unset;
}
input.timepicker {
    width: 20%;
    margin: 6px;
}
.hours h3
{
  margin-bottom: 20px;
}

.img-gallery-box {
    float: left;
    width: 13%;
}
    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    display: unset!important; 
    max-width: 100%;
    height: auto;
    float: left!important;
    margin-right: 3px;
}

button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    border-bottom: 1px solid gray !important;
    border: none;
 }
input[type=file] {
    display: block;!important; */
    text-align: center;
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
.save_btn1
{
    margin-top: 25px!important;
}
.a1
{
    color: white!important;
}
.a1:hover
{
    color: black!important;
    text-decoration: none!important;
}
.mm
{
    float: left!important;
    width: 80%;
}
.gallery_img_grp img {
width: auto !important;
margin-right: 12px;
box-shadow: 4px 4px 12px #bbb;
margin-bottom: 10px;
height: 110px !important;
}
.croppie-container .cr-slider-wrap
{
  display: none;
}

.message1 small{
  font-size: 70%;
}
.upload_photo_div {
    width: 155px!important;
     margin-right: 0px!important; 
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

.img-gallery-box {
float: left;
width: auto !important;
}
.gallery_img_grp img {
width: auto !important;

}

.upload_photo_div img {
width: auto;
}
.upload_photo_div div {
float: left;
margin-top: 7px;
width: 64%;
}
.upload_photo_div div {
float: left;
margin-top: 7px;
width: 64%;
}
.upload_photo_div label {
margin-right: -33px;
float: left;
}

.upload_photo a {

margin-top: 4px;

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

   <div class="main profile_m container">
        <div>
            <div class="boy_test">
                <h4>Boys Testimonial</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="{{url('advertise_profile')}}">Add New</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="{{url('advertise_profile')}}">Search Now </a></p>
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
            <!-- <button class="pause_btn">PAUSE AD</button> -->

            <div class="credit">
                <h4>Account Credit</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="{{route('payment')}}">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>${{$user->wallet}}</span></p>
            </div>
        </div>
        <div class="navbar_btm midnav shadow">
            <ul>
                <a class="ancer" href="{{url('advertise_profile')}}" ><li>PREVIEW</li></a>
                <a class="ancer" href="{{url('advertise_edit_profile')}}" ><li a href="{{url('advertise_edit_profile')}}"class="midnav_active">EDIT</li></a>
                <a class="ancer" href="{{url('payment')}}"><li>PAYMENT</li></a>
            </ul>
              <div id="bump-up-profile" style="cursor: pointer;">
                    <img src="{{URL::ASSET('images/up_arrow.png')}}">
                    <p class="live_barP">${{$live->bump_up_amount}}</p>
                    <p class="live_barP1">BUMP UP</p>
                </div>
        </div>
        <div id="edit">
          @if($user->live_status == 'ON') 
            <div class="shadow live_bar">
                YOUR PROFILE IS LIVE<br>
                <small style="color: #000000ed;font-weight: lighter;font-size: 15px;display: table; margin: auto;">Expire on - {{$user->live_expiry}}</small>
               @elseif($user->live_status == 'Pause')
            <div class="shadow live_bar live_bar1">
                YOUR PROFILE IS <a href="#">Pause</a> NOW
               @else
            <div class="shadow live_bar live_bar1 " >
                YOUR PROFILE IS <a href="#">NOT</a> LIVE
               @endif 
              
            </div>
                   
            <p class="profile_expire">
              @if($user->live_status == 'ON')  
                 {{$live->live_message}}
              @else
                 {{$live->pause_message}}
              @endif
              
              @if($user->account_verification == '0')
                <br>   {{$live->live_verification}}
              @endif
              <!-- Your profile is not verified please complete your profile -->
            </p>
            <div class="row col-md-12" >

              @if(session()->has('message')  )
                   <span class="alert alert-success custom-info-message">
                       {{ session()->get('message') }}
                   </span>
               @endif
               @if(session()->has('emessage')  )
                   <span class="alert alert-danger custom-info-message">
                       {{ session()->get('emessage') }}
                   </span>
               @endif
            </div>   
            <div class="pre_profile shadow pre_profile_edit">
                <div class="float">
                 


                  <form action="{{route('advertise_edit_profile')}}"  method="post" id="basic-profile-form"  onsubmit="return false;" >
                    @csrf

                    	
                    <div class="pumpup wow fadeInRight" data-wow-delay="0.2s">
                        <p id="pump_p">Profile Bump Up Auto Cycle</p>
                        <select>
                            <option>Min</option>
                        </select>
                        <input class="pump_input" id="update_pump_up" style="width: 150px" type="number"placeholder="Enter time in minute" value="{{$user->auto_pump_up}}"  >
                        <div id="verify_box"> 
                          @if($user->account_verification)
                          @else 
                           
                           @if($requested)
                             <button type="button" class="btn red_btn">Requested</button>
                           @else
                             <button type="button" class="btn red_btn" id="request-verification" style="border: 1px solid #fff6f6;
    border-bottom: 1px solid white!important;
    margin-left: 0px!important;
    padding-left: 10px;
    padding-right: 10px;
    margin-top: 15px;">Request Verification</button>
                           @endif                          
                          @endif 
                            <div id="verify_boxdiv">
                                <p>Profile highlight</p>
                                <!-- <div>${{$live->feature_amount}}</div> -->
                                <div id="verify_boxdivdiv">
                                   @php $date = date('Y-m-d H:i:s');@endphp
                               
                                    <span>${{$live->feature_amount}} amount</span><br />
                                    <span id="verify_boxspan">for {{$live->feature_expiry}} days</span>
                                    @if($user->feature_profile > $date)
                                    <button class="btn red_btn" type="button" name="remember"  disabled="" >Highlighted</button>
                                   @else
                                    <button class="btn red_btn" type="button" name="remember"  id="feature_profile" >Highlight</button>
                                   @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hours hours_edit wow fadeInLeft" data-wow-delay="0.2s">
                        <img id="hours_edit_img" src="{{URL::ASSET('uploaded/user')}}/{{$user->image}}">
                         @if($user->account_verification) 
                      
                      
                        @if($date < $user->feature_profile ) 
                         <img id="hours_edit_img1" src="{{URL::ASSET('images/double_ribbon2.png')}}">
                         @else
                           <img class="hours_ribbon" src="{{URL::ASSET('images/verified.png')}}">
                           
                          @endif
                    @endif
                        <button type="button" class="btn red_btn">Change Profile Picture</button>
                        <input type="file" id="profile-image-upload"  style="opacity: 0;top: 31%;height: 33px;position: absolute;width: 100%;cursor: pointer" accept="image/*" >
                        <div id="uploaded_image"></div>
                        <h3 class="housh3">WORK HOURS</h3>
                         @php   $start_work = array();
                                $end_work = array();
                                if($user->start_work){
                                   $start_work =json_decode($user->start_work); 
                                   $end_work =json_decode($user->end_work); 
                                  } 

                           @endphp


                        <div class="date1">
                            <p><span>Monday</span><input type="text" class="timepicker" name="start_work[mon]" value="@if($start_work){{$start_work->mon}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[mon]" value="@if($end_work){{$end_work->mon}}@endif">
                          </p>
                        </div>
                        <div class="date1">
                            <p><span>Tuesday</span><input type="text" class="timepicker" name="start_work[tue]" value="@if($start_work){{$start_work->tue}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[tue]" value="@if($end_work){{$end_work->tue}}@endif">
                          </p>
                        </div>
                        <div class="date1">
                            <p><span>Wednesday</span><input type="text" class="timepicker" name="start_work[wed]" value="@if($start_work){{$start_work->wed}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[wed]" value="@if($end_work){{$end_work->wed}}@endif"></p>
                        </div>
                        <div class="date1">
                            <p><span>Thursday</span><input type="text" class="timepicker" name="start_work[thu]" value="@if($start_work){{$start_work->thu}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[thu]" value="@if($end_work){{$end_work->thu}}@endif"></p>
                          
                        </div>
                        <div class="date1">
                            <p><span>Friday</span><input type="text" class="timepicker" name="start_work[fri]" value="@if($start_work){{$start_work->fri}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[fri]" value="@if($end_work){{$end_work->fri}}@endif"></p>
                        </div>
                        <div class="date1">
                            <p><span>Saturday</span><input type="text" class="timepicker" name="start_work[sat]" value="@if($start_work){{$start_work->sat}}@endif">
                            <span>TO</span><input type="text" class="timepicker" name="end_work[sat]" value="@if($end_work){{$end_work->sat}}@endif"></p>
                        </div>
                        <div class="date1">
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
                     <div>

                     <!--  <button type="button" class="btn red_btn "  ><a href="#change_name" class="a1">Change Name</a></button> -->
                      <button type="button" class="btn red_btn a1"><a href="{{route('change_password')}}" class="a1" >Change Password</a></button>
                      <button type="button" class="btn red_btn a1" data-toggle="modal" data-target="#change-email">Change Email</button>
                    <!--  <button type="button" class="btn red_btn red_btn_location a1"  ><a class="a1" href="#change_location"><img id="hours_edit_img" src="http://laabhaa.co.in/Projects/pickadova.com/public/uploaded/user/location_white.png" style="width: 13px;"> Change Location</a></button>
                     -->
</div>


                        <div class="info dissama info1" id="change_name">
                            <div><p>First name*</p>   <input type="text" name="fname" value="{{$user->fname}}" required></div>
                            <div><p>Last name*</p>   <input type="text" name="lname" value="{{$user->lname}}" required></div>
                            <div id="change_location"><p>Suburb*</p>   <input type="text" name="address" id="location" value="{{$user->address}}" required>
                            <input type="hidden" name="lat" id="lat" value="{{$user->lat}}">
                            <input type="hidden" name="lang" id="lang" value="{{$user->lang}}">
                            </div>
                            <!-- <input type="hidden" name="state" id="state_name" value="{{$user->state}}"> -->
                            <div><p>State*</p> <select   name="state" id="state_name" >
                                                 <option value="" >Select State</option>
                                                 @foreach($states as $key =>$val)
                                                        <option value="{{$val->short_name}}" @if($user->state == $val->short_name) Selected @endif>{{$val->short_name}}</option>
                                                 @endforeach
                                                </select></div>
                              <!-- <input type="text" name="state" id="state_name" value="{{$user->state}}" required></div> -->
                              <!-- city_name -->
                              <input type="hidden" name="city" id="city_name" value="" required >
                            <!-- <div><p>City*</p>  </div> -->
                            <div><p>Age*</p>   <input type="number" name="age" value="{{$user->age}}" required min="18"></div>
                            <div><p>Height*</p>   <input type="number" name="height" value="{{$user->height}}" placeholder="Height (in cm)" required></div>
                            <div><p>Damage*</p>   <input type="number" name="damage" value="{{$user->damage}}" required></div>
                            <div><p>Ethnicity*</p>  <select  name="ethincity"  required="">
                                                     <option value=""  >Select Ethnicity</option> 
                                                     <option value="White" @if($user->ethincity == 'White') Selected @endif  >White</option> 
                                                     <option value="Red Neck" @if($user->ethincity == 'Red Neck') Red Neck @endif >Red Neck</option> 
                                                        
                                                        </select>  
                             </div>
                            @if($customfield)
                               
                               @foreach($customfield as $key =>$val)
                              <div>
                                    @if($val->input_type == 'text')
                                    <p>{{$val->label}} @if($val->required) * @endif </p>
                                         <input type="text" name="custom[{{$val->id}}]" value="{{$val->value}}"  @if($val->required) required @endif  >
                                    @elseif($val->input_type == 'select')
                                     <p>{{$val->label}} @if($val->required) * @endif </p>
                                       @php $option = json_decode($val->option);  @endphp 
                                       <select name="custom[{{$val->id}}]"  @if($val->required) required @endif>
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

                        </div>

                        <div class="other_contact ">
                              <p> <img src="{{URL::ASSET('images/phone.png')}}" class="img-responsive" style="float: left;margin-right: 8px;"> Contact Info</p><br>
                        <div class="row" >
                               <div class="col-md-6"><p style="font-weight: 100;">Preferred Contact Method</p> 
                              <p  style="font-weight: 100;">Mobile number</p> 
                                </div>
                                <div class="col-md-6">
                                <p><select name="contact_method" required=""  style="background-color: transparent;" >
                                 <option value="" >Select</option>
                                 <option value="Call" @if($user->contact_method == 'Call') Selected @endif>Call</option>
                                 <option value="Call & Text"  @if($user->contact_method == 'Call & Text') Selected @endif >Call & Text</option>
                                 <option value="Chat Here"  @if($user->contact_method == "Chat Here") Selected @endif  >Chat Here</option>
                                 <option value="User Other Contact"  @if($user->contact_method == "User Other Contact") Selected @endif  >User Other Contact</option>
                               </select></p>
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
                                <div class="col-md-6 " >
                                      <img src="{{URL::ASSET('uploaded/icon')}}/{{$val->icon}}" class="img-responsive" height="40" width="40">
                                        <input class="mm" type="number" class="reveal1" name="custom[{{$val->id}}]" value="{{$val->value}}" placeholder="Enter Your {{$val->label}} No" style="border: none; color: inherit; " @if($val->required) required @endif  > 
                                     
                                </div>
                               
                                @endif
                                <div class="col-md-6 " >
                                @if($val->input_type == 'text1')
                                      <img src="{{URL::ASSET('uploaded/icon')}}/{{$val->icon}}" class="img-responsive" height="40" width="40">
                                        <input class="mm" type="text" class="reveal1" name="custom[{{$val->id}}]" value="{{$val->value}}" placeholder="Enter Your {{$val->label}} No" style="border: none; color: inherit; " @if($val->required) required @endif  > 
                                       @endif
                                </div>
                               @endforeach 

                            </div>
                            @endif
                           
                              <button type="submit" class="btn red_btn save_btn">Save</button>
                        </div>                    
                    </div>

                  </form> 
         
                    <div>
                        <form action="{{route('advertise_edit_profile')}}" method="post" id="service-form" onsubmit="return false;" >
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

                        <form action="{{route('advertise_edit_profile')}}" method="post" id="about-form" onsubmit="return false;" >
                            @csrf
                        <div class="pink_bar1">About me</div>
                        <div id="widget">
                            <div id="summernoteemoji"></div>
                            <input type="hidden" name="about_me" id="summernote1" value="{{$user->about_me}}">
                            <textarea class="form-control" name="" id="summernote" required  >{{$user->about_me}}</textarea>
                        </div>

                        <button type="submit" class="btn red_btn save_btn save_btn2">Save</button>
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

                                    <video width="93.5%" height="300px" controls src="{{URL::ASSET('uploaded/user')}}/{{$v->name}}" >
                                      <!-- <source src="{{URL::ASSET('uploaded/user')}}/{{$v->name}}" type="video/{{$v->extension}}"> -->
                                    </video>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                           <!--  <input class="form-check-input" type="checkbox" name="remember">
                                            <span> LOCK</span> -->
                                        </label>
                                        <a  data-id="{{$v->id}}" class="delete-data btn-xs btn-danger" data-url="{{route('user_delete_media')}}" data-redirecturl="{{route('advertise_edit_profile')}}"  style="color: #fff;" ><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                @elseif($v->video_type == 'link')
                                 <div class="upload_video_div">
                                    <!-- <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}"> -->
                                 @php 
                                      $emb_link = explode('/',$v->name);
                                      $lst_key = count($emb_link) -1;   

                                  @endphp

                                 <iframe width="100%" height="300px" src="https://www.youtube.com/embed/{{$emb_link[$lst_key]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="form-group form-check">
                                        <label class="form-check-label">
                                            <!-- <input class="form-check-input" type="checkbox" name="remember">
                                            <span> LOCK</span> -->
                                        </label>  
                                        <a  data-id="{{$v->id}}" class="delete-data btn-xs btn-danger" style="color: #fff;" data-url="{{route('user_delete_media')}}" data-redirecturl="{{route('advertise_edit_profile')}}" ><i class="fa fa-trash"></i></a>
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
                       <!--  <div class="row" id="custom-img-gallery-box" style="display: none;">
                          <div class="col-md-2">
                            <div class="view-gallery-img img-responsive">
                            @if($images)
                              @foreach($images as $key =>$i)
                               <img src="{{URL::ASSET('uploaded/user/gallery')}}/{{$i->name}}">

                                @if($i->lock)
                                   @if($i->admin_approval)
                                <span  class="admin-approval-icon" >  
                                  <img class="upload_ribbon" src="{{URL::ASSET('images/lock1.png')}}">
                                </span>
                                    @endif 
                                @endif    
                                <div class="row">
                                  <div class="col-md-6">
                                    <input class="form-check-input add-to-lock " data-id="{{$i->id}}" type="checkbox" @if($i->lock) Checked @endif > LOCK @if($i->lock) (${{$i->amount}}) @endif
                                  </div>
                                  <div class="col-md-6">
                                    <a  data-id="{{$i->id}}" class="delete-data btn-xs btn-danger"  data-url="{{route('user_delete_media')}}" data-redirecturl="{{route('advertise_edit_profile')}}"   style="color: #fff;"><i class="fa fa-trash"></i></a></div>
                                </div>
                                
                              @endforeach
                            @endif  
                            </div>
                          </div>
                        </div> -->
                        <div class="upload_photo">
                            
                        @if($images)
                            @foreach($images as $key =>$i)
                            
                            <div class="upload_photo_div img-gallery-box">
                                <img class="shadow img-thumbnail" src="{{URL::ASSET('uploaded/user/gallery')}}/{{$i->name}}" style="height: 170px;" >
                                <div class="form-group form-check"  >
                                    <label class="form-check-label">
                                    <!--   <input type="hidden" id="img_blur" value="{{$i->name}}">
                                      <input type="hidden" id="ext" value="{{$i->extension}}"> -->
                                        <input class="form-check-input add-to-lock " data-id="{{$i->id}}" data-name='{{$i->name}}' data-ext='{{$i->extension}}' type="checkbox" @if($i->lock) Checked @endif>
                                        <span> LOCK @if($i->lock) (${{$i->amount}}) @endif</span>
                                    </label>
                                    <a  data-id="{{$i->id}}" class="delete-data btn-xs btn-danger"  data-url="{{route('user_delete_media')}}" data-redirecturl="{{route('advertise_edit_profile')}}"   style="color: #fff;"><i class="fa fa-trash"></i></a>
                                </div>
                                @if($i->lock)
                                   @if($i->admin_approval)
                                  
                                  <img class="upload_ribbon" src="{{URL::ASSET('images/lock1.png')}}">
                                
                                   @endif 
                                @endif 
                            </div>
                            @endforeach
                        @endif
                          <!--   <div class="upload_photo_div">
                                <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                            </div>
                            <div class="upload_photo_div">
                                <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                            </div>
                            <div class="upload_photo_div">
                                <img class="shadow" src="{{URL::ASSET('images/pre_profile_c.png')}}">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>     <div class="chat_body chat_margin_l">
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
    margin-top: 15px; background: #8c7e7e82; min-width: 90%;"><span class="name"></span><i class="fa fa-times close-reply-box" aria-hidden="true" style="float: right;
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
                        <input type="text"  name="name" placeholder="write your name" value="{{$user->fname}} {{$user->lname}}"  required="" readonly >
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
                <input type="hidden" name="user_id" value="{{$user->id}}" >
                    <div>
                        <img class="contact_img" src="{{URL::ASSET('images/person4.png')}}">
                        <span class="nick_name">Nick Name</span>                            
                        <input type="text"  name="name" placeholder="write your name" value="{{$user->fname}} {{$user->lname}}"   required="" readonly >
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
    </div>

<div id="VideoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{route('user_upload_video')}}" method="post" onsubmit="return false;" id="video-upload" enctype="multipart/form data" >  
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload video Or Add Youtube Link</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Add Youtube link</label>
            <input type="text" name="youtube_link" class="form-control" placeholder="Ex:- https://youtu.be/zGGrXg0APkM" id="youTubeUrl" >
        </div>
        <div class="form-group">
            <label>Upload Video</label>
            <input type="file" name="video" accept="video/mp4,video/ogg,video/webm,video/*" class="form-control" >
        </div>
        <div id="progress-video-wrp" style="height: 50px"><div class="progress-bar"></div ><div class="status">0%</div></div>
        <div id="video-output"><!-- error or success results --></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close1" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-default" id="video-upload-btn">Submit</button>
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

    <div class="modal fade" id="Go-live-modal" role="dialog">
          <div class="modal-dialog gallery_modal">
          
            <!-- Modal content-->
            <div class="modal-content gallery_modal_content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body navbar_btm gallery_modal_body">
                <img src="{{URL::ASSET('images/lock.png')}}">
                <h3>Go Live</h3>
                <p>For visible on the home page.</p>
                <h4>You have to pay <br />${{$live->live_amount}}<br /> amount for {{$live->live_expiry}} Days and  Pay Direct From wallet</h4>
              </div>
              <div class="modal-footer gallery_modal_footer">
                 
                    <button id="paypal-live-btn" type="button" class="btn btn-default" data-id="{{$user->id}}" data-expiry="{{$live->live_expiry}}" style="width: 35%;" >Click here to Go Live</button>

                <!-- <label class="gallery_modal_footer_label3">Regular Customer? <a href="#">Register As Browser</a></label>                -->
              </div>
            </div>
            
          </div>
        </div>
        <div id="change-email" class="modal fade" role="dialog">
                
                  <div class="modal-dialog">
                   <form action="{{route('user_change_email')}}" method="post" id="user_change_email" enctype="multipart/form-data" >  
                          @csrf
  
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Email</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label>New Email</label>
                            <input type="email" name="email" class="form-control"  required="">
                            @if($errors->has('email'))
                            <span  class="error" >{{$errors->first('email')}}</span>  <br>   
                           @endif
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-default" >Submit</button>
                      </div>
                    </div>
                  </form>
                   
                  </div>
                </div>

<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload & Crop Image</h4>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-7 text-center">
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyACWUZ9OL8BQVQC-4cSsSFmEo71SLDzvlk&libraries=places&language=en"></script>

<script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHA_SITE_KEY')}}
"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="{{URL::ASSET('js/wickedpicker.min.js')}}"></script>
<!-- <script src="{{URL::ASSET('js/.js')}}"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js" ></script>
<script type="text/javascript" src="{{URL::ASSET('js/exif.js')}}" ></script>


<script type="text/javascript">

   var emojis = {};
    emojis['emojis'] =['&#x1F642;', '&#x1F641;', '&#x1f600;', '&#x1f601;', '&#x1f602;', '&#x1f603;', '&#x1f604;', '&#x1f605;', '&#x1f606;', '&#x1f607;', '&#x1f608;', '&#x1f609;', '&#x1f60a;', '&#x1f60b;', '&#x1f60c;', '&#x1f60d;', '&#x1f60e;', '&#x1f60f;', '&#x1f610;', '&#x1f611;', '&#x1f612;', '&#x1f613;', '&#x1f614;', '&#x1f615;', '&#x1f616;', '&#x1f617;', '&#x1f618;', '&#x1f619;', '&#x1f61a;', '&#x1f61b;', '&#x1f61c;', '&#x1f61d;', '&#x1f61e;', '&#x1f61f;', '&#x1f620;', '&#x1f621;', '&#x1f622;', '&#x1f623;', '&#x1f624;', '&#x1f625;', '&#x1f626;', '&#x1f627;', '&#x1f628;', '&#x1f629;', '&#x1f62a;', '&#x1f62b;', '&#x1f62c;', '&#x1f62d;', '&#x1f62e;', '&#x1f62f;', '&#x1f630;', '&#x1f631;', '&#x1f632;', '&#x1f633;', '&#x1f634;', '&#x1f635;', '&#x1f636;', '&#x1f637;', '&#x1f638;', '&#x1f639;', '&#x1f63a;', '&#x1f63b;', '&#x1f63c;', '&#x1f63d;', '&#x1f63e;', '&#x1f63f;', '&#x1f640;', '&#x1f643;', '&#x1f4a9;', '&#x1f644;', '&#x2620;', '&#x1F44C;','&#x1F44D;', '&#x1F44E;', '&#x1F648;', '&#x1F649;', '&#x1F64A;'];
$(function () {
  $('#comment_area, #complaint_area').emoji(emojis);
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

$("#summernote").on("summernote.change", function (e) {   // callback as jquery custom event 
          var c= $('.note-editable').html();
            $('#summernote').text(c);
          $('#summernote1').val(c);
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
                 /* $('#city_name').val(addr[i].short_name);*/
              }
            }
             $('#lat').val(lat1);
             $('#lang').val(long1);
            });
});  


         $("#basic-profile-form").validate({
             rules:{
                 age:{
                       required:true,
                       min:18
                 }

                },
            messages:{
                  
                 age:{
                       required:"Age is required",
                       min:"Age should be above 18"
                 }         
               
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
                                 location.href='{{url("advertise_edit_profile")}}'; 
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
                                 location.href='{{url("advertise_edit_profile")}}'; 
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
                                 location.href='{{url("advertise_edit_profile")}}'; 
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

                        $('#video-upload-btn').attr('disabled',true);
                        var data=new FormData($(form)[0]);

                        var element = $("#video-upload-btn");
                        var progress_bar_id = "#progress-video-wrp";
                        // try {

                        //    var response=await fetch(form.action,{
                        //                method:form.method, 
                        //                body: data, 
                        //                dataType:'JSON',
                        //                credentials: 'same-origin',
                        //             });
                        //        var json= await response.json();
                        //    if (json.result){
        
                        //       toastr.success(json.message);
                        //       setTimeout(function(){ 
                        //          location.href='{{url("advertise_edit_profile")}}'; 
                        //       }, 1500);                   
                           
                        //    }else{
                        //       toastr.error(json.message);
                        //    }    
                        // }catch(err) {
                        //    console.log(err);
                        //    toastr.error("Problem connecting URL");
                        // }
                       $.ajax({
                            url : form.action,
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
                                   location.href='{{url("advertise_edit_profile")}}'; 
                                }, 1500);                   
                             
                             }else{
                                toastr.error(json.message);
                             }  
                          });

                        // endLoader($(form).find('.btn-loader'),$(form)); 
                     }
             });



// $('body').on('change','#profile-image-upload',async function(e){
// var image = e.target.files[0];
// var _token = '{{csrf_token()}}';

//    var data=new FormData();

//    data.append('_token',_token);
//    data.append('image',image);
//                         try {
//                            var response= await fetch('{{route("advertise_edit_profile")}}',{
//                                        method:'post', 
//                                        body: data, 
//                                        dataType:'JSON',
//                                        credentials: 'same-origin',
//                                     });
//                            var json =await response.json();;
//                            if (json.result){
                             
//                               toastr.success(json.message);
//                               setTimeout(function(){ 
//                                  location.href='{{url("advertise_edit_profile")}}'; 
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
                           var response= await fetch('{{route("advertise_edit_profile")}}',{
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
                        $('#image-upload-btn').attr('disabled',true);
                        var data=new FormData($(form)[0]);
                        $.ajax({
                            url : '{{route("user_upload_image")}}',
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
                                   location.href='{{url("advertise_edit_profile")}}'; 
                                }, 1500);                   
                             
                             }else{
                                toastr.error(json.message);
                             }  
                          });


    }
});

$('body').on('click','.add-to-lock',async function(e){

var id = $(this).data('id');
var image = $(this).data('name');
var ext = $(this).data('ext');
var lock = '0';
var amount = '0';
if($(this).is(':checked')){
  lock = '1';
var swal_rslt = await  swal({
                 title: "Are you sure?",
                  text: "Locking photos will blur your photos and make customers pay to see your photos. You decide how much should the customer pay to see your photo. Doing so you can screen out insincere customers or just any random people from seeing photos that are private to you. Not locking will allow anyone to come into your profile to see your photo. You can lock only one photo or as many as you like.",
                  content: "input",
                  icon: 'warning',
                  buttons: true,
              }).then((result) => {
                   
                   return result;

              });   



  if(isNaN(swal_rslt) || Number(swal_rslt) <= 0.9){

      toastr.error("Minimim Amount is $1.00");
    return false;
  }else{
    amount =parseFloat(swal_rslt);
  }

}
var _token = '{{csrf_token()}}';
   var data=new FormData();

   data.append('_token',_token);
   data.append('id',id);
   data.append('lock',lock);
   data.append('amount',amount);
   data.append('image',image);
   data.append('ext',ext);

                        try {
                           if(lock == 1)
                           {
                           toastr.success('Image Lock successfull');
                           }
                           else
                           {
                           toastr.success('Image Unlock successfull');
                           }
                           var response= await fetch('{{route("user_image_lock")}}',{
                                       method:'post', 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
                           var json =await response.json();;
                           if (json.result){
                             
                             /* toastr.success(json.message);*/
                              /*setTimeout(function(){ 
                                 location.href='{{url("advertise_edit_profile")}}'; 
                              }, 1500);   */                
                           
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

                  var _token = '{{csrf_token()}}';
                  var id = '{{$user->id}}'; 
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


  $("body").on('click','#feature_profile',async function(){
           var swal_rslt = await  swal({
                 title: "Profile Highlight?",
                  text: "Do you want to highlight your profile?",
                  icon: 'warning',
                  buttons: true,
              }).then((result) => {
                   return result;
              });   
              if(!swal_rslt){
                return false;
              }
              var data = new  FormData();

              data.append('_token','{{csrf_token()}}');
             var response=await fetch("{{route('feature_response')}}",{
                                       method:"post", 
                                       body: data, 
                                       dataType:'JSON',
                                       credentials: 'same-origin',
                                    });
              var json= await response.json();
              console.log(json);
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


    $('body').on('change','#update_pump_up',async function(){
         var time =$(this).val();
         var swal_rslt = await  swal({
                 title: "Are you sure?",
                  text: "Do you want to update pump up cycle?",
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
           data.append('time',time);
            var response=await fetch("{{route('update_pump_up')}}",{
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

    $('body').on('click','#request-verification',async function(){
         var time =$(this).val();
         var swal_rslt = await  swal({
                 title: "Are you sure?",
                  text: "Do you want to request for verify?",
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
            var response=await fetch("{{route('request_verification')}}",{
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
    

</style>