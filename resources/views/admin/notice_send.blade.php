@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Send Notice</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Send Notice</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group" >
                            <label>Send to all user</label><br>
                            <button class="btn btn-primary" id="send-to-all" >Send to All</button>
                          </div><br>
                          <div class="form-group" >
                            <label>Send to check user</label><br>
                            <button class="btn btn-primary" id="send-to-check" >Send to Check</button>
                          </div>
                        </div>
                        <div class="col-md-9">
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" > </th>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>state</th>
                                    <th>type</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if($data)
                                   
                                   @foreach($data as $key =>$v)
                                      <tr>
                                          <td><input type="checkbox" class="check-all" value="{{$v->id}}" ></td>
                                          <td>{{++$key}}</td>
                                          <td>{{$v->fname}} {{$v->lname}}</td>
                                          <td>{{$v->email}}</td>
                                          <td>{{$v->state}}</td>
                                          <td>{{$v->type}}</td>
                                          <td>{{$v->notice_send_id}}</td>
                                      </tr>  
                                   @endforeach

                               @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>state</th>
                                    <th>status</th>
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
     $("body").on('click','#send-to-all',function(){
          var _token = '{{csrf_token()}}';
          var notice_id  = '{{$notice->id}}';  
          swal({
              title: "Are you sure?",
              text: "Do you want to send notice to all user?",
              icon: 'warning',
              buttons: true,
          }).then((result) => {
                               $('#send-to-all').prop('disabled',true)
            $.ajax({
                          type:"POST",
                          url: '{{route("notice_send")}}',
                          data: {'type':'All','_token':_token,'notice_id':notice_id},
                           success:function(res){        
                             if(res.result){

                             }else{
                             
                             }  
                          
                          },            
                          error:function(response){                
                          },          
                      }).then(function(){
                      $('#send-to-all').prop('disabled',false)
                      }); 

        });
     });
     $("body").on('click','#send-to-check',function(){
          var _token = '{{csrf_token()}}';
          var users = new Array();
          var notice_id  = '{{$notice->id}}';  

        $.each($('.check-all'),function(){
          if($(this).is(':checked')){
            users.push($(this).val()); 
        }   
    });  
    
     if(users.length == 0 ){
       toastr.info("Please Select atleast 1 User"); 
     }

          swal({
              title: "Are you sure?",
              text: "Do you want to send notice to check user?",
              icon: 'warning',
              buttons: true,
          }).then((result) => {
                $('#send-to-all').prop('disabled',true)
            
            $.ajax({
                          type:"POST",
                          url: '{{route("notice_send")}}',
                          data: {'type':'Check','users':users,'notice_id':notice_id,'_token':_token},
                           success:function(res){        
                             if(res.result){


                             }else{
                             
                             }  
                          
                          },            
                          error:function(response){                
                          },          
                      }).then(function(){
                      $('#send-to-all').prop('disabled',false)
                      }); 

        });
     });
      $('body').on('change','.add_wallet_amount',function(){
               
              var id = $(this).data('id');     
              var amount = $(this).val();
              var _token = '{{csrf_token()}}';
              $.ajax({
                    type:"POST",
                    url: '{{route("add_wallet_amount")}}',
                    data: {'id':id,'amount':amount,'_token':_token},
                     success:function(res){        
                       if(res.result){
                                toastr.success(res.message);
                            }else{
                                toastr.info(res.message);
                            }  
                    
                    },            
                    error:function(response){
                                toastr.error(response);
                    },          
                })
     });

     $("body").on('ifChanged','#check-all',function(){
        if($(this).is(':checked')){
           $('.check-all').iCheck('check');
        }else{
           $('.check-all').iCheck('uncheck');
        }

     })  

 </script>

@endsection        