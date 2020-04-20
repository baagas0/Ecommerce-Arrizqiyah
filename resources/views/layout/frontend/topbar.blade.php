<header class="nav-wrap fixed-top" style="background-color:#cff0cc !important">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark px-lg-0">


             <!-- Navbar -->
            <div class="topbar">
                <nav class="navbar-custom">
                    <div class="topbar-left">
                        <a href="/" class="logo">
                            
                            <span>
                                <img src="{{ asset('site/'.$site->vaficon) }}" alt="logo-small" class="logo-sm">
                            </span>
                            <span>
                                <img src="{{ asset('site/'.$site->logo) }}" alt="logo-large" class="logo-lg">
                            </span>
                        </a>
                    </div>
                </nav>
            </div>



            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item swap-link">
                        <a href="/" class="nav-link">Home</a> 
                    </li>

                    <li class="nav-item swap-link">
                        <a href="{{ url('list') }}" class="nav-link">Product List</a>
                    </li>

                    <li class="nav-item swap-link">
                        <a href="{{ url('contact') }}" class="nav-link">Contact</a>
                    </li>

                    <li class="nav-item swap-link">
                        <a href="{{ url('blog') }}" class="nav-link">Blog</a>
                    </li>
                    
                    <li class="nav-item swap-link">
                        <a href="{{ url('faq') }}" class="nav-link">FAQ</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item d-flex align-items-center">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle no-arrow btn btn-primary swap-link text-white" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Login / Sign Up</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item swap-link" href="{{ url('login')}}">Login</a>
                                <a class="dropdown-item swap-link" href="{{ url('register')}}">Signup</a>
                            </div>
                        </li>
                    </li>
                    @else
                        @if($auth->isAdmin())
                            <li class="nav-item d-flex align-items-center">
                                <li class="nav-item dropdown">
                                    <a class="btn btn-success swap-link text-white" href="{{ url('ip-admin') }}">Admin Dashboard</a>
                                </li>
                            </li>
                        @else
                            <li class="nav-item dropdown megamenu">
                                <a class="nav-link dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i class="las la-user mr-2" style="font-size:22px;"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a class="dropdown-item font-weight-bold swap-link" href="dashboard.html"><i class="las la-user bg-info-alt p-1 rounded text-info"></i> Profile</a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item swap-link" href="{{ url('member-area')}}"><i class="las la-tachometer-alt bg-success-alt p-1 rounded text-info"></i> Member Area</a>
                                    
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item swap-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="las la-sign-out-alt bg-danger-alt text-danger p-1 rounded"></i> Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</header>