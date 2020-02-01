@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Contact</h1>
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">{{(isset($edata))?'Update':'Add'}} Contact Field</div>
                    <div class="panel-body">
                     <div class="row">   
                       <div class="col-md-6">
                           <div class="row" style="padding: 50px" >
                            @if(isset($edata)) 
                               <form action="{{route('update_contact_field',$edata->id)}}" method="post" id="service-form" onsubmit="return false;" >
                                   @csrf

                                  <div class="form-group" >
                                      <label>Label</label>
                                      <input type="text" name="label" class="form-control" value="{{$edata->label}}" required >
                                  </div>
                                  <div class="form-group" >
                                      <label>Do you want to this field Required?</label>
                                      <input type="checkbox" name="required" value="1" @if($edata->required) Checked @endif >
                                  </div>  
                                  <div class="form-group" >
                                      <label>Icon *</label>
                                      <input type="file" name="icon" accept="Image/*" required="" >
                                  </div>  
                                  <div class="form-group"  style="text-align: center;">
                                      <a href="{{route('contacts')}}" class="btn btn-default"  >Cancel</a>
                                      <button type="submit" class="btn btn-primary"  >Update Field</button>
                                  </div>
                               </form>
                               @else
                               <form action="{{route('add_custom_field')}}" method="post" id="service-form" onsubmit="return false;" enctype="multipart/form-data" >
                                   @csrf
                                   <input type="hidden" name="input_type" value="contact" >

                                  <div class="form-group" >
                                      <label>Label</label>
                                      <input type="text" name="label" class="form-control" required >
                                  </div>
                                  <div class="form-group" >
                                      <label>Do you want to this Contact field Required?</label>
                                      <input type="checkbox" name="required" value="1" >
                                  </div>
                                  <div class="form-group" >
                                      <label>Icon *</label>
                                      <input type="file" name="icon" accept="Image/*" required="" >
                                  </div>  
                                  <div class="form-group"  style="text-align: center;">
                                      <button type="submit" class="btn btn-primary"  >{{(isset($edata))?'Update':'Add'}} Field</button>
                                  </div>
                               </form>
                               @endif

                           </div>
                       </div>  
                       <div class="col-md-6"> 
                        <table class="table table-striped table-hover DataTable">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Label</th>
                                    <!-- <th>Name</th> -->
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data)
                                  @foreach($data as $key =>$v)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$v->label}}</td>
                                        <!-- <td>{{$v->name}}</td> -->
                                        <td><img src="{{URL::ASSET('uploaded/icon')}}/{{$v->icon}}"></td>
                                        <td><a href="{{route('update_contact_field',$v->id)}}"  class="btn-primary btn-xs"><i class="fa fa-edit" ></i></a>&nbsp;<span class="btn-xs btn-danger delete-data" data-id='{{$v->id}}' data-url="{{route('delete_custom_field')}}" data-redirecturl="{{route('contacts')}}" ><i class="fa fa-trash" ></i></span></td>
                                    </tr> 
                                  @endforeach 
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Service Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                     </div>
                    </div>
                </div>
            </div>
        </section>


@endsection        
@section('script')
<script type="text/javascript">
  
    $('Body').on('change','#input_type',function(){
      var resp =  $(this).val();

      if(resp == 'text'){
          $('#input_type_dynamic').empty();

      }else if (resp == 'select'){
        
        var html = `<div class="form-group" >
                                      <input type="text" name="option[]" class="form-control" required >
                                  <span class="btn btn-xs btn-primary" id='add-option-field' ><i class="fa fa-plus"></i></span>
                                  </div>`;   


          $('#input_type_dynamic').empty();
          $('#input_type_dynamic').append(html);


      }

    });

  $('body').on('click','#add-option-field',function(){
       
       var html =`<div class="form-group" >
                                      <input type="text" name="option[]" class="form-control" required >
                                  <span class="btn btn-xs btn-danger remove-option"  ><i class="fa fa-minus"></i></span>
                                  </div>`;

      $('#input_type_dynamic').append(html);                            
  });


  $('body').on('click','.remove-option',function(){
    $(this).parent().remove();

  });


     $("#service-form").validate({
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
                                 location.href='{{route("contacts")}}'; 
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