<?php use App\http\Controllers\admin\StatesController;?>
<div class="navbar">
       <div class="navbar_top">
      
            <a href="{{url('/')}}" ><img src="{{URL::ASSET('images/picadova.png')}}" style="width:25%;float: left;"></a>
    
      <div class="nav1-right">
        <div id="google_translate_element" style="color: gray!important; margin-top: 19px;"></div>  
         @if(Auth::user()) 
         <div class="point">
          <span class="point-span" id="total_unseen_message">0</span>
        </div>
            <a href="@if(Auth::user()->type == 'Advertise'){{url('advertise_profile')}}@else {{url('browser_profile')}} @endif" ><img class="img-circle nav_img" src="{{URL::ASSET('uploaded/user')}}/{{Auth::user()->image}}">

            <!-- <img class="nav_img_co" src="{{URL::ASSET('images/circle.png')}}" > -->
           <!--  <span>{{Auth::user()->fname}}  {{Auth::user()->lname}}</span> -->  </a>
            <div class="dropdown profile-dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()->fname}}  {{Auth::user()->lname}}
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li style="padding: 5px 0px; font-size: 15px;"><a href="@if(Auth::user()->type == 'Advertise'){{url('advertise_profile')}}@else {{url('browser_profile')}} @endif">Profile</a></li>
                  <li style="padding: 5px 0px; font-size: 15px;"><a href="{{route('chat')}}">My Message</a></li>
                  <li style="padding: 5px 0px; font-size: 15px;"><a href="{{route('change_password')}}">Change Password</a></li>
                  <li style="padding: 5px 0px; font-size: 15px;"><a href="{{route('user_logout')}}">Logout</a></li>
                  
                </ul>
              </div>          
        @else
            <a href="{{url('signup-signin')}}" >
                <span class="signin profile1-btn">Signup/Signin</span>  </a>         
              <!-- <img class="img-circle nav_img" src="{{URL::ASSET('images/kayla.png')}}"> -->
           <!--  <img class="nav_img_co" src="{{URL::ASSET('images/circle.png')}}" > -->
            
        @endif

   
       
        
             
       </div>
    </div>
        <div class="navbar_btm notranslate">
            <div class="navbar_btm_div " id="navbar-state-element">
                <div style="margin: 0 auto;width: 1040px;">    <!-- Olexsandr Changes: Static body -->            
                    <ul>
                        <li class="states" data-toggle="modal" data-target="#myModal">STATES</li>
                        @php  $state = StatesController::get();
                            $region_cookie = Cookie::get('user_state');
                        
                            if($region_cookie){
                            $region_cookie = json_decode($region_cookie);
                            }
                    
                        @endphp
                        @if($state)
                        @foreach($state as $key=>$v) 
                        <li data-id="{{$v->short_name}}" class="@if($region_cookie) {{($region_cookie->region == $v->short_name)?'nav_active':''}}  @endif states_data  navbar-state-btn1" >{{$v->short_name}}</li>
                        @endforeach
                        @endif
                    </ul>
                    <button class="set_btn" id="navbar-state-btn">Set Default</button>
                </div>    
            </div>
        </div>
    </div>
<style type="text/css">
    .goog-te-gadget-simple {
        background-color: black!important;
    }
    .btn-primary {
        background-color: transparent;
    }
    .btn-primary:hover {
    color: #fff;
    background-color: transparent;
}
 .btn-primary:focus {
    color: #fff;
    background-color: transparent!important;
    }
    .btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: #fff;
     background-color: transparent; 
 }
 .profile1-btn {
   
    height: 40px;
    margin-top: 25px;
    background-color: #ffffff;
    border-radius: 30px;
    float: left;
    margin-left: 22px;
    text-align: center;
    color: #f84f73!important;
    line-height: 40px;
    padding: 0px;
    margin-top: 17px;
   padding: 0px 15px 0px 15px;
}
.point {
    background-color: #ffffff;
    padding: 9px 7px;
    border-radius: 70%;
    width: 10px;
    position: absolute;
    top: 13px;
    border:none;
    height: 10px;
}
.point-span {
    position: absolute!important;
    left: 4px!important;
    top: 2px!important;
    color: #f84f73!important;
    font-weight: bold !important;
    font-size: 11px!important;
    /* padding: 0px; */
    /* border: 1px solid white; */
    /* border-radius: 50%; */
    /* padding: 0px; */
}
.goog-te-gadget {
    font-family: arial;
    font-size: 11px;
    color: #666;
    white-space: nowrap;
    float: left;
}
#google_translate_element .goog-te-gadget-simple span {
    position: inherit !important;
    float: left;
}
.goog-te-gadget-simple {
    background-color: black!important;
    padding: 5px;
}
.point {
    background-color: #ffffff;
    padding: 9px 7px;
    border-radius: 50%;
    width: 10px;
    position: absolute;
    top: 13px;
    border: none;
    height: 10px;
    right: 178px;
}
/*.goog-te-gadget-simple {
    background-color: black!important;
    padding: 5px;
    margin-top: 19px;
}*/
</style>
