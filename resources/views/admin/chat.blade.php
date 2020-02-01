@extends('admin.layouts.app')

@section('content')
<style type="text/css">
   .chat-dashboard .message-area .body ul li .bubble .message-time {
    font-size: 9px;
 }
</style>
         <section class="content">
            <div class="page-heading">
               <h1>CHAT DASHBOARD</h1>
               <!-- <ol class="breadcrumb">
                  <li><a href="index-2.html">Home</a></li>
                  <li><a href="javascript:void(0);">Miscellaneous</a></li>
                  <li class="active">Chat Dashboard</li>
               </ol> -->
            </div>
            <div class="page-body">
               <div class="row clearfix chat-dashboard">
                  <div class="col-sm-3 padding-0">
                     <div class="user-panel">
                        <div class="heading">
                           <img src="{{URL::ASSET('uploaded/user/')}}/{{$user1->image}}" alt="User Avatar" />
                           <div class="avatar-info">
                              <div class="name-surname">{{$user1->fname}}{{$user1->lname}}</div>
                              <div class="status">
                                 <br>
                              </div>
                           </div>
                        </div>
                        <div class="body">
                           <ul class="user-list" id="recent-user-list" style="height: 500px;">
                           
                            
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-9 padding-0">
                     <div class="message-area">
                          @if($user2) 
                        <div class="heading">
                           <a class="avatar-info chat-user-toggle"   style="cursor: pointer;" >
                              <img src="{{URL::ASSET('uploaded/user/')}}/{{$user2->image}}" alt="User Avatar" />
                              <div class="holder">
                                 <div class="name-surname">{{$user2->fname}} {{$user2->lname}}</div>
                                 <div class="info "  >Click for see the user detail...</div>
                              </div>
                           </a>
                           <!-- <div class="right-menu-item">
                              <a class="menu-item" href="javascript:void(0);">
                              <i class="fa fa-volume-control-phone"></i>
                              </a>
                              <a class="menu-item" href="javascript:void(0);">
                              <i class="fa fa-video-camera"></i>
                              </a>
                              <div class="btn-group">
                                 <a class="menu-item dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-paperclip"></i></a>
                                 <ul class="dropdown-menu pull-right">
                                    <li>
                                       <a href="javascript:void(0);">
                                       <i class="fa fa-fw fa-photo m-r-5"></i>Photo & Videos
                                       </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0);"><i class="fa fa-fw fa-camera m-r-5"></i>Camera</a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0);"><i class="fa fa-fw fa-file-o m-r-5"></i>Document</a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0);">
                                       <i class="fa fa-fw fa-user-circle-o m-r-5"></i>Person
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="btn-group">
                                 <a class="menu-item dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);"><i class="fa fa-ellipsis-v"></i></a>
                                 <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Menu Item - 1</a></li>
                                    <li><a href="javascript:void(0);">Menu Item - 2</a></li>
                                    <li><a href="javascript:void(0);">Menu Item - 3</a></li>
                                 </ul>
                              </div>
                           </div> -->
                        </div>
                        @endif
                        @if($user2)
                        <div class="body"  style="height: 600px;">
                           <ul id="chat-dynamic-message" style="overflow-y: auto;">
                           </ul>
                        </div>
                        @else
                        <div class="body" style="height: 600px;">
                           <h4 style="margin-top: 260px; text-align: center;">Welcome to chat box of {{$user1->fname}} {{$user1->lname}}</h4>
                        </div>
                        @endif
                        <!-- <div class="footer">
                           <div class="write-message has-feedback">
                              <input type="text" class="form-control" placeholder="Write a message..." required />
                              <span class="glyphicon glyphicon-send form-control-feedback"></span>
                           </div>
                           <a href="javascript:void(0);" class="mic"><i class="fa fa-microphone"></i></a>
                        </div> -->
                        @if($user2)
                        <div class="user-detail" style="right: 0px;display:none;" >
                           <div class="heading">
                              <a href="javascript:void(0);" class="chat-user-toggle"><i class="fa fa-times-circle-o"></i></a>
                              <div>User Detail</div>
                           </div>
                           <div class="body">
                              <div class="profile-image">
                                 <img src="{{URL::ASSET('uploaded/user/')}}/{{$user2->image}}" class="img-circle" height="128" width="128" alt="User Image" />
                              </div>
                              <div class="name-surname">{{$user2->fname}} {{$user2->lname}}</div>
                              <div class="city">{{$user2->city}},{{$user2->state}}</div>
                              <div class="divider"></div>
                              <ul>
                                 <li>
                                    <div>Nickname:</div>
                                    <div>{{$user2->fname}}</div>
                                 </li>
                                 <li>
                                    <div>Email:</div>
                                    <div>{{$user2->email}}</div>
                                 </li>
                                 <li>
                                    <div>Account Type:</div>
                                    <div>{{$user2->type}}</div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </section>


@endsection
@section('script')
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase.js"></script>
    <script type="text/javascript" src="{{URL::ASSET('js/firebase/fb_config.js')}}"></script>
<script type="text/javascript">

    var user1 = '{{$user1_id}}';
    var user2 = '{{$user2_id}}';
    var user1_name = 'test';            
    var user2_name = '0';            
   

//For get recent chat
     database.ref('/recent/'+user1).on('child_added',async function(snapshot)
      {
        var data= snapshot.val();

        var usr =await $.getJSON( '{{route("recent_chat_user")}}?id='+data.user_id, function( usr ) {
             return usr;
           }); 
         var active_cls_name ='';
         if(usr.id == user2){
          active_cls_name ='active';

         }

         var html = ` <li class="${active_cls_name}">
                                <a href="{{url('admin/chat')}}?user_id=${user1}&chat_user_id=${usr.id}" >
                                 <div class="user">
                                    <img src="{{URL::ASSET('uploaded/user/')}}/${usr.image}" alt="User Avatar">
                                    <div class="user-info">
                                       <div class="user-name-surname">${usr.fname} ${usr.lname}</div>
                                       <div class="message">
                                       </div>
                                    </div>
                                 </div>
                                 </a>
                              </li>`;
         $('#recent-user-list').append(html);                        

      });    



     database.ref('/message/'+user1+'/'+user2).on('child_added',function(snapshot)
      {
    var currentdate = new Date(); 
    var current_date =  (currentdate.getDate()-1) + "/" + (currentdate.getMonth()+1)  + "/"+ currentdate.getFullYear().toString().substr(-2);
      var data= snapshot.val();
      // console.log(data);
      var date =data.date;
      var time =data.time;
         if(current_date>=date){
            time=date+" "+time;
            }
      var message =data.message;
      var status =data.seen;
      var type =data.type;
      var sender_id =data.sender_id;
           // console.log(data);
          if($.trim(message) == '') {
                return false;
            } 
                var msg_float =  '';
            if(sender_id == user1){
                msg_float = 'right';
              }


              if(type == 'text'){

                     
                   var html = `<li class="${msg_float}">
                                 <div class="bubble">
                                    <div class="message-text">${message}</div>
                                    <div class="message-time">${time}</div>
                                 </div>
                              </li>`;  

              } else{
               if(type == 'png' || type == 'jpg' || type =='jpeg'){
                 }else{
                  message = 'file-icon.png';
                 }

               
                   var html = `<li class="${msg_float}">
                                 <div class="bubble">
                                    <div class="message-text">
                                <a href="{{URL::ASSET('uploaded/chat')}}/${data.message}" target="_blank" ><img src="{{URL::ASSET('uploaded/chat')}}/${message}" style="height: 100px;width: 100px;" ></div>
                                    <div class="message-time">${time}</div>
                                 </div>
                              </li>`;  

              }
        

        $("#chat-dynamic-message").append(html);
        var height = document.querySelector("#chat-dynamic-message").scrollHeight;
        $('#chat-dynamic-message').animate({scrollTop: 500000}, "fast");

    });
   

   $("body").on('click','.chat-user-toggle',function(){
      // console.log('dsa');
       $('.user-detail').toggle();
   });



</script>
@endsection
         