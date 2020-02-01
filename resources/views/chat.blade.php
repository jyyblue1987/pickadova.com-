@extends('layouts.app')

@section('content')
<style type="text/css">
    .chat_window.chatting_window {
    width: 100%;
}
.contact_history_profile{
    margin: auto;
    width: 255px;
    height: 50px;
    color: #000 !important;
    padding: 6px 16px;
    margin-top: 45px;
    float: left;width: 80%;
}
p.chat_window_p3 img, p.chat_window_p3 span {
    float: right !important;
}
p.chat_window_p3 {
   margin-left:0px !important;
}
.chat_window p, .chat_window div{
  width: 100%;
}


.contact_history{
  margin:0px !important;
}
.chat_header_row{

    padding: 1px;
    background: #f84f73;
    color: #fff;
    margin-right: 0px;
    margin-left: 0px;
}
.btn-primary:hover {
    color: #271e1e;
    background-color: #f84f73;
}

.offline-user {
    color: #ffba00 !important;
    margin-top: 10px;
}
.contact_history_pink div {
    font-family: proximanovaT;
    font-size: 14px;
    margin-top: -5px;
    float: left;
    width: 85%;
}
.contact_history_not_pink {
    background: transparent !important; 
}
.contact_history_not_pink .profile-icon {
    color: #f96d8b !important;
}
 .contact_history_not_pink ul li a {
    color: #000 !important;
}
.contact_history_pink p {
    font-family: proximanova;
    font-size: 17px;
    margin: 0;
    float: left;
    width: 80%;
}
.online-user {
    color: green !important;
    margin-top: 12px;
}
a.chat-file-icon{
  font-size: 120px;
}
.fa.pull-left {
    margin-right: 0em;
}
.contact_history_pink {
    margin: auto;
    width: 255px;
    height: 50px;
    background-color: #f96d8b;
    color: white;
    padding: 8px 16px;
    margin-top: 45px;
}
.profile-icon
{
	float: left;
    font-size: 25px;
    margin-left: -9px;
    margin-right: 9px;
    line-height: 37px;
}
.contact_history_pink img {
    width: 26px;
    float: right;
    margin-top: 3px;}
    .del-btn
    {
    	background: transparent;
    color: #fff;
    border-radius: 50%;
    padding: 3px 8px;
    border: 1px solid pink;
    font-size: 18px;
    font-weight: 100;
    float: right;
    }
 .contact_history_not_pink    .del-btn
    {
     color: #F5476C!important;
    }
    .emoji-custom-class{

        position: absolute !important;
        width: 133%;
        top: 51px;
    }


small.cout_message{

background-color: #f5476c;
border-radius: 50%;
padding: 4px;
color: #fff;
float: right;
 }
 span.contact_messagebox {
float: left;
width: 85%;
text-align: left;
padding: 14px 21px;
}   
</style>
@php   $user = Auth::user(); @endphp


    <div class="shadow chat_maincontent">
        <div class="pink_bar chat_pinkbar">CHAT HERE</div>
        <div class="contact_main">
            <div class="contact_history" id="recent-chat-user">
                <div class="contact_history_bar">CONTACT HISTORY</div>
            
            </div>
            <div id="scroll_view" class="chat_width">
                
                
                @if($id)    
                <div class="row chat_header_row">
                    <div class="col-md-2 img-circle "><img class="contact_img" src="{{URL::ASSET('uploaded/user/')}}/{{$user2image}}"></div>
                    <div class="col-md-9">
                        <h4>{{$user2name}}</h4>
                    </div>
                    <div class="col-md-1">
                        <h4 class="dropdown-toggle" data-toggle="dropdown">...</h4>
                        <ul class="dropdown-menu">
                          @if($user2type == 'Advertise')  
                            <li style="padding: 5px 0px; font-size: 15px;"><a href="{{route('view_profile',$id)}}">Profile</a></li>
                          @endif
                          @if($user->type == 'Advertise')  
                            @if($blockstatus)  
                            <li style="padding: 5px 0px; font-size: 15px;"><a class="add_to_block" data-id="{{$id}}" data-status='Unblock' >UnBlock</a></li>
                            @else
                            <li style="padding: 5px 0px; font-size: 15px;"><a class="add_to_block" data-id="{{$id}}" data-status='Block' >Block</a></li>
                            @endif
                          @endif  
                            <li style="padding: 5px 0px; font-size: 15px;"><a href="{{url('chat')}}">Close</a></li>
                        </ul>
                    </div>
                </div>
                @if($blockstatus)   
                   @if($user->type == 'Advertise')           
                    <p>You blocked this user</p>
                   @else
                    <p>You blocked by this user</p>
                   @endif 
                @else
                    <div class="chat_window chatting_window" id="chat-dynamic-message" style="height: 400px;overflow-y: scroll; overflow-x: hidden;">
                    </div>
                @endif
                </div>
           
                @else
                  <p style="margin-top: 230px;">Welcome to chat box</p>
               </div>

                @endif
                <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-8">
            @if($id && (!$blockstatus)) 
            <div class="chat2">
            <form class="chat_send_form" id="chat_form" onsubmit="return false;">
             <div class="row">
                <div class="col-md-8"> 
                 <input type="text" name="chat" id="chat" placeholder="Enter your message here" required="" style="float: left;">
                </div>
                
                <div class="col-md-1"> 
                  <img src="{{URL::ASSET('images/pin.png')}}">
                  <input type="file" id="file" style="position: absolute;top: 0px;opacity: 0;width: 32%;">
                </div>       
                <div class="col-md-2"> 

                  <button type="submit" class="btn btn-primary">Send</button>
                </div> 
             </div> 
             </div> 
            </form></div>
            @endif

        </div>
      </div>
    </div>


@endsection
@section('script')


<script type="text/javascript">
      var emojis = {};
    emojis['emojis'] =['&#x1F642;', '&#x1F641;', '&#x1f600;', '&#x1f601;', '&#x1f602;', '&#x1f603;', '&#x1f604;', '&#x1f605;', '&#x1f606;', '&#x1f607;', '&#x1f608;', '&#x1f609;', '&#x1f60a;', '&#x1f60b;', '&#x1f60c;', '&#x1f60d;', '&#x1f60e;', '&#x1f60f;', '&#x1f610;', '&#x1f611;', '&#x1f612;', '&#x1f613;', '&#x1f614;', '&#x1f615;', '&#x1f616;', '&#x1f617;', '&#x1f618;', '&#x1f619;', '&#x1f61a;', '&#x1f61b;', '&#x1f61c;', '&#x1f61d;', '&#x1f61e;', '&#x1f61f;', '&#x1f620;', '&#x1f621;', '&#x1f622;', '&#x1f623;', '&#x1f624;', '&#x1f625;', '&#x1f626;', '&#x1f627;', '&#x1f628;', '&#x1f629;', '&#x1f62a;', '&#x1f62b;', '&#x1f62c;', '&#x1f62d;', '&#x1f62e;', '&#x1f62f;', '&#x1f630;', '&#x1f631;', '&#x1f632;', '&#x1f633;', '&#x1f634;', '&#x1f635;', '&#x1f636;', '&#x1f637;', '&#x1f638;', '&#x1f639;', '&#x1f63a;', '&#x1f63b;', '&#x1f63c;', '&#x1f63d;', '&#x1f63e;', '&#x1f63f;', '&#x1f640;', '&#x1f643;', '&#x1f4a9;', '&#x1f644;', '&#x2620;', '&#x1F44C;','&#x1F44D;', '&#x1F44E;', '&#x1F648;', '&#x1F649;', '&#x1F64A;'];
$(function () {
  $('#chat').emoji(emojis);
});


    var user1 = '{{$user->id}}';
    var user2 = '{{$id}}';
    var user1_name = '{{$user->fname}} {{$user->lname}}';            
    var user2_name = '{{$user2name}}';            

//for get messages
    if(user2){
console.log("user2:"+user2);
       database.ref('/recent/').child(user1).child(user2).set({
                  name: "name1",
                  user_id: user2,
                  count:0,
                    });;      
     
     }

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
         if($.trim(message) == '') {
                return false;
            } 
                var msg_float =  '';
                var tmp_name = user2_name;
                var tmp_image = 'person2.png';
            if(sender_id == user1){
                msg_float = 'chat_window_p3';
                tmp_name = user1_name;
                tmp_image = 'person3.png';
              }


              if(type == 'text'){

                   var html = `<p class="${msg_float}">
                            <img class="contact_img" src="{{URL::ASSET('images/${tmp_image}')}}">
                            <span class="contact_messagebox">${tmp_name}
                                <br>
                                <span class="chatting_time">${time}</span>
                                <br>
                                <span class="chatting_text">${message}</span>
                            </span>
                        </p>`;
              } else{
               if(type == 'png' || type == 'jpg' || type =='jpeg'){
                var filetype = `<a href="{{URL::ASSET('uploaded/chat')}}/${data.message}" target="_blank" ><img src="{{URL::ASSET('uploaded/chat')}}/${message}" style="height: 100px;width: 100px;" ></a>`;
                 }else if(type == 'pdf'){
                  var filetype = `<a href="{{URL::ASSET('uploaded/chat')}}/${data.message}" download class="chat-file-icon" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>`;
                 }else if(type == 'xls' || type == 'excel'){

                  var filetype = `<a href="{{URL::ASSET('uploaded/chat')}}/${data.message}" download class="chat-file-icon" ><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>`;
                 }else if(type == 'zip' ){
                  var filetype = `<a href="{{URL::ASSET('uploaded/chat')}}/${data.message}" download class="chat-file-icon" ><i class="fa fa-file-archive-o" aria-hidden="true"></i></a>`;
                 }else if(type == 'webm' || type == 'mp4' || type == 'ogg'){
                  var filetype = `<a href="{{URL::ASSET('uploaded/chat')}}/${data.message}" target="_blank" class="chat-file-icon" ><i class="fa fa-file-video-o" aria-hidden="true"></i></a>`;
                 }else {
                  var filetype = `<a href="{{URL::ASSET('uploaded/chat')}}/${data.message}" download class="chat-file-icon" ><i class="fa fa-file" aria-hidden="true"></i></a>`;
                 }

                 var html = `<p class="${msg_float}">
                            <img class="contact_img" src="{{URL::ASSET('images/${tmp_image}')}}">
                            <span class="contact_messagebox">${tmp_name}
                                <br>
                                <span class="chatting_time">${time}</span>
                                <br>
                                <span class="chatting_text">${filetype}
                                </span>
                            </span>
                        </p>`;

              }
        

        $("#chat-dynamic-message").append(html);
        var height = document.querySelector("#chat-dynamic-message").scrollHeight;
        $('#chat-dynamic-message').animate({scrollTop: 500000}, "fast");
      });


//For get recent chat
     database.ref('/recent/'+user1).on('child_added',async function(snapshot)
      {
        var data= snapshot.val();
        // console.log("testrecent");
        
        var usr =await $.getJSON( '{{route("chat_user_data")}}?id='+data.user_id, function( usr ) {
             return usr;
           });
        var tmp_class = 'contact_history_not_pink';
        if(data.user_id == user2){
         tmp_class = '';
        } 
        var online_status = 'offline-user';
        var unseen_msg = '';
        if(typeof data.count  !== 'undefined'){
         
         if(data.count > 0){

          var unseen_msg = `<small class="cout_message" >${data.count}</small>`;
         }   
       
        }  
   
        // var html = `<div class="${tmp_class}" id='recent-${data.user_id}' >
        //             <a href="{{url('chat')}}?id=${data.user_id}"><p>${usr.fname} ${usr.lname}   <i class='fa fa-circle pull-right ${online_status}' id='recent-online-${data.user_id}' ></i> </p></a>
        //             <div>10:00AM 10-05-19</div>
        //             <span class="float-right btn btn-danger delete-chat-history"  data-id='${data.user_id}' ><i class="fa fa-trash"></i></span> 
        //         </div>`;  

       var html =`<div class="contact_history_pink ${tmp_class}" id='recent-${data.user_id}'>
                  <i class="fa fa-user-circle profile-icon" aria-hidden="true"></i>
                      <ul style="float: left; width: 80%; margin-left: -40px; margin-top: 4px;">
                      
                       <li>
                         <a href="{{url('chat')}}?id=${data.user_id}" style="font-size: 17px;
            font-weight: normal;
            margin-top: -7px; color: white;">${usr.fname} ${usr.lname}    ${unseen_msg} </a>

                       </li>
                        <li>
                       </li>
                     </ul> 
                     <i class="fa fa-circle pull-left ${online_status}" id="recent-online-${data.user_id}" ></i>
                       
                     <span class="float-right btn btn-danger delete-chat-history del-btn" data-id="${data.user_id}"><i class="fa fa-trash"></i></span>
                                         
              </div>`;         
     
        $('#recent-chat-user').append(html);
       });
    

//for send messages     

        $('body').on('change','#file',async function(e){
        var image = e.target.files[0];
         var data = new FormData();
         data.append('file',image); 
         data.append('_token','{{csrf_token()}}'); 
                    $.ajax({
                      type:'post',
                      url:'{{route("chat_file_upload")}}',
                      data: data,
                      cache:false,
                      contentType:false,
                      processData:false,
                      dataType:"json",
                            success:function(response)
                            {   
                               if(response.result){
                                var chat = response.chat;
                                var type=response.file_type; //application/pdf,image/jpeg
                                if(chat.trim()){
                                 writeUserData(user1,user2,chat,type);
                                }
                                $('#file').val(null);
                               }else{

                                toastr.error(response.message);
                               }
                            },
                            error:function(response)
                            {
                                toastr.error(response.message);
                            },
                        });
        });
       $('#chat_form').validate({
            rules:{
                message:"required",
            },
            messages:{
                 message:"",
            },
            errorElement : 'div',
            submitHandler:function(form)
            {

                    var chat = $('#chat').val();
                      
                    var type="text";
                    if(chat.trim()){
                     writeUserData(user1,user2,chat,type);
                    }
              
                form.reset();
                

            }
        });

//Delete chat history


  $('body').on('click','.delete-chat-history',function(){
     var user2 = $(this).data('id');
     var type = '{{Auth::user()->type}}' 
     swal({
              title: "Are you sure?",
              text: "Do you want to delete this user chat?",
              icon: 'warning',
              buttons: true,
          }).then((result) => {
               if(!result){
                return false;
               }
        if(type == 'Advertise'){
          database.ref('message/'+user1).child(user2).remove();
          database.ref('message/'+user2).child(user1).remove();
          database.ref('recent/'+user1).child(user2).remove();
          database.ref('recent/'+user2).child(user1).remove();
        }else{
          database.ref('message/'+user1).child(user2).remove();
          database.ref('recent/'+user1).child(user2).remove();
        }  

       window.location.href="{{url('chat')}}";

         });
  });

// Add to block user


$("body").on('click','.add_to_block',async function(){
  var block_id = $(this).data("id");
  var status = $(this).data("status");
   
            var swal_rslt = await  swal({
                      title: "Are you sure?",
                      text: "Do you want to "+status+" this user",
                      icon: 'warning',
                      buttons: true
              }).then((result) => {
                   
                   return result;
              }); 
               if(!swal_rslt){
                return false;
               }

               var data = new FormData();
           data.append('block_id',block_id); 
           data.append('status',status); 
           data.append('_token','{{csrf_token()}}'); 
        
         var response=await fetch("{{route('add_to_block')}}",{
                     method:"POST", 
                     body: data, 
                     dataType:'JSON',
                     credentials: 'same-origin',
                  });

          var json= await response.json();
             if(json.result){

                            toastr.success(json.message);
                                setTimeout(function(){ 
                                     location.href=''; 
                                  }, 1500);  
                            }else{
                            toastr.info(json.message);

                            } 
});


</script>

@endsection