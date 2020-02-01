@extends('layouts.app')
@section('content')



    <div class="main profile_m">
        <div>
            <div class="boy_test">
                <h4>Boys Testimonial</h4>
                <p><img src="images/plus.png"><a href="#">Add New</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Search Now</a></p>
            </div>
            <button class="pause_btn">LIVE</button>
            <div class="credit">
                <h4>Account Credit</h4>
                <p><img src="images/plus.png"><a href="#">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>$100.00</span></p>
            </div>
        </div>
        <div class="navbar_btm midnav shadow">
            <ul>
                <li>PREVIEW</li>
                <li>EDIT</li>
                <li class="midnav_active">PAYMENT</li>
            </ul>
        </div>
        <div id="payment">
            <div class="pre_profile shadow pre_profile_payment">
                <div id="payment_title">
                    <div id="payment_title_1">
                        <h3 id="payment_title_1_1">Recharge Account Here!</h3>
                        <p id="payment_title_1_2">Select a Package and Receive a Bouns Credit</p>
                    </div>
                    <div id="payment_title_2">
                        <h3 id="payment_title_2_1">YOUR CURRENT:  <span>$100.00</span></h3>
                        <a href="#" id="payment_title_2_2">Transaction Details</a>
                    </div>
                </div>
                <div id="payment_card">
                    <div class="payment_card_item">
                        <h3 class="payment_card_item_first_title">Enter</h3>
                        <h3 class="payment_card_item_first_amount">Amount</h3>
                        <hr class="payment_card_item_first_hr">
                        <p class="payment_card_item_user">Enter Amount you<br /> wish to recharge</p>
                        <span class="payment_card_item_add">ADD</span>
                    </div>
                    <div class="payment_card_item">
                        <h3 class="payment_card_item_title">Sliver</h3>
                        <h3 class="payment_card_item_pay">Pay $50</h3>
                        <h3 class="payment_card_item_get">Get</h3>
                        <h3 class="payment_card_item_price">$10.00</h3>
                        <h3 class="payment_card_item_bonus">Bonus</h3>
                        <p class="payment_card_item_user">Greate for light users</p>
                        <span class="payment_card_item_add">ADD</span>
                    </div>
                    <div class="payment_card_item">
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
                    </div>
                </div>
                <div id="payment_bottom">
                    <p id="payment_bottom_amount">Total Amount Added: <span id="payment_bottom_price">$100.00</span></p>
                    <p id="payment_bottom_after">PayHere after Adding Credit</p>
                    <img src="images/pink_line.png" id="payment_bottom_img">
                    <button class="btn" id="payment_bottom_button"></button>
                </div>
            </div>
        </div>
    </div>


@endsection