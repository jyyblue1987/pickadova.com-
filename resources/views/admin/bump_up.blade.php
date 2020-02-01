@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Bump Up Profile</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Bump Up Profile
                     <span><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Bump Up Configuration</button></span>  
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>Bump Up datetime</th>
                                    <th>View</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                               @if(isset($data))
                                   
                                   @foreach($data as $key =>$v)
                                      <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$v->fname}} {{$v->lname}}</td>
                                          <td>{{$v->email}}</td>
                                          <td>{{$v->address}}</td>
                                          <td>{{$v->state}}</td>
                                          <td>{{date('Y-m-d h:i A',strtotime($v->bump_up))}}</td>
                                          <td>
                                              <a href="{{route('view_advertise_profile',$v->id)}}" class="btn-xs btn-primary"><i class="fa fa-eye" ></i></a>
                                          </td>
                                      </tr>  
                                   @endforeach

                               @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>Bump Up datetime</th>
                                    <th>View</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{route('bump_up_config')}}" method="post" onsubmit="return false;" id="live-config" >
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bump Up Configuration</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Bump Up Amount*</label>
              <input type="number" name="bump_up" class="form-control" value="{{$admin->bump_up_amount}}" placeholder="Amount for bump up" required=""  >
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>

  </div>
</div>

        </section>


@endsection        
@section('script')
 
 <script type="text/javascript">
     $("body").on('change','.change_status',function(){
        
        var id =$('option:selected', this).data('id');      
        var val = $(this).val();
          var _token = '{{csrf_token()}}';
          swal({
              title: "Are you sure?",
              text: "Do you want to change status?",
              icon: 'warning',
              buttons: true,
          }).then((result) => {
              if(!result){
                return false;
              }

            $.ajax({
                          type:"POST",
                          url: '{{route("change_live_status")}}',
                          data: {'id':id,'val':val,'_token':_token},
                           success:function(res){        
                             if(res.result){

                              swal("Updated!", res.message, "success");
                            }else{
                              swal("Updated!", res.message, "info");

                            }  
                          
                          },            
                          error:function(response){                
                          },          
                      }).then(function(){
                         window.location.href = '{{route("live")}}'; 
                      }); 

        });
     });
    
     $("body").on('change','.change_date',function(){
        
        var id =$(this).data('id');      
        var val = $(this).val();
          var _token = '{{csrf_token()}}';
          swal({
              title: "Are you sure?",
              text: "Do you want to change status?",
              icon: 'warning',
              buttons: true,
          }).then((result) => {
              if(!result){
                return false;
              }

            $.ajax({
                          type:"POST",
                          url: '{{route("change_expiry_date")}}',
                          data: {'id':id,'val':val,'_token':_token},
                           success:function(res){        
                             if(res.result){

                              swal("Updated!", res.message, "success");
                            }else{
                              swal("Updated!", res.message, "info");

                            }  
                          
                          },            
                          error:function(response){                
                          },          
                      }).then(function(){
                         window.location.href = '{{route("live")}}'; 
                      }); 

        });
     });
     $("body").on('change','.change_online_status',function(){
        
        var id =$('option:selected', this).data('id');      
        var val = $(this).val();
          var _token = '{{csrf_token()}}';
          swal({
              title: "Are you sure?",
              text: "Do you want to change status?",
              icon: 'warning',
              buttons: true,
          }).then((result) => {
              if(!result){
                return false;
              }

            $.ajax({
                          type:"POST",
                          url: '{{route("change_online_status")}}',
                          data: {'id':id,'val':val,'_token':_token},
                           success:function(res){        
                             if(res.result){

                              swal("Updated!", res.message, "success");
                            }else{
                              swal("Updated!", res.message, "info");

                            }  
                          
                          },            
                          error:function(response){                
                          },          
                      }).then(function(){
                         window.location.href = '{{route("live")}}'; 
                      }); 

        });
     });
    
    
     $("#live-config").validate({
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