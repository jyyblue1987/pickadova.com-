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
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="#">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>${{$user->wallet}}</span></p>
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
        <div id="payment">
            <div class="pre_profile shadow pre_profile_payment">
                <div id="payment_title">
                    <div id="payment_title_1">
                        <h3 id="payment_title_1_1">Recharge Account Here!</h3>
                        <p id="payment_title_1_2">Select a Package and Receive a Bouns Credit</p>
                    </div>
                    <div id="payment_title_2">
                        <h3 id="payment_title_2_1">YOUR CURRENT:  <span>${{$user->wallet}}</span></h3>
                        <a href="{{route('payment_history')}}" id="payment_title_2_2">Transaction Details</a>
                    </div>
                </div>
                <div id="payment_card">
                    <div class="payment_card_item" data-id="0" data-amount="0" >
                        <h3 class="payment_card_item_first_title">Enter</h3>
                        <h3 class="payment_card_item_first_amount">Amount</h3>
                         <input type="number" id="custom-amount" value="0" >
                        <p class="payment_card_item_user">Enter Amount you<br /> wish to recharge</p>
                        <span class="payment_card_item_add">ADD</span>
                    </div>
                    @if($packages)
                       @foreach($packages as $key =>$v)
                        <div class="payment_card_item" data-id='{{$v->id}}' data-amount="{{$v->amount}}">
                            <h3 class="payment_card_item_title">{{$v->name}}</h3>
                            <h3 class="payment_card_item_pay">Pay ${{$v->amount}}</h3>
                            <h3 class="payment_card_item_get">Get</h3>
                            <h3 class="payment_card_item_price">${{$v->bonus}}</h3>
                            <h3 class="payment_card_item_bonus">Bonus</h3>
                            <p class="payment_card_item_user">Greate for light users</p>
                            <span class="payment_card_item_add">ADD</span>
                        </div>
                       @endforeach 
                    @endif
                  <!--   <div class="payment_card_item">
                        <h3 class="payment_card_item_title">Sliver</h3>
                        <h3 class="payment_card_item_pay">Pay $50</h3>
                        <h3 class="payment_card_item_get">Get</h3>
                        <h3 class="payment_card_item_price">$10.00</h3>
                        <h3 class="payment_card_item_bonus">Bonus</h3>
                        <p class="payment_card_item_user">Greate for light users</p>
                        <span class="payment_card_item_add">ADD</span>
                    </div>
                    <div class="payment_card_item_latest">
                        <h3 class="payment_card_item_title">Sliver</h3>
                        <h3 class="payment_card_item_pay">Pay $50</h3>
                        <h3 class="payment_card_item_get">Get</h3>
                        <h3 class="payment_card_item_price">$10.00</h3>
                        <h3 class="payment_card_item_bonus">Bonus</h3>
                        <p class="payment_card_item_user">Greate for light users</p>
                        <span class="payment_card_item_add">ADD</span>
                    </div> -->
                </div>
                <div id="payment_bottom">
                    <p id="payment_bottom_amount">Total Amount Added: $<span id="payment_bottom_price">0</span></p>
                    <p id="payment_bottom_after">PayHere after Adding Credit</p>
                    <!-- <img src="{{URL::ASSET('images/pink_line.png')}}" id="payment_bottom_img"> -->
                    <form method="post" action="{{route('payment_form')}}" id="paypal-form" onsubmit="submitform()" >
                        @csrf

                      <input type="hidden" name="package_id" id="package_id" value=""  >
                      <input type="hidden" id="package_amount" name="amount" value=""  >

                     <button type="submit" class="btn" id="payment_bottom_button"></button>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    
    function submitform(){
       
       var package_id = $("#package_id").val();
       var package_amount = $("#package_amount").val();
       var _token = "{{csrf_token()}}";


        if(package_id == '' && package_amount == ''){
            toastr.info("Please select any package");
          return false;
        }
       
        if(package_id == '0' && package_amount == '0'){
            toastr.info("Please enter some amount");
          return false;
        }
      
       $('#paypal-form').submit();
    };

    $('body').on('click','.payment_card_item',function(){
         
         var green = {};
         green['border']  ='4px solid #439c33';
         green['border-bottom']  ='65px solid #439c33';
       var id = $(this).data("id");
       var amount = $(this).data("amount");
     
       $('.payment_card_item').removeAttr("style");
       $(this).css(green);
         
        $("#package_id").val(id);   
        $("#package_amount").val(amount);   
        $("#payment_bottom_price").text(amount);   

    });

    $("body").on('keyup','#custom-amount',function(){
           var amount= $(this).val();
           var package =$("#package_id").val();   
         console.log(package);
        if(package == "0"){
            $("#payment_bottom_price").text(amount);                 
            $("#package_amount").val(amount);   
    
        }
    });



</script>
@endsection