@extends('layouts.app')



@section('content')

<div class="shadow verification_body">
        <div class="verification_innerBody">
            <div class="verification">
                <h2>Forgot Password</h2>
                
                
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
                <form action="{{route('forgot_password')}}" method="post" >
                	@csrf
                    <input type="text" class="form-control" id="email" placeholder="Enter Your Email" name="email">
                    @if($errors->has('email'))
                            <span  class="error" >{{$errors->first('email')}}</span>  <br>   
                    @endif
                    <button type="submit" class="btn">Forgot Password</button>
                </form>
            </div>
        </div>
    </div>

 @endsection   
 <style>
   .alert {
    padding: 10px!important;
    margin-bottom: 12px !important;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    float: left;
    width: 100%;
}
.btn
{
  color: #fff!important;
  font-weight: 600!important;
}
.btn:hover
{
  color: white!important;
}
 </style>

