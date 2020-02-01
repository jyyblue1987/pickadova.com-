@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Reports</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">All Reports <span><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Home Page Report Text</button></span>  
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Report</th>
                                    <th>IP</th>
                                    <th>date</th>
                                    <th>Reports</th>
                                    <th>Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                               @if($data)
                                   
                                   @foreach($data as $key =>$v)
                                      <tr>
                                          <td>{{++$key}}</td>
                                          <td>{{$v->name}}</td>
                                          <td>{{$v->email}}</td>
                                          <td>{{$v->title}}</td>
                                          <td style="height: 50px;overflow-y:auto;word-break: break-all; float: left;">{{$v->report}}</td>
                                          <td>{{$v->ip}}</td>
                                          <td>{{date('d-m-Y',strtotime($v->created_at))}}</td>
                                          <td>{{($v->status)?'Completed':'Uncompleted'}}</td>
                                          <td>
                                            <span><input type="checkbox" class="checked-status"  data-id='{{$v->id}}' {{($v->status)?'checked disabled':''}}  ></span>
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
                                    <th>Title</th>
                                    <th>Report</th>
                                    <th>IP</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </section>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="{{route('report_config')}}" method="post" onsubmit="return false;" id="live-config" >
        @csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Home Page Report Text</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Text*</label>
              <input type="text" name="report_txt" class="form-control" placeholder="text" value="{{$admin->report_txt}}" required=""  >
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

@endsection        
@section('script')
 
 <script type="text/javascript">
     $("body").on('ifChanged','.checked-status',async function(){
        var status = 0;
        if($(this).is(':checked')){
         status = 1;
        }

      var id =$(this).data('id');      
      var _token = '{{csrf_token()}}';
       
         var swal_rslt = await  swal({
                 title: "Report",
                  text: "Do you want to mark this report as a completed?",
                  icon: 'warning',
                  buttons: true,
              }).then((result) => {
                   return result;
              });  
          if(!swal_rslt){
            return false;
          }    

            $.ajax({
                          type:"POST",
                          url: '{{route("change_report_status")}}',
                          data: {'id':id,'status':status,'_token':_token},
                           success:function(res){        
                            
                          },            
                          error:function(response){                
                          },          
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
<style type="text/css">
  .table tbody tr td {
    vertical-align: middle!important;
  }
</style>