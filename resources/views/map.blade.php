@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="profile_view_left">
            <div class="left_lock shadow wow flipInY" data-wow-delay="0.2s">
                <img src="{{URL::ASSET('images/lock.png')}}"><br />
                <div>Some Girls Choose to Lock Their Some of their Picture for privacy purposes and will only reveal their photos to a Genuine Customers</div>
            </div>
            <p class="profile_left_recent">Recent Profiles</p>
              @if($recent_profile)
              @foreach($recent_profile as $key=>$r)

            <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
                <h3>{{$r->fname}} {{$r->lname}}</h3>
                <h4><img src="{{URL::ASSET('images/pinkpin.png')}}">{{$r->address}}</h4>
                <p><img src="{{URL::ASSET('images/yellowcircle.png')}}">Message Me</p>
                <span class="profile_box_span">Age</span>
                <span class="profile_box_span1">{{$r->age}}</span>
                <a href="{{route('view_profile',$r->id)}}"><img class="profile_box_img" src="{{URL::ASSET('uploaded/user')}}/{{$r->image}}"></a>
            </div>
             @endforeach
            @endif
            <!-- <div class="profile_box shadow wow flipInY" data-wow-delay="0.2s">
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
        <div class="shadow search_box">
            <div class="search_box_left">
                <div>Search Here</div>
                <img src="{{URL::ASSET('images/search.png')}}">
                <p>Map View</p>
            </div>
            <form class="search_form" action="{{route('home_page_search')}}"  >
            <div class="search_request">
                    <input class="search_input1" type="text"  name="name" placeholder="Name" value="{{(session()->has('name'))?session()->get('name'):''}}" >
                    <input class="search_input2"  type="text" name="age" placeholder="Age" value="{{(session()->has('age'))?session()->get('age'):''}}" >
                    <input class="search_input3" type="text" name="to" placeholder="To" value="{{(session()->has('to'))?session()->get('to'):''}}">
                    <input class="search_input4" type="text" name="height" placeholder="Height" value="{{(session()->has('height'))?session()->get('height'):''}}">
                    <input type="text" name="to" placeholder="To" value="{{(session()->has('to'))?session()->get('to'):''}}">
                    <input class="search_input5" type="text" name="location" placeholder="Location" id="location" value="{{(session()->has('location'))?session()->get('location'):''}}">
                    <input type="hidden" name="lat" id="lat" value="{{(session()->has('lat'))?session()->get('lat'):''}}">
                    <input type="hidden" name="lang" id="lang" value="{{(session()->has('lang'))?session()->get('lang'):''}}">
                    <input class="search_input6" type="text" name="within" placeholder="Within" value="{{(session()->has('within'))?session()->get('within'):''}}">
            </div>
            <ul class="checkbox">
                 @if($services)
                  @foreach($services as $key =>$v)
                  @php $search_ser = array(); if(session()->has('services')){  if(session()->get('services')){ $search_ser = explode(',', session()->get('services'));  } }  @endphp 
                   <li  ><input type="checkbox" name="services[]" class="form-check-input" value="{{$v->id}}" {{(in_array($v->id,$search_ser))?'Checked':''}}><div>
                    {{$v->service_name}}</div></li>
                 
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
            <li><button type="submit" class="btn btn-primary" style="background: #f84f73;border-radius: 18px;" >Submit</button></li>
            </ul>
        </form>  
        </div>

        <!-- <img class="location_map" class="shadow" src="{{URL::ASSET('images/map.png')}}"> -->
        <iframe src="{{url('dynamic_map')}}" style="height:600px;" class="shadow search_box"></iframe>
       
        <div class="report_form shadow wow fadeInRight" data-wow-delay="0.2s">
            <p>Hi People, Please Report any fake Profiles, or Technical issues....</p>
            <button>REPORT</button>
        </div>
        @if($top_profile)
        <div class="top_profile shadow wow fadeInRight" data-wow-delay="0.4s">
            <div class="top_profile_leftdiv">
                <h2>TOP PROFILE</h2>
                <a href="{{route('view_profile',$top_profile->id)}}"><img src="{{URL::ASSET('uploaded/user')}}/{{$top_profile->image}}"></a>
            </div>
            <div class="top_profile_middiv">
                <div class="top_profile_middiv1">
                    <h2>{{$top_profile->fname}} {{$top_profile->lname}}</h2>
                    <h3><img src="{{URL::ASSET('images/pinkpin.png')}}">{{$top_profile->address}}</h3>
                    <h5><img src="{{URL::ASSET('images/greencircle.png')}}"> Online</h5>
                    <span><img src="{{URL::ASSET('images/heart.png')}}">20</span>
                    <span><img src="{{URL::ASSET('images/broken_heart.png')}}">1</span>
                    <h4>Recent Comment</h4>
                </div>
                <div class="top_profile_middiv2">
                    <h3>Contact No</h3>
                    <h4>0411xxxxxxx</h4>
                    <h5>Reveal Number</h5>
                </div>
                <div class="top_profile_middiv3">
                    <h3>Anonomus User1</h3>
                    <h4>10-05-19 05:30PM</h4>
                    <h5>This is My Comment for this Profile.</h5>
                </div>
            </div>
            <div class="top_profile_rightdiv">
                <img src="{{URL::ASSET('images/arrow_l.png')}}">
                @if($image_gallery)
                    @foreach($image_gallery as $key => $val)
                      <img class="top_profile_rightdiv_img" src="{{URL::ASSET('uploaded/user')}}/{{$val->name}}">
                    @endforeach 
                @endif

               <!-- 
                <img class="top_profile_rightdiv_img" src="images/kayla1.png">
                
                <img class="top_profile_rightdiv_img" src="images/kayla1.png">
                <img class="top_profile_rightdiv_img" src="images/kayla1.png"> -->
                <img class="top_profile_rightdiv_img1" src="{{URL::ASSET('images/arrow_r.png')}}">
            </div>
            <img class="top_profile_ribbon" src="{{URL::ASSET('images/double_ribbon.png')}}">
        </div>
        @endif
    </div>
@endsection    