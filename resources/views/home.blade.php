@php  use App\Http\Controllers\HomeController;  @endphp
@extends('layouts.app')



@section('content')
<style type="text/css">
    .disable-div{
      pointer-events: none;
          opacity: 0.5;
  
    }
    .search_input6 {
    width: auto!important;
    margin-top: 0px; 
        background-color: transparent;
        margin-right: 32px;
}
.search_input5 {
    width: auto !important;
     margin-top: 0px; 
    margin-right: 55px !important;
    margin-left: 32px;
}
.search_form input, .search_form select {
    margin-bottom: 21px;
}
.p_profile_kayla_span1 {
    float: right;
    margin-left: 0px;
    font-weight: bold;
    font-size: 13.33px;
}
.white
{
  float: left;
}
.ff{
    top: 78px;
    left: 7px;
    position: absolute;
    width: 80px;
}
.btn-primary:hover,.btn-primary:focus
{
      background: #f84f73 !important; 
}

#thumbnail-slider ul li {

  width: auto !important;

}
#thumbnail-slider .thumb {
  opacity: 1;
  width: auto;
 
}
.top_profile_rightdiv_img {
  margin-left: 10px;
  width: auto;
  height: 59px !important;
  max-width: initial;
}
#thumbnail-slider .thumb{
   position: static !important;
}

ul.checkbox li {
   display: -webkit-inline-box;
   float: left;
   margin-left: 10px;
}
.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
   position: relative;
  
   margin-left: 0px;
}
.search_form input, .search_form select {
    width: auto;
   
}
.checkbox {
    margin-top: 0px;
  
}
ul.checkbox li span {
    padding-left: 6px;
}
</style>

    <div class="main container">
        <div class="profile_view_left">
            <div class="left_lock shadow wow flipInY" data-wow-delay="0.2s">
                <img src="images/lock.png"><br />
                <!-- <div>Some Girls Choose to Lock Their Some of their Picture for privacy purposes and will only reveal their photos to a Genuine Customers</div> -->
                <div>@lang('messages.welcome')</div>
            </div>
            <p class="profile_left_recent">Recent Profiles</p>
            @if($recent_profile)
              @foreach($recent_profile as $key=>$r)
            
            <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
                <h3>{{$r->fname}} {{$r->lname}}</h3>
                <!-- <h4><img src="images/pinkpin.png" style="margin-right: 3px;">{{$r->city}}{{(!empty($r->state))?' ,'.$r->state:''}}</h4>  -->     
                <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;color: unset;"><img src="images/pinkpin.png" style="margin-right: 3px;">{{$r->address}}</p>
                <p><img src="images/yellowcircle.png">Message Me</p>
               
            
                <a href="{{route('view_profile',$r->id)}}"><img class="profile_box_img" src="{{URL::ASSET('uploaded/user')}}/{{$r->image}}"></a>

                <div class="age-section">
                 <span class="profile_box_span">Age</span>
                 <span class="profile_box_span1">{{$r->age}}</span>
                </div>

            </div>
             @endforeach
            @endif
            <!-- <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
                <h3>Kayla Smith</h3>
                <h4><img src="images/pinkpin.png">Holden Hill</h4>
                <p><img src="images/yellowcircle.png">Message Me</p>
                <img class="profile_box_img" src="images/kayla.png">
                <span class="profile_box_span">Age</span>
                <span class="profile_box_span1">20-25</span>
            </div>
            <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
                <h3>Kayla Smith</h3>
                <h4><img src="images/pinkpin.png">Holden Hill</h4>
                <p><img src="images/yellowcircle.png">Message Me</p>
                <img class="profile_box_img" src="images/kayla.png">
                <span class="profile_box_span">Age</span>
                <span class="profile_box_span1">20-25</span>
            </div> -->
        </div>
        <div class="shadow search_box">
            <div class="search_box_left">
                <div>Search Here</div>
                <img src="images/search.png">
                <a href="{{url('map')}}" ><p>Map View</p></a>
            </div>
            <form class="search_form" id="search_form" action="{{route('home_page_search')}}" onsubmit="return false;"  >
            <div class="search_request">
                    <input class="search_input1 search_req" id="search_name" type="text"  name="name" placeholder="Name" value="{{(session()->has('name'))?session()->get('name'):''}}" >
                    <input class="search_input2 search_req" id="search_age"  type="text" name="age" placeholder="Age"  >
                    <input class="search_input3 search_req" type="text" name="to_age" placeholder="To" id="search_to_age" >
                    <input class="search_input4 search_req" type="text" name="height" placeholder="Height" id="search_height" >
                    <input type="text" name="to_height" placeholder="To" id="search_to_height" class="search_req">
                    <input class="search_input5 " type="text" name="location" placeholder="Location" id="location" style=" " value="{{(session()->has('location'))?session()->get('location'):''}}">
                    <input type="hidden" name="lat" id="lat" value="{{(session()->has('lat'))?session()->get('lat'):''}}" class="search_req">
                    <input type="hidden" name="lang" id="lang" value="{{(session()->has('lang'))?session()->get('lang'):''}}" class="search_req">
                    <!-- <input class="search_input6" type="text" name="within" placeholder="Within" value=""> -->
                    @php $withkm = (session()->has('within'))?session()->get('within'):''; @endphp
                    <select class="search_input6 search_req" id="search_within" name="within" style="margin-top: 7px;" >
                        <option value=""  >Select km</option>
                        <option value="1" {{($withkm == '1')?'Selected':''}}>1 km</option>
                        <option value="2" {{($withkm == '2')?'Selected':''}} >2 km</option>
                        <option value="4" {{($withkm == '4')?'Selected':''}} >4 km</option>
                        <option value="5" {{($withkm == '5')?'Selected':''}} >5 km</option>
                        <option value="10" {{($withkm == '10')?'Selected':''}} >10 km</option>
                    </select>  

                    <select class="search_input6 search_req" id="search_ethincity" name="ethincity" style=" margin-top:7px;margin-right: 32px;" >
                        <option value=""  >Select Ethincity</option>
                        <option value="White" >White</option>
                        <option value="Red Neck" >Red Neck</option>
                    </select>  
            </div>
            <ul class="checkbox">
                 @if($services)
                  @foreach($services as $key =>$v)
                  @php $search_ser = array(); if(session()->has('services')){  if(session()->get('services')){ $search_ser = explode(',', session()->get('services'));  } }  @endphp 
                   <li  ><input type="checkbox" name="services[]" class="form-check-input search_req check_search_services" value="{{$v->id}}" {{(in_array($v->id,$search_ser))?'Checked':''}}>
                    <span>
                    {{$v->service_name}}</span></li>
                 
                  @endforeach
                 @endif
            <!-- 
                <li><img src="images/checkbox.png" /><div>BD</div></li>
                <li><img src="images/checkbox.png" /><div>ST</div></li>
                <li><img src="images/checkbox.png" /><div>CBJ</div></li>
                <li><img src="images/checkbox.png" /><div>BBBJ</div></li>
                <li><img src="images/checkbox.png" /><div>DEEP T</div></li>
                <li><img src="images/checkbox.png" /><div>GF Exp</div></li>
                <li><img src="images/checkbox.png" /><div>test</div></li>
                <li><img src="images/checkbox.png" /><div>test1</div></li> -->
            <li>
 <button type="button" class="btn btn-primary" style="background: #f84f73;border-radius: 18px;" id="reset_search" >Reset Search</button></li>
            </ul>

        </form>                
        </div>
        <div class="report_form shadow wow fadeInRight" data-wow-delay="0.2s">
            <p>{{$admin->report_txt}}</p>
            <a href="{{url('report')}}" ><button>REPORT</button></a>
        </div>
        <span  id="top-profile-content" >
        @if($top_profile)
        <div class="top_profile shadow wow fadeInRight" data-wow-delay="0.4s">
            <div class="top_profile_leftdiv">
                <h2>TOP PROFILE</h2>
                <a href="{{route('view_profile',$top_profile->id)}}"><img src="{{URL::ASSET('uploaded/user')}}/{{$top_profile->image}}"></a>
            </div>
            <div class="top_profile_middiv">
                <div class="1st">
                <div class="top_profile_middiv1">
                    <h2>{{$top_profile->fname}} {{$top_profile->lname}}</h2>
                    @php 
                    $count_ = HomeController::count_comments_complaint($top_profile->id);
                    $recent_comment = HomeController::recent_comment($top_profile->id);
                      @endphp
                    <h3><img src="images/pinkpin.png" style="margin-right: 3px;">{{$top_profile->address}}</h3>
                    @if($top_profile->live_status == 'ON')    
                    <!-- <h5><i class="fa fa-circle" aria-hidden="true"></i> Online</h5> -->
                    @else
                    <!-- <h5 style="color: #000;" ><i class="fa fa-circle" aria-hidden="true"></i>ofline</h5> -->
                    @endif
                    <span><img src="images/heart.png">{{$count_['comment']}}</span>
                    <span><img src="images/broken_heart.png">{{$count_['complaint']}}</span>
                    <h4>Recent Comment</h4>
                </div>
                 <div class="top_profile_middiv3">
                   @if($recent_comment) 
                    <h3>{{$recent_comment->fname}} {{$recent_comment->lfname}}</h3>
                    <h4>{{date('Y-m-d h:i A',strtotime($recent_comment->created_at))}}</h4>
                    <h5 style="white-space: nowrap;width: 170px;overflow: hidden;text-overflow: ellipsis;">{{$recent_comment->comment}}</h5>
                   @else
                    <h5>No recent comment found</h5>
                   @endif
                </div>

            </div>
               
               
            </div>
 <div class="top_profile_middiv2">
                    <h3>Contact No</h3>
                    <h5><span class="reveal-no" style="display:none;">{{$top_profile->mobile_no}}</span><span class="reveal-no-text pointer" data-id="{{$top_profile->id}}"  >Reveal Number</span></h5>
                </div>


         <!--   <div class="top_profile_rightdiv">
                <img src="images/arrow_l.png">
                @if(count($image_gallery))
                    @foreach($image_gallery as $key => $val)
                      <img class="top_profile_rightdiv_img img-thumbnail img-thumbnail" src="{{URL::ASSET('uploaded/user/gallery')}}/{{$val->name}}">
                    @endforeach 
                @endif 
                <img class="top_profile_rightdiv_img1 " src="images/arrow_r.png">
            </div>   -->         

            <div class="top_profile_rightdiv">
                     <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                @if(count($image_gallery))
                    @foreach($image_gallery as $key => $val)
                     <li>
                       <a class="thumb">
                      <img class="top_profile_rightdiv_img img-thumbnail img-thumbnail" src="{{URL::ASSET('uploaded/user/gallery')}}/{{$val->name}}">
                       </a>
                        </li>
                    @endforeach 
                @endif 
             </ul>
                </div>
            </div>
          </div>
    
            @if($top_profile->account_verification) 
            <img class="top_profile_ribbon" src="images/double_ribbon.png">
            @else
            <img class="top_profile_ribbon" src="images/featured1.png">
            @endif
        </div>
        @endif 
    </span>

        <div class="profile_container"   id="dynamic-profile-container">
        @if(count($profile))   
          @foreach($profile as $key =>$v) 
           @php $count_ = HomeController::count_comments_complaint($v->id);
             $date = date('Y-m-d H:i:s');
           if($v->live_status == 'Pause' && $v->live_expiry >= $date){
             continue;
            }  

           @endphp

            <div class="p_profile shadow wow flipInY @if($v->live_status == 'Pause') disable-div @endif" data-wow-delay="0.4s">
                <h3 class="@if($v->account_verification) @if($date < $v->feature_profile ) kayla_pinkbar @endif @elseif($date < $v->feature_profile)  kayla_pinkbar @endif">{{$v->fname}} {{$v->lname}}</h3>
                 <div class="p_profile_div_btm">  
                    <h4  id="recent-online-{{$v->id}}" class="offline-user" ><i class="fa fa-circle" aria-hidden="true"></i><span>Offline</span></h4>
                    <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><img src="images/pinkpin.png" style="margin-right: 3px;">{{$v->address}} <!-- @if($v->address),@endif{{(!empty($v->state))?''.$v->state:''}} --></p>
                    <a href="{{route('view_profile',$v->id)}}" ><img class="p_profile_kayla_png" src="{{URL::ASSET('uploaded/user')}}/{{$v->image}}"></a>
                    <div>
                        <h5>${{$v->damage}}<span><img src="images/heart.png">{{$count_['comment']}}<img class="broken_heart_png" src="images/broken_heart.png">{{$count_['complaint']}}</span></h5>
                    </div>
                    <div class="white">
                      <div class="uu">
                        <span class="p_profile_kayla_span">Ethnicity</span>
                        <span class="p_profile_kayla_span1">@if($v->ethincity){{$v->ethincity}} @else &nbsp;&nbsp; @endif</span>
                   </div>
                   <div class="uu">
                        <span class="p_profile_kayla_span">Age</span>
                        <span class="p_profile_kayla_span1">{{$v->age}}</span>
                      </div>
                    </div>
                </div>

                @if($v->account_verification)  
                @if($date < $v->feature_profile ) 
                <div class="p_profile_kayla_pink_btm"></div>
                <img  class="p_profile_double" src="images/double_ribbon1.png">
                @else
                 <img  class="p_profile_double" src="images/verified.png">
                @endif
                @elseif($date < $v->feature_profile )
                <div class="p_profile_kayla_pink_btm"></div>
                <img  class="p_profile_double ff" src="images/featured22.png">
                @endif
                </div>
          @endforeach  
        @endif  
            </div>

    </div>

@endsection
<style>
.age-section
{
    display:block;
}    
    </style>


@section('script')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyACWUZ9OL8BQVQC-4cSsSFmEo71SLDzvlk&libraries=places&language=en"></script>
<script type="text/javascript">

function SearchForm(){

   return false;
}




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
            
             $('#lat').val(lat1);
             $('#lang').val(long1);
           
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
            });
});  




$("body").on('click','.reveal-no-text',async function(){
   $(this).hide();
   $(this).siblings('.reveal-no').show();
     try{
      var _token = '{{csrf_token()}}';
      var type = 'static';
      var  id= $(this).data('id');
      var  user_id = $(this).data('id');

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
       
                            console.log(json);   

                        }catch(err) {
                           console.log(err);
                           toastr.error("Problem connecting URL");
                        }

});

   $('body').on('click','.states_data',function(){
     var val = $(this).data("id");
      var date = '{{date("Y-m-d H:i")}}';
        if(val == ''){
          toastr.info("Please Select State");
          return false;
        } 
        
        var _token = '{{csrf_token()}}';

        $.ajax({
          type:"POST",
          url: '{{route("fetch_state")}}',
          data: {'val':val,'_token':_token},
           success:function(res){  
           console.log(res);      
             if(res.result){
        if(res.top_profile){
         var image_gallery = '';

         if(res.image_gallery){
             $.each(res.image_gallery, function () {
              image_gallery += ` <img class="top_profile_rightdiv_img img-thumbnail" src="{{URL::ASSET('uploaded/user/gallery')}}/${this.name}">`;
                });
         }
         var recent_comment = `<h5>No recent comment found</h5>`;
         if(res.recent_comment){
             recent_comment = `
                    <h3>${res.recent_comment.fname} ${res.recent_comment.lname}</h3>
                    <h4>${res.recent_comment.created_at}</h4>
                    <h5>${res.recent_comment.comment}</h5>`;
         }
         var feature_icon = 'images/double_ribbon.png';
         if(res.top_profile.account_verification == '0'){

         var feature_icon = 'images/featured1.png';
         }

            var online = `<h5><i class="fa fa-circle" ></i> Online</h5>`;
            if(res.top_profile.live_status != 'ON'){
             online = `<h5 style="color:#000;" ><i class="fa fa-circle" ></i> Offline</h5>`;
            }
            online = "";
 
              var top_profile_html = ` <div class="top_profile shadow wow fadeInRight" data-wow-delay="0.4s">
            <div class="top_profile_leftdiv">
                <h2>TOP PROFILE</h2>
                <a href="{{url('view_profile')}}/${res.top_profile.id}"><img src="{{URL::ASSET('uploaded/user')}}/${res.top_profile.image}"></a>
            </div>
            <div class="top_profile_middiv">
                <div class="1st">
                <div class="top_profile_middiv1">
                    <h2>${res.top_profile.fname}  ${res.top_profile.fname}</h2>
                    <h3><img src="images/pinkpin.png" style="margin-right: 3px;">${res.top_profile.address}</h3>
                    ${online}
                    <span><img src="images/heart.png">${res.top_profile.comment}</span>
                    <span><img src="images/broken_heart.png">${res.top_profile.complaint}</span>
                    <h4>Recent Comment</h4>
                </div>
                 <div class="top_profile_middiv3">
                 ${recent_comment}
                </div>

            </div>
               
               
            </div>
 <div class="top_profile_middiv2">
                    <h3>Contact No</h3>
                    <h5><span class="reveal-no" style="display:none;">${res.top_profile.mobile_no}</span><span class="reveal-no-text pointer" data-id="${res.top_profile.id}"  >Reveal Number</span></h5>
                </div>


           <div class="top_profile_rightdiv">
                <img src="images/arrow_l.png">
                ${image_gallery}
                <img class="top_profile_rightdiv_img1 " src="images/arrow_r.png">
            </div>
            <img class="top_profile_ribbon" src="${feature_icon}">
        </div>`; 
        $("#top-profile-content").empty();
        $("#top-profile-content").append(top_profile_html);
          }else{
             $("#top-profile-content").empty();
          }


          $("#dynamic-profile-container").empty();
          var profile ='';
          $.each(res.profile,async function(){
           var p_online = `<h4 id="recent-online-${this.id}" class="offline-user" ><i class="fa fa-circle"></i><span>Offline</span></h4>`;
           var ts_f  = await CheckUserExistance(this.id);
           var pointer = '';
           if(ts_f){
             p_online = `<h4 id="recent-online-${this.id}" class="online-user" ><i class="fa fa-circle"></i><span>Online</span></h4>`;
           }
            if(this.live_status != 'ON' ){
             pointer = 'disable-div';

            }
           var  feature_profile_ico = ''
           var profile_pink_btm = ``;
           var profile_pink_top = ``;
            if(date < this.feature_profile){
                if(this.account_verification == '1'){
                  feature_profile_ico = `<img  class="p_profile_double" src="images/double_ribbon1.png">`;

                  }else{

                  feature_profile_ico = `<img  class="p_profile_double" src="images/featured22.png">`;
                  }
              profile_pink_btm = `<div class="p_profile_kayla_pink_btm"></div>`;
              profile_pink_top = `kayla_pinkbar`;
            }else if(this.account_verification){
              feature_profile_ico = `<img  class="p_profile_double" src="images/verified.png">`;   
            }
             
            if(!this.ethincity){
               this.ethincity = "         ";
            }               
            profile =`<div class="p_profile shadow ${pointer} wow flipInY" data-wow-delay="0.4s">
                <h3 class="${profile_pink_top}">${this.fname} ${this.lname}</h3>
                <div class="p_profile_div_btm">
                    ${p_online}
                    <p><img src="images/pinkpin.png" style="margin-right: 3px;">${this.city} ,${this.state}</p>
                    <a href="{{url('view_profile')}}/${this.id}" ><img class="p_profile_kayla_png" src="{{URL::ASSET('uploaded/user')}}/${this.image}"></a>
                    <div>
                        <h5>${this.damage}<span><img src="images/heart.png">${this.comment}<img class="broken_heart_png" src="images/broken_heart.png">${this.complaint}</span></h5>
                    </div>
                    <div class="uu">
                        <span class="p_profile_kayla_span">Ethnicity</span>
                        <span class="p_profile_kayla_span1">${this.ethincity}</span>
                    </div>
                    <div class="uu" >
                        <span class="p_profile_kayla_span">Age</span>
                        <span class="p_profile_kayla_span1">${this.age}</span>
                    </div>
                </div>
                 ${profile_pink_btm}
                 ${feature_profile_ico}
            </div>`;
            $('#dynamic-profile-container').append(profile);

          });



              }else{
           
             toastr.info(res.message);
              }  
          
          },            
          error:function(response){                
             toastr.success(response);
          },          
      }).then(function(){
         // window.location.href = ''; 
      }); 


    });  




   $('body').on('change','.search_req',function(){
     var date = '{{date("Y-m-d H:i")}}';
    
     var name =$('#search_name').val();
     var age =$('#search_age').val();
     var to_age =$('#search_to_age').val();
     var height =$('#search_height').val();
     var to_height =$('#search_to_height').val();
     var within =$('#search_within').val();
     var lat =$('#lat').val();
     var lang =$('#lang').val();
     var ethincity =$('#search_ethincity').val();

     
      var services = [];
        $.each($(".check_search_services:checked"), function(){
            services.push($(this).val());
        });
    
        var _token = '{{csrf_token()}}';

        $.ajax({
          type:"POST",
          url: '{{route("ajax_search_profile")}}',
          data: {'name':name,'age':age,'to_age':to_age,'height':height,'to_height':to_height,'within':within,'lat':lat,'lang':lang,'services':services,'ethincity':ethincity,'_token':_token},
           success:function(res){ 
                 if(res){

                      $("#dynamic-profile-container").empty();
                      var profile ='';
                      $.each(res,async function(){
                       var p_online = `<h4 id="recent-online-${this.id}" class="offline-user" ><i class="fa fa-circle"></i><span>Offline</span></h4>`;
                       var ts_f  = await CheckUserExistance(this.id);
                       var pointer = '';
                       if(ts_f){
                         p_online = `<h4 id="recent-online-${this.id}" class="online-user" ><i class="fa fa-circle"></i><span>Online</span></h4>`;
                       }
                        if(this.live_status != 'ON' ){
                         pointer = 'disable-div';

                        }

                        if(!this.ethincity){
                           this.ethincity = "         ";
                        }  
                       var  feature_profile_ico = ''
                       var profile_pink_btm = ``;
                       var profile_pink_top = ``;
                        if(date < this.feature_profile){
                          if(this.account_verification == '1'){
                          feature_profile_ico = `<img  class="p_profile_double" src="images/double_ribbon1.png">`;

                          }else{

                          feature_profile_ico = `<img  class="p_profile_double" src="images/featured22.png">`;
                          }

                          profile_pink_btm = `<div class="p_profile_kayla_pink_btm"></div>`;
                          profile_pink_top = `kayla_pinkbar`;
                        }else if(this.account_verification){
                          feature_profile_ico = `<img  class="p_profile_double" src="images/verified.png">`;   
                        }
                   
                        profile =`<div class="p_profile shadow ${pointer} wow flipInY" data-wow-delay="0.4s">
                            <h3 class="${profile_pink_top}">${this.fname} ${this.lname}</h3>
                            <div class="p_profile_div_btm">
                                ${p_online}
                                <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><img src="images/pinkpin.png" style="margin-right: 3px;">${this.address}</p>
                                <a href="{{url('view_profile')}}/${this.id}" ><img class="p_profile_kayla_png" src="{{URL::ASSET('uploaded/user')}}/${this.image}"></a>
                                <div>
                                    <h5>${this.damage}<span><img src="images/heart.png">${this.comment}<img class="broken_heart_png" src="images/broken_heart.png">${this.complaint}</span></h5>
                                </div>
                                <div class="uu">
                                    <span class="p_profile_kayla_span">Ethnicity</span>
                                    <span class="p_profile_kayla_span1">${this.ethincity}</span>
                                </div>
                                <div class="uu">
                                    <span class="p_profile_kayla_span">Age</span>
                                    <span class="p_profile_kayla_span1">${this.age}</span>
                                </div>
                            </div>
                             ${profile_pink_btm}
                             ${feature_profile_ico}
                        </div>`;

                        $('#dynamic-profile-container').append(profile);

                      });
                 }  

              },            
          error:function(response){                
             toastr.success(response);
          },          
      }).then(function(){
         // window.location.href = ''; 
      }); 


    }); 

$("body").on('click','#reset_search',function(){
    
    document.getElementById("search_form").reset();
});



</script>
@endsection
<style type="text/css">
    .p_profile {
  
    height: 290px !important;
    
}
.uu
{
  float: left;
  width: 100%;
}
.p_profile_kayla_span1 {
    float: right;
    margin-left: 0px; 
    font-weight: bold;
    font-size: 13.33px;

</style>