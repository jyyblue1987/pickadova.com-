<!DOCTYPE html>
<html lang="en" oncontextmenu="return false;">
<!--   -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <!--  <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <title>New Homepage</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{URL::ASSET('')}}">
        <link href="{{URL::ASSET('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::ASSET('css/thumbnail-slider.css')}}" rel="stylesheet">
     
        <link href="{{URL::ASSET('css/style.css')}}" rel="stylesheet">
        <link href="{{URL::ASSET('font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet">
       <!--  <link rel="stylesheet" href="{{URL::ASSET('/css/animate.min.css')}}"> -->
        <link rel="stylesheet" href="{{URL::ASSET('/css/toastr.min.css')}}">
        <link rel="icon" href="{{URL::ASSET('images/favicon.png')}}" type="image/gif" sizes="16x16">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="{{URL::ASSET('css/wickedpicker.min.css')}}">
   <link href="{{URL::ASSET('plugins/DataTables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script type="text/javascript" src="{{URL::ASSET('js/thumbnail-slider.js')}}" rel="stylesheet">></script>
    <style type="text/css">
  /*    #google_translate_element div.skiptranslate{
        display: block !important;
      } 
    
      body .skiptranslate{
        display: none;
      }*/
    /*  html body{
        top: 0px !important;
      }*/

.offline-user{
    color: #ffba00 !important;
}
.online-user{
    color: green !important;
}
    </style>
    
    </head>
    <style type="text/css">
  #google_translate_element .goog-te-gadget-simple span {
        position: inherit !important;
    }
   .skiptranslate img{
    display: none !important;
   } 
</style>

    <body >
        <!--    NAVIGATION-->
            <div class="navbar_bg shadow">
                <div class="gray">
                    
                </div>
                <div class="pink">
                    
                </div>
            </div>
        @include('layouts.header')
       <div class="body_content">
                @yield('content')
   
       </div>
        @include('layouts.footer')

    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase.js"></script>
    <script type="text/javascript" src="{{URL::ASSET('js/firebase/fb_config.js')}}"></script>


<!-- //for online  -->
<script type="text/javascript">
  
    var user1 = '{{isset(Auth::user()->id)?Auth::user()->id:""}}';
    if(user1 != ''){

     database.ref('online/').child(user1).set({
        status:'online',
        user_id:user1
          });
     database.ref('online/').child(user1).onDisconnect().remove();
    

       database.ref('recent/').child(user1).on('value',(snapshot)=>
                {
                  var data = snapshot.val();
                  
                  var message_unseen =  0;
                  $.each(data,function(index,value){
                    if(typeof value !== 'undefined'){
                       if(typeof value.count !== 'undefined' ){
                             message_unseen = message_unseen + value.count;  

                       }
                    }
                  });
                  // console.log(message_unseen);
                  if(message_unseen > 0){
                  var cur_url = window.location;
                 /*  console.log(cur_url);*/
                /*   
                  cur_url =  cur_url.substring(0, cur_url.indexOf('?'));   */

                     if(cur_url != '{{url("chat")}}'){

                         /*swal({
                                    title: "You have got new message",
                                    buttons: false,
                                    type: 'warning',
                                    showCancelButton: true,
 
                                })*/
                                toastr.info("You have got new message").then((result) => {
                                     if(!result){
                                      return false;
                                     }
                                  window.location.href="{{url('chat')}}";   
                       
                        });
                    }
                  }  

                    $("#total_unseen_message").text(message_unseen);
                });
    }
   


   
</script>

    
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script src="{{URL::ASSET('plugins/jquery-ui/jquery-ui.js')}}"></script>

    <script src="{{URL::ASSET('js/wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>
    <script src="{{URL::ASSET('js/bootstrap.min.js')}}"></script>

    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>

    <script src="{{ URL::asset('js/additional-methods.min.js') }}"></script>

    <script src="{{ URL::asset('js/custom.js') }}"></script>
    
    <script src="{{ URL::asset('js/toastr.min.js') }}"></script>  
    <script src="{{ URL::asset('js/inputEmoji.js') }}"></script>  
    <script src="{{ URL::asset('js/inputEmojis.js') }}"></script>  

    <script src="{{URL::ASSET('plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en',includedLanguages: 'zh-CN,ko,th,ja,vi,en',layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>  


<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">

//Check existance of user


function CheckUserExistance(id){

   
 
return new Promise(function (resolve , reject) {
    
     database.ref('/online/').child(id).once('value',(snapshot)=>
          {
            var exists = snapshot.val();
              return   resolve(exists);
           

          },(error)=>{ 
             return  reject(error); 
          });
        });
        


}  




//Showing online/offline

    database.ref('/online/').on('child_added',function(snapshot)
          {
             
              var data= snapshot.val();
            var ts = $('#recent-online-'+data.user_id);
             $('#recent-online-'+data.user_id+' span').text('Online');
            ts.removeClass('offline-user').addClass('online-user');
          });
           
    database.ref('/online/').on('child_removed',function(snapshot)
        {

              var data= snapshot.val();
              var id = '#recent-online-'+data.user_id;
              $(id).children('span').text("Offline");
             $(id).removeClass('online-user').addClass('offline-user');  
        }); 
  
  setTimeout(function(){ 
                          
    database.ref('/online/').on('child_added',function(snapshot)
          {
             
              var data= snapshot.val();
            var ts = $('#recent-online-'+data.user_id);
             $('#recent-online-'+data.user_id+' span').text('Online');
            ts.removeClass('offline-user').addClass('online-user');
          });
           
    database.ref('/online/').on('child_removed',function(snapshot)
        {

              var data= snapshot.val();
              var id = '#recent-online-'+data.user_id;
              $(id).children('span').text("Offline");
             $(id).removeClass('online-user').addClass('offline-user');  
        }); 
                                  }, 3000); 
</script>



@yield('script')
    <script>
        
    
        $( window ).on( "load", function() {
            $("html, body").animate({ scrollTop: $(".navbar").offset().top-67 }, 1000);
        });

        $(".navbar_btm div ul li").click(function() {
            $("li").removeClass("nav_active");
            $(this).addClass('nav_active');              
        });
        $("div.states_modal_body  ul li").click(function() {
            $("li").removeClass("nav_active");
            $(this).addClass('nav_active');              
        });

         $('.datepicker').datepicker({
              dateFormat:'yy-mm-dd'
         });
    $('body').on('click','#state-modal-btn',function(){
           
        var val =$('#state-modal-val ul').find('li.nav_active').text();
        if(val == ''){
          toastr.info("Please Select State");
          return false;
        } 
        
        var _token = '{{csrf_token()}}';

        $.ajax({
                          type:"POST",
                          url: '{{route("update_state_cookie")}}',
                          data: {'val':val,'_token':_token},
                           success:function(res){        
                             if(res.result){
                             toastr.success(res.message);

                              }else{
                           
                             toastr.info(res.message);
                              }  
                          
                          },            
                          error:function(response){                
                             toastr.success(response);
                          },          
                      }).then(function(){
                         window.location.href = ''; 
                      }); 


    });   
/*    $('body').on('click','.navbar-state-btn1',function(){   
 var c=$(this).val();
        console.log(c);
});*/

      $('body').on('click','.navbar-state-btn1',function(){
        var val =$('#navbar-state-element ul').find('li.nav_active').text();
       
        if(val == ''){
          toastr.info("Please Select State");
          return false;
        } 
        
        var _token = '{{csrf_token()}}';

        $.ajax({
                          type:"POST",
                          url: '{{route("update_state_cookie")}}',
                          data: {'val':val,'_token':_token},
                           success:function(res){        
                             if(res.result){
                             toastr.success(res.message);
                             }else{
                             toastr.info(res.message);
                              }  
                          
                          },            
                          error:function(response){                
                             toastr.success(response);
                          },          
                      }).then(function(){
                         window.location.href = '{{url("/")}}'; 
                      }); 


    });  
   
      $('body').on('click','#navbar-state-btn',function(){
        var val =$('#navbar-state-element ul').find('li.nav_active').text();
       
        if(val == ''){
          toastr.info("Please Select State");
          return false;
        } 
        
        var _token = '{{csrf_token()}}';

        $.ajax({
                          type:"POST",
                          url: '{{route("update_state_cookie")}}',
                          data: {'val':val,'_token':_token},
                           success:function(res){        
                             if(res.result){
                             toastr.success(res.message);
                             }else{
                             toastr.info(res.message);
                              }  
                          
                          },            
                          error:function(response){                
                             toastr.success(response);
                          },          
                      }).then(function(){
                         window.location.href = '{{url("/")}}'; 
                      }); 


    });  
   
        
    $('body').on('click','.delete-data',function(){
        
          var id = $(this).data('id');
          var url = $(this).data('url');
          var redirecturl = $(this).data('redirecturl');
          var _token = '{{csrf_token()}}';
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this record.",
              icon: 'warning',
              buttons: true,
          }).then((result) => {
               if(!result){
                return false;
               }

            $.ajax({
                          type:"POST",
                          url: url,
                          data: {'id':id,'_token':_token},
                           success:function(res){        
                             if(res.result){

                              swal("Deleted!", res.message, "success");
                            }else{
                              swal("Deleted!", res.message, "info");

                            }  
                          
                          },            
                          error:function(response){                
                          },          
                      }).then(function(){
                         window.location.href = redirecturl; 
                      }); 

        });
    });

  var check_cookie = '{{Cookie::get("user_state")}}';
   if(!check_cookie){
    $('#myModal').modal('show');
   }


    </script>
		<script>
	$(".states_data").click(function(){
 		var id=$(this).data('id');
		//location.href = 'index.php?state='+id;
	});

  document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
}

</script>

    </body>
</html>