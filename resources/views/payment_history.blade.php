@extends('layouts.app')
@section('content')

@php $user =Auth::user(); @endphp


    <div class="main profile_m">
        @if($user->type == 'Advertise')
        <div>
            <div class="boy_test">
                <h4>Boys Testimonial</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="{{url('advertise_profile')}}">Add New</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="{{url('advertise_profile')}}">Search Now</a></p>
            </div>
            <!-- <button class="pause_btn">LIVE</button> -->
            <div class="credit">
                <h4>Account Credit</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="{{route('payment')}}">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>${{$user->wallet}}</span></p>
            </div>
        </div>
        <div class="navbar_btm midnav shadow">
            <ul>
               <li> <a class="ancer" href="{{route('advertise_profile')}}" >PREVIEW</a></li>
                <a class="ancer" href="{{route('advertise_edit_profile')}}" ><li>EDIT</a></li>
                <li class="midnav_active"><a style="color:#f84f73!important;" >PAYMENT</a></li>
            </ul>
        </div>
        @else
         @include('browser_submenu')

        @endif
        <div id="paymentHistory">
            <div class="pre_profile shadow pre_profile_phistory">
                <div class="payment_history_body">
                    <div class="payment_history_bodyDiv1">
                        <h3>Transaction History</h3>
                    </div>
                    <div class="payment_history_bodyDiv2">
                        <h3>YOUR CURRENT:  <span> ${{$user->wallet}}</span></h3>
                    </div>
                </div>
                <div class="payment_history_bodyDiv3">
                    <input type="date" id="start_date" class="datepicker" placeholder="Date from" value="{{$start_date}}">
                    <input id="payment_history_bodyDiv3_input" type="date" name="" placeholder="Date from" class="datepicker" value="{{$end_date}}" >
                </div>
                <table class="table" id="transTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Money</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Additional Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    <!-- 
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr>
                        <tr>
                            <td>7-1-2019</td>
                            <td>06:51 PM</td>
                            <td>Debit</td>
                            <td>1.5</td>
                            <td>User fees</td>
                        </tr> -->
                    </tbody>
                </table>
                </div> 
            </div>
        </div>
    </div>

<style type="text/css">
  table.dataTable thead .sorting_asc:after {
    content: "";
}
</style>
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
  $(document).ready(function(){
    var start_date = getUrlParameter('start_date');
    var end_date = getUrlParameter('end_date');
   $('#transTable').DataTable({
      'processing': true,
      'serverSide': true,
      'searching': false,
      'serverMethod': 'post',
      'ajax': {
          'url':'{{route("payment_history")}}',
          'data': function ( d ) {
                d._token = '{{csrf_token()}}';
                d.start_date = start_date;
                d.end_date = end_date;
            }
      },
      'columns': [
         { data: 'date' },
         { data: 'time' },
         { data: 'money' },
         { data: 'payment' },
         { data: 'status' },
         { data: 'type' },
       ]
   });
});

$('body').on('change','#payment_history_bodyDiv3_input',function(){
  var start_date = $('#start_date').val();
  var end_date = $(this).val();
  if(start_date ==''){
   toastr.info('Please select start date');
   return false;
  }
  window.location.href='?start_date='+start_date+'&end_date='+end_date;
});

</script>        
@endsection  