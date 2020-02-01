@extends('layouts.app')

@section('content')



    <div class="main browser_main">
       @include('browser_submenu')
        <div id="preview">
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
            <div class="pre_profile shadow pre_browser">
                <div class="pre_browser_div">
                    <img class="wow bounceInLeft pre_browser_img" data-wow-delay="0.1s" src="{{URL::ASSET('uploaded/user')}}/{{$user->image}}"style="margin-bottom: 6px;">
                         <button type="button" class="btn red_btn">Change Profile Picture</button>
                        <input type="file" id="profile-image-upload"  style="margin-top: -29px;
    margin-bottom: 9px;
    opacity: 0;" accept="image/*" >
                    <br>
               

       <div id="uploaded_image"></div>
                      <!--   <button type="button" class="btn red_btn">Change Profile Picture</button>
                        <input type="file" id="profile-image-upload"  style="opacity: 0;top: 214px;position: absolute;" accept="image/*" > -->
                    <div class="pre_browser_divdiv wow bounceInRight" data-wow-delay="0.1s">
                     <form action="" method="post" onsubmit="return false;" id="profile-form">   
                        @csrf
                        <img class="pre_browser_divimg" src="{{URL::ASSET('images/comment.png')}}">
                        
                        <a href="{{url('chat')}}" ><p class="chat_comment">Chat Here</p></a>
                        <button type="button" class="btn red_btn"  data-toggle="modal" data-target="#change-email">Change Email</button>
                        <h3>{{$user->fname}} {{$user->lname}}</h3>
                        <div>
                            <span class="browser_email">Email:</span>
                            <span class="browser_hotmail"> <input type="text"  value="{{$user->email}}" readonly></span>
                        </div>
                        <div>
                            <span class="browser_email">Address*</span>
                            <span class="browser_hotmail"> <input type="text" id="location" name="address" value="{{$user->address}}" required></span>
                               <input type="hidden" name="lat" id="lat" value="{{$user->lat}}">
                            <input type="hidden" name="lang" id="lang" value="{{$user->lang}}">
                        </div>
                        <div>
                            <span class="browser_email">Age</span>
                            <span class="browser_hotmail"> <input type="number" name="age" value="{{$user->age}}" required></span>
                        </div>
                        <div>
                            <span class="browser_email">Mobile No.</span>
                            <span class="browser_hotmail"> <input type="number" name="mobile_no" value="{{$user->mobile_no}}" required></span>
                        </div>
                        <div>
                           <button type="submit" class="btn red_btn pull-right" >Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
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
@endsection
@section('script')

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyACWUZ9OL8BQVQC-4cSsSFmEo71SLDzvlk&libraries=places&language=en"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js" ></script>
<script type="text/javascript" src="{{URL::ASSET('js/exif.js')}}" ></script>




<script type="text/javascript">
        $(function(){
    var options1 = 
             {
             componentRestrictions: {country: "IN"}
             };
         
             var input1 = document.getElementById('location');
             var autocomplete1 = new google.maps.places.Autocomplete(input1, options1);
             google.maps.event.addListener(autocomplete1, 'place_changed', function() 
             {
             var place1 = autocomplete1.getPlace();
             var lat1 = place1.geometry.location.lat();
             var long1 = place1.geometry.location.lng();
             $('#lat').val(lat1);
             $('#lang').val(long1);
            });
});  


         $("#profile-form").validate({
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
                                 location.href=''; 
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
                           var response= await fetch('',{
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


</script>
@endsection
<style type="text/css">
  .croppie-container .cr-slider-wrap
  {
    display: none;
  }
</style>