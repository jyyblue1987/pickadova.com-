@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Girls</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Girls/Advertise</div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Wallet</th>
                                    <th>Chat</th>
                                    <th>Email Verification</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if($data)
                                   
                                   @foreach($data as $key =>$v)
                                      <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$v->fname}} {{$v->lname}}</td>
                                          <td>{{$v->email}}</td>
                                          <td>{{$v->address}}</td>
                                          <td>$ {{$v->wallet}}</td>
                                          <td><a href="{{url('admin/chat')}}?user_id={{$v->id}}" class="btn btn-xs btn-success" ><i class="fa fa-comments"></i></a> </td>
                                          <td><label class="label {{($v->email_verification)?'label-success':'label-warning'}} " >{{($v->email_verification)?'Verified':'Not Verified'}}</label></td>
                                          <td>
                                             <select class="form-control change_status {{($v->account_verification)?'label-success':'label-warning'}}"       >
                                                 <option value="1" data-id="{{$v->id}}"  {{($v->account_verification)?'Selected':''}} >Verify</option>
                                                 <option value="0" data-id="{{$v->id}}" {{(!$v->account_verification)?'Selected':''}} >Not Verify</option>
                                             </select> 
                                            
                                        </td>
                                          <td>
                                              <a href="{{route('view_advertise_profile',$v->id)}}" class="btn btn-primary" title="View/edit" ><i class="fa fa-eye"  ></i></a>
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
                                    <th>Wallet</th>
                                    <th>Chat</th>
                                    <th>Email Verification</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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
            console.log(result);
            $.ajax({
                          type:"POST",
                          url: '{{route("users_verification")}}',
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
                         window.location.href = '{{route("girls_profile")}}'; 
                      }); 

        });
     });
   

 


 </script>

@endsection        