<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pickadova</title>
    <!-- Favicon -->
        <link rel="icon" href="{{URL::ASSET('images/favicon.png')}}" type="image/gif" sizes="16x16">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{URL::ASSET('plugins/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet" />

    <!-- Animate.css Css -->
    <link href="{{URL::ASSET('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="{{URL::ASSET('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />

    <!-- iCheck Css -->
    <link href="{{URL::ASSET('plugins/iCheck/skins/flat/_all.css')}}" rel="stylesheet" />

    <!-- Switchery Css -->
    <link href="{{URL::ASSET('plugins/switchery/dist/switchery.css')}}" rel="stylesheet" />

    <!-- Metis Menu Css -->
    <link href="{{URL::ASSET('plugins/metisMenu/dist/metisMenu.css')}}" rel="stylesheet" />

    <!-- Jquery Datatables Css -->
    <link href="{{URL::ASSET('plugins/DataTables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet" />

    <link href="{{URL::ASSET('plugins/jvectormap/jquery-jvectormap.css')}}" rel="stylesheet" />
    
    <!-- Pace Loader Css -->
    <link href="{{URL::ASSET('plugins/pace/themes/white/pace-theme-flash.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{URL::ASSET('plugins/css/style.css')}}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{URL::ASSET('plugins/css/allthemes.css')}}" rel="stylesheet" />

    <!-- Demo Purpose Only -->
    <link href="{{URL::ASSET('plugins/css/setting-box.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::ASSET('/css/toastr.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css"> 
          <link rel="stylesheet" type="text/css" href="{{URL::ASSET('css/wickedpicker.min.css')}}">
          
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
</head>

<body>
    <div class="all-content-wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
                @yield('content')
   
       </div>
        @include('admin.layouts.footer')
       </div>

    <!-- Jquery Core Js -->
    <script src="{{URL::ASSET('plugins/jquery/dist/jquery.min.js')}}"></script>

    <!-- JQuery UI Js -->
    <script src="{{URL::ASSET('plugins/jquery-ui/jquery-ui.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{URL::ASSET('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Pace Loader Js -->
    <script src="{{URL::ASSET('plugins/pace/pace.js')}}"></script>

    <!-- Screenfull Js -->
    <script src="{{URL::ASSET('plugins/screenfull/src/screenfull.js')}}"></script>

    <!-- Metis Menu Js -->
    <script src="{{URL::ASSET('plugins/metisMenu/dist/metisMenu.js')}}"></script>

    <!-- Jquery Slimscroll Js -->
    <script src="{{URL::ASSET('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Switchery Js -->
    <script src="{{URL::ASSET('plugins/switchery/dist/switchery.js')}}"></script>

    <!-- iCheck Js -->
    <script src="{{URL::ASSET('plugins/iCheck/icheck.js')}}"></script>

    <!-- Jquery Sparkline Js -->
    <script src="{{URL::ASSET('plugins/jquery-sparkline/dist/jquery.sparkline.js')}}"></script>

    <!-- Flot Chart Js -->
    <script src="{{URL::ASSET('plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{URL::ASSET('plugins/flot-spline/js/jquery.flot.spline.js')}}"></script>
    <script src="{{URL::ASSET('plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::ASSET('plugins/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::ASSET('plugins/flot/jquery.flot.time.js')}}"></script>

    <!-- JQuery Datatables Js -->
    <script src="{{URL::ASSET('plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/buttons.bootstrap.min.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/jszip.min.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{URL::ASSET('plugins/DataTables/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{URL::ASSET('plugins/jvectormap/jquery-jvectormap.js')}}"></script>
    <script src="{{URL::ASSET('plugins/jvectormap/src/jvectormap.js')}}"></script>
    <script src="{{URL::ASSET('plugins/jvectormap/src/map.js')}}"></script>
    <!-- Peity Js -->
    <script src="{{URL::ASSET('plugins/peity/jquery.peity.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{URL::ASSET('plugins/admin.js')}}"></script>
    <script src="{{URL::ASSET('plugins/dashboard.js')}}"></script>

    <!-- Google Analytics Code -->
    <script src="{{URL::ASSET('plugins/google-analytics.js')}}"></script>

    <!-- Demo Purpose Only -->
    <script src="{{URL::ASSET('plugins/demo.js')}}"></script>

    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>

    <script src="{{ URL::asset('js/additional-methods.min.js') }}"></script>

    <script src="{{ URL::asset('js/custom.js') }}"></script>
    
    <script src="{{ URL::asset('js/toastr.min.js') }}"></script>     
      
    <script src="{{ URL::asset('js/inputEmoji.js') }}"></script> 
    <script src="{{ URL::asset('js/inputEmojis.js') }}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@yield('script')

<script type="text/javascript">
     $('.DataTable').DataTable({
            responsive: true,
        });
     
     $('.datepicker').datepicker({
          dateFormat:'yy-mm-dd'
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


    $('body').on('click','.change-notification-status',function(){
        
          var id = $(this).data('id');
          var _token = '{{csrf_token()}}';
      
            $.ajax({
                          type:"POST",
                          url: "{{route('change_notification_status')}}",
                          data: {'id':id,'_token':_token},
                           success:function(res){        
                          
                           },            
                          error:function(response){                
                          },          
                      }); 

      
    });




</script>

</body>


</html>
