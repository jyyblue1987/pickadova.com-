@extends('layouts.app')



@section('content')

<div class="shadow verification_body">
        <div class="verification_innerBody">
            <div class="verification">
                <h2>Change Password</h2>
                
                
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
                <form action="" method="post" >
                	@csrf
                    <input type="text" class="form-control" id="cur_Password" placeholder="Current Password" name="current_password">
                    @if($errors->has('current_password'))
                            <span  class="error" >{{$errors->first('current_password')}}</span>  <br>   
                    @endif
                    <input type="text" class="form-control" id="Password" placeholder="New Password" name="new_password">
                    @if($errors->has('new_password'))
                            <span  class="error" >{{$errors->first('new_password')}}</span>  <br>   
                    @endif
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="confirm_password">
                    @if($errors->has('confirm_password'))
                            <span  class="error" >{{$errors->first('confirm_password')}}</span>  <br>   
                    @endif
                    <button type="submit" class="btn">Change Password</button>
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
 </style>