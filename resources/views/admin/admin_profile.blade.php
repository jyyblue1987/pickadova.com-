@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Profile</h1>
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
            
                    <div class="panel-body">
               @php $admin = Auth::guard('admin')->user(); @endphp     
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
                <form action="{{route('admin_profile')}}" method="post" id="admin_profile"  style="width: 50%;margin: 0 auto;" onsubmit="return false;" >
                    @csrf
                    <div class="form-group">
                        <label>Name*</label>
                        <input type="text" class="form-control" id="name"  name="name" placeholder="Name" value="{{$admin->name}}" required="">
                        @if($errors->has('name'))
                                <span  class="error" >{{$errors->first('name')}}</span>  <br>   
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email*</label>
                        <input type="text" class="form-control" id="email"  name="email" placeholder="Email"  value="{{$admin->email}}" required="" >
                        @if($errors->has('email'))
                                <span  class="error" >{{$errors->first('email')}}</span>  <br>   
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" id="image"  name="image" accept="image/*"  >
                    </div>

                    <div class="form-group align-center">
                      <button type="submit"   class="btn btn-success ">Update</button>
                    </div>
                </form>
                    </div>
                </div>
            </div>
  </section>                  	
@endsection
@section('script')

<script type="text/javascript">
  

         $("#admin_profile").validate({
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
</script>

@endsection