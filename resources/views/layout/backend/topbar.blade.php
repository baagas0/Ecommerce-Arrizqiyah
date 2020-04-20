<!-- Top Bar Start -->
        <div class="topbar">
             <!-- Navbar -->
            <nav class="navbar-custom">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ url('ip-admin') }}" class="logo">
                        
                        <span>
                            <img src="{{ asset('site/'.$site->vaficon) }}" alt="logo-small" class="logo-sm">
                        </span>
                        <span>
                            <img src="{{ asset('site/'.$site->logo) }}" alt="logo-large" class="logo-lg">
                        </span>
                    </a>
                </div>
    
                <ul class="list-unstyled topbar-nav float-right mb-0">

                    

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <img src="{{ Auth::user()->profile->avatar }}" alt="profile-user" class="rounded-circle" /> 
                            <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ url('member-area') }}"><i class="dripicons-user text-muted mr-2"></i> Member Area</a>
                            <div class="dropdown-divider"></div>

                            

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="dripicons-exit text-muted mr-2"></i>
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
    
                <ul class="list-unstyled topbar-nav mb-0">
                        
                    <li>
                        <button style="margin-left: 10px;" class="button-menu-mobile nav-link waves-effect waves-light">
                            <i class="mdi mdi-menu nav-icon"></i>
                        </button>
                    </li>

                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                    
                </ul>

            </nav>
            <!-- end navbar-->
        </div>