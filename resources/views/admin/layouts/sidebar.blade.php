<aside class="sidebar">
            <nav class="sidebar-nav">
                <ul class="metismenu">
                  
                    <li>
                        <a href="{{url('admin/dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/users')}}">
                            <i class="material-icons">supervised_user_circle</i>
                            <span class="nav-label">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/girls_profile')}}">
                            <i class="material-icons">dashboard</i>
                            <span class="nav-label">Girls Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('services')}}">
                            <i class="material-icons">dashboard</i>
                            <span class="nav-label">Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/reports')}}">
                            <i class="material-icons">dashboard</i>
                            <span class="nav-label">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('transaction')}}">
                            <i class="material-icons">payment</i>
                            <span class="nav-label">Transaction</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('unlock_photo_admin')}}">
                            <i class="material-icons">image</i>
                            <span class="nav-label">Unlock photo</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('notice')}}">
                            <i class="material-icons">account_box</i>
                            <span class="nav-label">Admin Notice</span>
                        </a>
                    </li>  
               
                    </li> -->
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span class="nav-label">Settings</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{url('admin/live')}}">Go Live</a>
                            </li>
                            <li>
                                <a href="{{url('admin/feature')}}">Feature profile</a>
                            </li>
                            <li>
                                <a href="{{url('admin/bump_up')}}">Bump Up profile</a>
                            </li>
                            <li>
                                <a href="{{route('custom_field')}}">Custom fields</a>
                            </li>
                            <li>
                                <a href="{{route('contacts')}}">Contact fields</a>
                            </li>
                            <li>
                                <a href="{{route('states')}}">States</a>
                            </li>
                            <li>
                                <a href="{{route('packages')}}">Packages</a>
                            </li>
                            <li>
                                <a href="{{route('terms_and_conditions')}}">Terms & Condition</a>
                            </li>
                            <li>
                                <a href="{{url('admin/change_password')}}">Change Password</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('admin/logout')}}">
                            <i class="material-icons">exit_to_app</i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>