@extends('admin.layouts.app')

@section('content')

   <section class="content">
            <div class="page-heading">
                <h1>User Detail</h1>
            </div>
            <div class="page-body">
                <div class="row clearfix">
                    <!-- User Image -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">USER IMAGE</div>
                            <div class="panel-body">
                                <div class="align-center">
                                    <img src="{{URL::ASSET('uploaded/user/')}}/{{$user->image}}" class="img-circle m-b-10" height="100" width="100" alt="User Avatar" />
                                    <div class="font-15 font-bold">{{$user->fname}} {{$user->lname}}</div>
                                    <button class="btn btn-sm btn-default m-t-25" onclick="$('.js-image-upload').click();">
                                        <i class="fa fa-upload font-15 m-r-5"></i>Upload New Image
                                    </button>
                                </div>
                                <input type="file" class="js-image-upload form-control hide" id="profile-image-upload"  accept="image/*" />
                                <div id="uploaded_image"></div>
                            </div>
                        </div>

                    </div>
                    <!-- #END# User Image -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active">
                                    <a href="#generalinfo" role="tab" data-toggle="tab">
                                        <i class="fa fa-bars m-r-5"></i>GENERAL INFO
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#socialinfo" role="tab" data-toggle="tab">
                                        <i class="fa fa-share-square-o m-r-5"></i> SOCIAL INFO
                                    </a>
                                </li> -->
                            </ul>
                            <div class="tab-content">
                                <!-- General Info -->
                                <div class="active tab-pane fade in" id="generalinfo">
                                   <form class="form-horizontal" action="" method="post" onsubmit="return false;" id="profile-form">
                                    <div class="form-group">
                                        @csrf
                                        <label class="col-sm-2 control-label">First Name </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="fname" value="{{$user->fname}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Last Name </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="lname" value="{{$user->lname}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" value="{{$user->email}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Age</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="age" value="{{$user->age}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Mobile No.</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="mobile_no" value="{{$user->mobile_no}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" value="{{$user->address}}" id="location" required />

                                            <input type="hidden" name="lat" id="lat" value="{{$user->lat}}">
                                            <input type="hidden" name="lang" id="lang" value="{{$user->lang}}">
                                            <input type="hidden" name="state" id="state_name" value="{{$user->state}}">

                                         <input type="hidden" name="city" id="city_name" value="{{$user->city}}" required ></div>
                                        
                                    </div>
                                      <div class="form-group" style="display: none;">
                          @if($customfield)
                               

                               @foreach($customfield as $key =>$val)
                                <div>
                                    @if($val->input_type == 'select')
                                    <p>{{$val->label}} @if($val->required) * @endif </p>
                                       @php $option = json_decode($val->option);  @endphp 
                                       <select name="custom[{{$val->id}}]"  @if($val->required) required @endif >
                                                <option value="{{($val->value)?$val->value:''}}" >{{($val->value)?$val->value:'Select Option'}}</option>
                                        @if($option)
                                             @foreach($option as $key =>$o) 
                                                <option value="{{$o}}">{{$o}}</option>
                                             @endforeach 
                                        @endif
                                       </select>
                                    @endif
                                </div> 

                               @endforeach 

                            @endif
                          </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <a href="{{url('admin/users')}}" class="btn btn-default pull-right" >Cancel</a>
                                            <button type="submit" class="btn btn-success pull-right" >Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <!-- #END# General Info -->
                                <!-- Social Info -->
                                <div class="tab-pane fade" id="socialinfo">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="social_facebook" value="https://facebook.com/username" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Twitter</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="social_twitter" value="https://twitter.com/username" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Google Plus</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="social_googleplus" value="https://google-plus.com/username" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">LinkedIn</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="social_linkedin" value="https://linkedin.com/username" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">YouTube</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="social_youtube" value="https://youtube.com/username" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">GitHub</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="social_github" value="https://github.com/username" required />
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Social Info -->
                            </div>
                          <!--   <div class="align-right m-t-15">
                                <button class="btn btn-sm btn-success">
                                    <i class="fa fa-floppy-o m-r-5"></i>Apply Changes
                                </button>
                            </div> -->
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </section>

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
// console.log(image); return false;
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