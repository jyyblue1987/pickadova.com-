@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>States</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">{{(isset($edata))?'Update':'Add'}} State</div>
                    <div class="panel-body">
                     <div class="row">   
                       <div class="col-md-6">
                           <div class="row" style="padding: 50px" >
                            @if(isset($edata)) 
                               <form action="{{route('edit_states',$edata->id)}}" method="post" id="service-form" onsubmit="return false;" >
                                   @csrf

                                
                                  <div class="form-group" >
                                      <label>State Name</label>
                                      <input type="text" name="name" class="form-control" value="{{$edata->name}}" required >
                                  </div>  
                                  <div class="form-group" >
                                      <label>Short Name</label>
                                      <input type="text" name="short_name" value="{{$edata->short_name}}" class="form-control" required >
                                  </div>  
                                  <div class="form-group"  style="text-align: center;">
                                      <a href="{{route('states')}}" ><button type="button" class="btn btn-default"  >Cancel</button></a>&nbsp;
                                      <button type="submit" class="btn btn-primary"  >Update State</button>
                                  </div>
                               </form>
                               @else
                               <form action="{{route('states')}}" method="post" id="service-form" onsubmit="return false;" >
                                   @csrf

                                  <div class="form-group" >
                                      <label>State Name</label>
                                      <input type="text" name="name" class="form-control" required >
                                  </div>  
                                  <div class="form-group" >
                                      <label>Short Name</label>
                                      <input type="text" name="short_name" class="form-control" required >
                                  </div>  
                                  <div class="form-group"  style="text-align: center;">
                                      <button type="submit" class="btn btn-primary"  >Add State</button>
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
                                    <th>State Name</th>
                                    <th>Short Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($data)
                                  @foreach($data as $key =>$v)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->short_name}}</td>
                                        <td><a href="{{route('edit_states',$v->id)}}" class="btn-primary btn-xs"><i class="fa fa-edit" ></i></a>&nbsp;<span class="btn-xs btn-danger delete-data" data-id='{{$v->id}}' data-url="{{route('delete_service')}}" data-redirecturl="{{route('services')}}" ><i class="fa fa-trash" ></i></span></td>
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
                                 location.href='{{route("states")}}'; 
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