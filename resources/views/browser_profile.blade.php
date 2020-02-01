@extends('layouts.app')

@section('content')


    <div class="main browser_main">
       @include('browser_submenu')
        <div id="preview">
            <div class="pre_profile shadow pre_browser">
                <div class="pre_browser_div">
                    <img class="wow bounceInLeft pre_browser_img" data-wow-delay="0.1s" src="{{URL::ASSET('uploaded/user')}}/{{$user->image}}">
                    <div class="pre_browser_divdiv wow bounceInRight" data-wow-delay="0.1s">
                        <img class="pre_browser_divimg" src="{{URL::ASSET('images/comment.png')}}">
                        <a href="{{url('chat')}}" ><p class="chat_comment">Chat Here</p></a>
                        <h3>{{$user->fname}} {{$user->lname}}</h3>
                        <div>
                            <span class="browser_email">Email:</span>
                            <span class="browser_hotmail">{{$user->email}}</span>
                        </div>
                        <div>
                            <span class="browser_email">Age</span>
                            <span class="browser_hotmail">{{$user->age}}</span>
                        </div>
                        <div>
                            <span class="browser_email">Address</span>
                            <span class="browser_hotmail">{{$user->address}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection