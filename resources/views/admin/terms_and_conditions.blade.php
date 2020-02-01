@extends('admin.layouts.app')

@section('content')


  <section class="content">
            <div class="page-heading">
                <h1>Terms And Condition</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Terms And Conditions</div>
                    <div class="panel-body">
                     <div class="row">   
                       <div class="col-md-12">
                           <div class="row" style="padding: 50px" >
                               <form action="{{route('terms_and_conditions')}}" method="post" id="terms-form" onsubmit="return false;" >
                                   @csrf

                                  <div class="form-group" >
                                      <label>Terms And Conditions</label>
                                      <textarea class="form-control" name="terms_and_conditions" id="summernote" >{{$terms_and_condition}}</textarea>
                                  </div>  
                                  <div class="form-group"  style="text-align: center;">
                                      <button type="submit" class="btn btn-primary btn-loader"  >Update</button>
                                  </div>
                               </form>
                           
                           </div>
                       </div>  
                     </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>


<script type="text/javascript">
	
$(document).ready(function(){

    $('#summernote').summernote({
             height:300
    });
   
});

$("#terms-form").validate({
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
                                 location.href='{{route("terms_and_conditions")}}'; 
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
