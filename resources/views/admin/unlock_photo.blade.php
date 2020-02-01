@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Unlock Photo</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Unlock Photo
                     <span><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Lock Photo Configuration</button></span>  
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>User Amount</th>
                                    <th>User %</th>
                                    <th>Transaction Id</th>
                                    <th>Payment Status</th>
                                    <th>User Payment</th>
                                    <th>date</th>
                                    <th>Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if(isset($data))
                                   
                                   @foreach($data as $key =>$v)
                                      <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$v->email}}</td>
                                          <td>${{$v->amount}}</td>

                                          <td>$@if($v->user_amount == '0'){{$v->amount * $admin->user_percentage/100}} @else {{$v->user_amount}} @endif </td>
                                          
                                          <td>@if($v->user_percentage == '0'){{$admin->user_percentage}} @else {{$v->user_percentage}} @endif %</td>
                                          <td>{{$v->txn_id}}</td>
                                          <td>{{$v->payment_status}}</td>
                                          <td>@if(!$v->user_amount) <label class="label label-warning" >Unpaid</label> @else <label class="label label-success" >Paid</label> @endif</td>
                                          <td>{{date('Y-m-d',strtotime($v->feature_profile))}}</td>
                                          <td>
                                          @if($v->payment_status == 'Completed')   
                                            @if(!$v->user_amount)   
                                              <span class="btn-xs btn-primary click_to_pay"  data-id="{{$v->id}}" data-user_id="{{$v->photo_user_id}}" data-amount="{{$v->amount * $admin->user_percentage/100}}" ><i class="fa fa-plus" ></i></span>
                                            @else
                                            <span  class="btn-xs btn-success" ><i class="fa fa-check" ></i></span>
                                            @endif
                                          @else
                                            <span  class="btn-xs btn-danger" ><i class="fa fa-times" ></i></span>

                                          @endif

                                          </td>
                                      </tr>  
                                   @endforeach

                               @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>User Amount</th>
                                    <th>User %</th>
                                    <th>Transaction Id</th>
                                    <th>Payment Status</th>
                                    <th>User Payment</th>
                                    <th>date</th>
                                    <th>Pay</th>
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
      <form action="{{route('lock_photo_config')}}" method="post" onsubmit="return false;" id="live-config" >
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Lock Photo Configuration</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Percentage to user per photo*</label>
              <input type="number" name="user_percentage" class="form-control" placeholder="user percentage(%)" value="{{$admin->user_percentage}}" required="" max="100" value="0"  >
            </div>
      </div> 
      <div class="modal-body">
            <div class="form-group">
              <label>Maximum Amount*</label>
              <input type="number" name="max_amount" class="form-control" placeholder="Maximum Amount" value="{{$admin->max_amount}}" required="">
            </div>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Photo link Expiry (in days)*</label>
              <input type="number" name="photo_expire" class="form-control" value="{{$admin->photo_expire}}" placeholder="Expire period in days" required=""   >
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
     $("body").on('click','.click_to_pay',function(){
        
        var id =$(this).data('id');      
        var user_id =$(this).data('user_id');      
        var amount = $(this).data('amount');
        var percentage = '{{$admin->user_percentage}}';
          var _token = '{{csrf_token()}}';
          swal({
              title: "Are you sure?",
              text: "Do you want to pay $"+ amount+"?",
              buttons: true,
          }).then((result) => {
              if(!result){
                return false;
              }

            $.ajax({
                      type:"POST",
                      url: '{{route("pay_photo_amount")}}',
                      data: {'unlock_id':id,'amount':amount,'user_id':user_id,'_token':_token,'percentage':percentage},
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
                       window.location.href = ''; 
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