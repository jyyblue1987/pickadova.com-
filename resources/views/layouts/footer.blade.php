
<?php use App\http\Controllers\admin\StatesController;?>
    <!-- ------------ modal ----------->
     

        <div class="modal fade notranslate" id="myModal" role="dialog">
          <div class="modal-dialog states_modal">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div id="state-modal-val" class="states_modal_body modal-body navbar_btm" style="height:230px"> <!-- Olexsandr -->
                <h3>Welcome To Pick a Dove</h3>
                @php  $state = StatesController::get();
                          $region_cookie = Cookie::get('user_state');
                        if($region_cookie){
                           $region_cookie = json_decode($region_cookie);
                         }

                    @endphp
                @if($region_cookie)
                <p class="states_modal_p">We have detected <span>{{$region_cookie->region}}</span> as your current Location.</p>
                <p>Is this Correct? or Select Below</p>
                @else
                  @php $ip_state =StatesController::get_ip_state();  @endphp
                <p class="states_modal_p">We have detected <span>{{$ip_state}}</span> as your current Location.</p>
                <p>Is this Correct? or Select Below</p>
                  
               @endif
                <ul class="states_modal_ul">
                   @if($state)  
                     @foreach($state as $key=>$v) 
                    <li data-id="{{$v->short_name}}" class="@if($region_cookie) {{($region_cookie->region == $v->short_name)?'nav_active':''}}  @endif" >{{$v->short_name}}</li>
                     @endforeach
                     @endif

                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" id="state-modal-btn" >Okay</button>
              </div>
            </div>
            
          </div>
        </div>

