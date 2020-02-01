@extends('admin.layouts.app')

@section('content')
<style type="text/css">
  .modal .modal-content .modal-body {
   float: left;
  }
</style>
  <section class="content">
            <div class="page-heading">
                <h1>Live</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Live Accounts
                     <span><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Live Configuration</button></span>  
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Expire date</th>
                                    <!-- <th>Active/Inactive</th> -->
                                    <th>Live Status</th>
                                  
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
                                          <td><input type="date" value="{{date('Y-m-d',strtotime($v->live_expiry))}}" class="datepicker change_date" data-id="{{$v->id}}" >  </td>
                                         <!--  <td>
                                             <select class="form-control change_online_status
                                             @if($v->online) label-success
                                             @else label-warning @endif 
                                             ">
                                                 <option value="1" data-id="{{$v->id}}"  {{($v->online == "1")?'Selected':''}} >Active</option>
                                                 <option value="0" data-id="{{$v->id}}" {{($v->online == "0")?'Selected':''}} >Inactive</option>
                                             </select> 
                                            
                                        </td> -->
                                         <td>
                                             <select class="form-control change_status {{($v->live_status == 'ON')?'label-success':'label-warning'}}"       >
                                                 <option value="ON" data-id="{{$v->id}}"  {{($v->live_status == "ON")?'Selected':''}} >Live</option>
                                                 <option value="Pause" data-id="{{$v->id}}" {{($v->live_status == "Pause")?'Selected':''}} >Pause</option>
                                             </select> 
                                            
                                        </td>
                                       <!--    <td>
                                              <a href="#" class="btn-xs btn-primary"><i class="fa fa-edit" ></i></a>&nbsp;
                                              <span class="btn-xs btn-danger"><i class="fa fa-trash" ></i></span>
                                          </td> -->
                                      </tr>  
                                   @endforeach

                               @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Expire date</th>
                                    <th>Live Status</th>
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
      <form action="{{route('live_config')}}" method="post" onsubmit="return false;" id="live-config" >
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Go Live Configuration</h4>
      </div>
      <div class="modal-body">
            <div class="form-group col-md-6">
              <label>Go Live duration*</label>
              <input type="number" name="live_expiry" class="form-control" value="{{$admin->live_expiry}}" placeholder="Validity of go live(in days)" required=""  >
            </div>
            <div class="form-group col-md-6">
              <label>Go Live Amount*</label>
              <input type="number" name="live_amount" class="form-control" value="{{$admin->live_amount}}" placeholder="Amount for go live" required=""  >
            </div>
            <div class="form-group col-md-12">
              <label>inactive duration*</label>
              <input type="number" name="inactive_duration" class="form-control" value="{{$admin->inactive_duration}}" placeholder="Validity of inactive days" required=""  >
            </div>
            <div class="form-group col-md-12">
              <label>Live Message*</label>
              <input type="text" name="live_message" class="form-control" value="{{$admin->live_message}}" required=""  >
            </div>
            <div class="form-group col-md-12">
              <label>Pause Message*</label>
              <input type="text" name="pause_message" class="form-control" value="{{$admin->pause_message}}" required=""  >
            </div>
            <div class="form-group col-md-12">
              <label>Non Verified Account*</label>
              <input type="text" name="live_verification" class="form-control" value="{{$admin->live_verification}}" required=""  >
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
                                 location.href='{{route("live")}}'; 
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