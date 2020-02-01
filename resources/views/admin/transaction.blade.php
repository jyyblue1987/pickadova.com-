@extends('admin.layouts.app')

@section('content')

  <section class="content">
            <div class="page-heading">
                <h1>Transaction</h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="../../index-2.html">Home</a></li>
                    <li><a href="javascript:void(0);">Tables</a></li>
                    <li class="active">Jquery Datatables</li>
                </ol> -->
            </div>
            <div class="page-body">
                <div class="panel panel-default">
                    <div class="panel-heading">Transaction
                     <div class="pull-right form-group" >
                      <label>Payment For</label>
                       <select id="payment-type" class="form-control" >
                           <option value="" >Select</option>
                           <option value="Live" @if($type == "Live") selected @endif  >Live</option>
                           <option value="Wallet" @if($type == "Wallet") selected @endif  >Wallet</option>
                           <option value="Feature" @if($type == "Feature") selected @endif  >Feature</option>
                           <option value="BumpUp" @if($type == "BumpUp") selected @endif  >BumpUp</option>
                       </select>
                     </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover js-exportable dataTable">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Dr/Cr</th>
                                    <th>Type</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                   <tbody>
                               @if($data)
                                   
                                   @foreach($data as $key =>$v)
                                      <tr>
                                          <td>{{$v->order_id}}</td>
                                          <td>{{$v->fname}} {{$v->lname}}</td>
                                          <td>{{$v->amount}}</td>
                                          <td>{{$v->payment}}</td>
                                          <td>{{$v->type}}</td>
                                          <td>{{$v->payment_method}}</td>
                                          <td>{{$v->status}}</td>
                                          <td>{{$v->created_at}}</td>
                                          
                                        
                                          <td>
                                              <a href="#" class="btn btn-primary"><i class="fa fa-eye" ></i></a>
                                          </td>
                                      </tr>  
                                   @endforeach

                               @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                     <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Dr/Cr</th>
                                    <th>Type</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Created At</th>
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
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
  /*$(document).ready(function(){
   id =getUrlParameter('id');
   type =getUrlParameter('type');
  var oTable = $('#empTable').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      "ordering": true,
      'ajax': {
          'url':'{{route("get_transaction")}}',
          'data': function ( d ) {
                d._token = '{{csrf_token()}}';
                d.id = id;
                d.type = type;
         
            }
      },
      'columns': [
         { data: 'order_id' },
         { data: 'name' },
         { data: 'amount' },
         { data: 'payment' },
         { data: 'type' },
         { data: 'payment_method' },
         { data: 'status' },
         { data: 'created_at' },
         { data: 'view' },
      ]
   });
  
 




});*/

  $('body').on('change','#payment-type',function(){
    var val =$(this).val();
    if(val !=  ''){
      window.location.href="?type="+val;
    }

  });

</script>        
@endsection        
    