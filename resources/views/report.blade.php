@extends('layouts.app')



@section('content')
@php  $user = Auth::user();  @endphp 
<div class="shadow verification_body">
        <div class="verification_innerBody">
            <div class="verification">
                <h2 style="margin-bottom: 20px;">Report</h2>
                
                
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
                <form action="{{route('report')}}"  method="post" >
                	@csrf
                  <input type="hidden" name="token" id="token"  >
                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" value="{{(Auth::user())?Auth::user()->fname.' '.Auth::user()->lname:''}}" >
                    @if($errors->has('name'))
                            <span  class="error" >{{$errors->first('name')}}</span>  <br>   
                    @endif
                    <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" value="{{(Auth::user())?Auth::user()->email:''}}" >
                    @if($errors->has('email'))
                            <span  class="error" >{{$errors->first('email')}}</span>  <br>   
                    @endif
                    <select class="form-control" name="title" style="margin-bottom: 20px;"  >
                    	<option value=""  >Select Title</option>
                    	<option value="Technical Issue"  >Technical Issue</option>
                    	<option value="Fake Profile"  >Fake Profile</option>
                    	<option value="Feedback"  >Feedback</option>
                    </select>
                    @if($errors->has('title'))
                            <span  class="error" >{{$errors->first('title')}}</span>  <br>   
                    @endif
                    <textarea class="form-control" name="report" placeholder="Enter Your Report here" rows="5" style="margin-bottom: 20px;"   ></textarea>
                    @if($errors->has('report'))
                            <span  class="error" >{{$errors->first('report')}}</span>  <br>   
                    @endif
                    	
                    </textarea>
                    <button type="submit" class="btn" style="margin-bottom: 20px;">Submit</button>
                </form>
            </div>
        </div>
    </div>
   
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
 @endsection
 @section('script')
<script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHA_SITE_KEY')}}
"></script>

<script type="text/javascript">
  
$(document).ready(function(){

grecaptcha.ready(function() {
    grecaptcha.execute('{{env("RECAPTCHA_SITE_KEY")}}', {action: 'report'}).then(function(token) {
         $('#token').val(token);
    });
});
  

});



</script>

 @endsection