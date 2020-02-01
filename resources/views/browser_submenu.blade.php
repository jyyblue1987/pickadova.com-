 <div class="float">
            <div class="credit">
                <h4>Account Credit</h4>
                <p><img src="{{URL::ASSET('images/plus.png')}}"><a href="{{url('payment')}}">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>$ {{$user->wallet}}</span></p>
            </div>
        </div>
        <div class="navbar_btm midnav shadow">
            <ul>
                <li @if(url()->current() == url('browser_profile')) class="midnav_active" @endif ><a href="{{url('browser_profile')}}"  style="color:#fff"  >PREVIEW</a></li>
                <li  @if(url()->current() == url('browser_edit_profile')) class="midnav_active"  @endif ><a href="{{url('browser_edit_profile')}}" style="color:#fff" >EDIT</a></li>
                <li @if(url()->current() == url('payment')) class="midnav_active"  @endif  ><a href="{{url('payment')}}" style="color:#fff" > PAYMENT</a></li>
            </ul>
        </div>