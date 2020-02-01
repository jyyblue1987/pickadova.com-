@extends('layouts.app')



@section('content')

<div class="shadow verification_body">
        <div class="verification_innerBody">
            <div class="verification">
                <h2>Email Verification</h2>
                
                
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
                <span>{{$email}}</span><br>
                <span id="resend-verification-code" style="color: #000; cursor: pointer;"  > Resend Verififcation Code</span>
                <form action="{{route('user_verification')}}" method="post" >
                	@csrf
                	<input type="hidden" name="id" value="{{$id}}">
                    <input type="text" class="form-control" id="email" placeholder="Enter Verification Code" name="verifciation_code">
                    <button type="submit" class="btn">Verify</button>
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
<script type="text/javascript">
  
$("body").on('click','#resend-verification-code',function(){
    
    var id = '{{$id}}';
    var email = '{{$email}}';
    var _token = '{{csrf_token()}}';
     var tag = $(this);
       tag.hide();
     $.ajax({
            type:"POST",
            url: '{{route("resend_verification")}}',
            data: {'id':id,'email':email,'_token':_token},
             success:function(res){        
            console.log(res);
               if(res.result){

                 
                 toastr.success(res.message);
              }else{
                 toastr.info(res.message);
            
              }  
            
            },            
            error:function(response){
            toastr.error(response);                
            },          
        }).then(function(){     
         tag.show();
        
        });


})


</script>
 @endsection   