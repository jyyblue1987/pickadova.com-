<?php use App\Http\Controllers\admin\BasicController;?>
   <header>
            <nav class="navbar navbar-default">
                <!-- Search Bar -->
                <!-- <div class="search-bar">
                    <div class="search-icon">
                        <i class="material-icons">search</i>
                    </div>
                    <input type="text" placeholder="Start typing...">
                    <div class="close-search js-close-search">
                        <i class="material-icons">close</i>
                    </div>
                </div> -->
                <!-- #END# Search Bar -->

                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="material-icons">swap_vert</i>
                        </button>
                        <a href="javascript:void(0);" class="left-toggle-left-sidebar js-left-toggle-left-sidebar">
                            <i class="material-icons">menu</i>
                        </a>
                        <!-- Logo -->
                        <a class="navbar-brand" href="#">
                            <span class="logo-minimized">AS</span>
                            <img src="{{URL::ASSET('images/picadova.png')}}" style="width: 100%;">
                        </a>
                        <!-- #END# Logo -->
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">
                      <!--   <ul class="nav navbar-nav">
                            <li>
                                <a href="javascript:void(0);" class="toggle-left-sidebar js-toggle-left-sidebar">
                                    <i class="material-icons">menu</i>
                                </a>
                            </li>
                        </ul> -->
                            <!-- Call Search -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- <li>
                                <a href="javascript:void(0);" class="js-search" data-close="true">
                                    <i class="material-icons">search</i>
                                </a>
                            </li> -->
                            <!-- #END# Call Search -->
                            <!-- Fullscreen Request -->
                            <!-- <li>
                                <a href="javascript:void(0);" class="fullscreen js-fullscreen">
                                    <i class="material-icons">fullscreen</i>
                                </a>
                            </li> -->
                            <!-- #END# Fullscreen Request -->
                            <!-- Email -->
                            <!-- <li class="dropdown email-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <i class="material-icons">email</i>
                                    <span class="label-count">3</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">EMAILS</li>
                                    <li class="body">
                                        <ul class="menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img src="{{URL::ASSET('images/avatars/face4.jpg')}}" alt="User Avatar" />
                                                    <div class="info">
                                                        <h4>John Doe</h4>
                                                        <span class="time">
                                                            <i class="material-icons">access_time</i> 14 mins ago
                                                        </span>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, ei labore persius usu, consul quaeque
                                                            ne vix
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img src="{{URL::ASSET('images/avatars/face5.jpg')}}" alt="User Avatar" />
                                                    <div class="info">
                                                        <h4>Francisco Day</h4>
                                                        <span class="time">
                                                            <i class="material-icons">access_time</i> 1 hour ago
                                                        </span>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, ei labore persius usu, consul quaeque
                                                            ne vix
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img src="{{URL::ASSET('images/avatars/face6.jpg')}}" alt="User Avatar" />
                                                    <div class="info">
                                                        <h4>Maria Doe</h4>
                                                        <span class="time">
                                                            <i class="material-icons">access_time</i> 1 hour ago
                                                        </span>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, ei labore persius usu, consul quaeque
                                                            ne vix
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img src="{{URL::ASSET('images/avatars/face7.jpg')}}" alt="User Avatar" />
                                                    <div class="info">
                                                        <h4>Connie Craig</h4>
                                                        <span class="time">
                                                            <i class="material-icons">access_time</i> 2 hours ago
                                                        </span>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, ei labore persius usu, consul quaeque
                                                            ne vix
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img src="{{URL::ASSET('images/avatars/face8.jpg')}}" alt="User Avatar" />
                                                    <div class="info">
                                                        <h4>Agnes Howard</h4>
                                                        <span class="time">
                                                            <i class="material-icons">access_time</i> 1 day ago
                                                        </span>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, ei labore persius usu, consul quaeque
                                                            ne vix
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img src="{{URL::ASSET('images/avatars/face9.jpg')}}" alt="User Avatar" />
                                                    <div class="info">
                                                        <h4>Gina Fletcher</h4>
                                                        <span class="time">
                                                            <i class="material-icons">access_time</i> 2 days ago
                                                        </span>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, ei labore persius usu, consul quaeque
                                                            ne vix
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="javascript:void(0);">View All Emails</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- #END# Email -->
                            <!-- Notifications -->
                            @php $notification  = BasicController::notification();  @endphp
                            <li class="dropdown notification-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="label-count">{{count($notification)}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">NOTIFICATIONS</li>
                                    <li class="body">
                                        <ul class="menu">
                                        @if($notification) 
                                            @foreach($notification as $key =>$v)  
                                            <li>
                                                <a href="{{url($v->link)}}" title="{{$v->message}}" class="change-notification-status" data-id='{{$v->id}}'   >
                                                    <div class="icon-circle bg-success">
                                                        <i class="material-icons">person_add</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>{{$v->message}}</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> {{$v->created_at->diffForHumans()}}
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            @endforeach
                                         @endif  
                                           <!--  <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-info">
                                                        <i class="material-icons">add_shopping_cart</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>4 sales made</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 22 mins ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-danger">
                                                        <i class="material-icons">delete_forever</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>Nancy Doe</b> deleted account</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="material-icons">mode_edit</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>Nancy</b> changed name</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 2 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="material-icons">comment</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>John</b> commented your post</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 4 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-success">
                                                        <i class="material-icons">cached</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><b>John</b> updated status</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> 3 hours ago
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-info">
                                                        <i class="material-icons">settings</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>Settings updated</h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> Yesterday
                                                        </p>
                                                    </div>
                                                </a>
                                            </li> -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="javascript:void(0);">View All Notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- #END# Notifications -->
                            <!-- Tasks -->
                            <!-- <li class="dropdown tasks-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    <i class="material-icons">flag</i>
                                    <span class="label-count">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">TASKS</li>
                                    <li class="body">
                                        <ul class="menu tasks">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Footer display issue
                                                        <small>32%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 32%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Make new buttons
                                                        <small>45%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Create new dashboard
                                                        <small>54%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 54%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Solve transition issue
                                                        <small>65%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 65%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <h4>
                                                        Answer GitHub questions
                                                        <small>92%</small>
                                                    </h4>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary-important" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                             style="width: 92%">
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="javascript:void(0);">View All Tasks</a>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- #END# Tasks -->
                            <!-- User Menu -->
                            <li class="dropdown user-menu">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                    @php $admin = Auth::guard('admin')->user();  @endphp
                                    <img src="{{URL::ASSET('uploaded/admin/')}}/{{$admin->image}}" alt="User Avatar" />
                                    <span class="hidden-xs">{{$admin->name}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">
                                        <img src="{{URL::ASSET('uploaded/admin/')}}/{{$admin->image}}" alt="User Avatar" />
                                        <div class="user">
                                            {{$admin->name}}
                                            <div class="title">Admin</div>
                                        </div>
                                    </li>
                                    <li class="body">
                                        <ul>
                                            <li>
                                                <a href="{{url('admin/admin_profile')}}">
                                                    <i class="material-icons">account_circle</i> Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{url('admin/change_password')}}">
                                                    <i class="material-icons">lock_open</i> Change Password
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <div class="row clearfix">
                                            <div class="col-xs-5">
                                                <a href="{{route('admin_logout')}}" class="btn btn-default btn-sm btn-block">Log Off</a>
                                            </div>
                                            <div class="col-xs-2"></div>
                                            <div class="col-xs-5">
                                                <a href="{{route('admin_logout')}}" class="btn btn-default btn-sm btn-block">Log Out</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- #END# User Menu -->
                            <li class="pull-right">
                                <a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                                    <i class="material-icons">more_vert</i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>