@extends('layouts.app')


@section('content')
<style type="text/css">
    .error-border{
        border: 1px solid red !important;
    }
    .btn-primary:focus {
      color: #fff;
      background-color:  #f84f73   !important;
      }

@media screen and (max-width: 1920px){

.navbar_btm {
padding-left: 0%!important;
}
.gallery_modal_content_unlocked {
width: 900px;
}
}
@media screen and (min-width: 1440px){

.navbar_btm {
padding-left: 0%!important;
}
.gallery_modal_content_unlocked {
width: 900px;
}
}
</style>
 <div class="shadow sign-btn-group">
        <ul class="nav nav-tabs">
            <li class="active" ><a id="signup-tab" data-toggle="tab" href="#home">Sign Up</a></li>
            <li  ><a  id="signin-tab" data-toggle="tab" href="#menu1">Sign In</a></li>
        </ul>
    
        <div class="tab-content sing-tab-content">
            <div id="home" class="tab-pane fade in active">
                <h2 class="sign-create">Create Your Account</h2>
                <p class="sign-select">Please Select Account Type</p>
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
                <form action="{{route('user_signup')}}"  method="post" id="login-form"  >
                    @csrf
                    <input type="hidden" name="lat" value="{{old('lat')}}" id="lat">
                    <input type="hidden" name="lang" value="{{old('lang')}}" id="lang">
                    <input type="hidden" name="city" value="{{old('city')}}" id="city_name">
                    <div class="form-group">
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="type" value="Advertise"  @if(old('type') == 'Advertise' ) checked @endif required=""> 
                            </label><span class="form-check-label-l"> Advertise</span>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="type" value="Browser"   @if(old('type') == 'Browser' ) checked @endif required="" > 
                            </label><span class="form-check-label-l"> Browser</span>
                            @if ($errors->has('type'))<br> <span class="error" >Please select account type</span> @endif
                        </div>
                        <input type="text" class="form-control sign-firstName @if($errors->has('fname')) error-border @endif " id="fname" placeholder="First name*" name="fname" value="{{old('fname')}}"  required="">
                        <input type="text" class="form-control sign-lastName @if ($errors->has('lname')) error-border @endif" id="lname" placeholder="Last Name*" name="lname" value="{{old('lname')}}" required>
                        <input type="email" class="form-control sign-email @if ($errors->has('email')) error-border @endif" id="email" placeholder="Enter email" name="email" value="{{old('email')}}" required>
                        <input type="password" class="form-control sign-email @if ($errors->has('password')) error-border @endif" id="pwd" placeholder="Enter password" name="password" required>
                        <input type="text" class="form-control sign-email @if ($errors->has('address')) error-border @endif"  id="location" placeholder="Suburb*" name="address" value="{{old('address')}}" required>
                        <!-- <input type="text" class="form-control sign-email @if($errors->has('state')) error-border @endif"  id="state_name" placeholder="State*" name="state" value="{{old('state')}}"> -->
                        <select  class="form-control sign-email @if($errors->has('state')) error-border @endif" id="state_name" name="state" required>
                                 <option value="" >Select State</option>               
                                @foreach($states as $key =>$val)
                                  <option value="{{$val->short_name}}" >{{$val->short_name}}</option>  
                                @endforeach
                        </select>
                        <label class="form-check-label sign-form-label">
                          <input class="form-check-input @if ($errors->has('remember')) error-border @endif" type="checkbox" name="remember" required>
                        </label>
                        <span class="sign-span">I accept the <a href="{{url('terms_and_condition')}}">Terms and Conditions</a></span>
                    </div>
                    <button type="submit" class="btn btn-primary sign-btn-signUp">Sign Up</button>
                </form>
            </div>
            <div id="menu1" class="tab-pane fade sign-menu">
                <h2>Log In</h2>

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
                <form action="{{route('signin')}}"  method="post" id="signup-form"  >
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control sign-emailAddress" id="email" placeholder="Email Address*" name="email" >
                        <input type="password" class="form-control" id="pwd" placeholder="Password*" name="password">
                        <a href="{{route('forgot_password')}}">Forgot your password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary login-btn">Login</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyACWUZ9OL8BQVQC-4cSsSFmEo71SLDzvlk&libraries=places&language=en"></script>
    <script>
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
                  $('#city_name').val(addr[i].short_name);
              }
            }
             $('#lat').val(lat1);
             $('#lang').val(long1);
            });
});  

$(document).ready(function(){
   
    var url_string = window.location.href; //window.location.href
    var url = new URL(url_string);
    var c = url.searchParams.get("tab");
     
     if(typeof c !== 'undefined'){
        if(c == 'sign-in'){
          
            $('#signin-tab').click();
        }else{
            $('#signup-tab').click();
        }
     }

});

</script>
@endsection
<style type="text/css">
  

</style>