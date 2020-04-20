<div class="page-wrapper-img">
    <div class="page-wrapper-img-inner">
        <div class="sidebar-user media">                    
            <img src="{{ Auth::user()->profile->avatar }}" alt="user" class="rounded-circle img-thumbnail mb-1">
            <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
            <div class="media-body">
                <h5 class="text-light">{{ Auth::user()->first_name.' '.Auth::user()->last_name }} </h5>
                <ul class="list-unstyled list-inline mb-0 mt-2">
                    <li class="list-inline-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>                    
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">

                    <h4 class="page-title mb-2"><i class="mdi mdi-view-dashboard-outline mr-2"></i>@yield('title')</h4>  
                    <div class="">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">IP-Admin</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">@yield('breadcrumb')</a></li>
                        </ol>
                    </div>                                      
                </div><!--end page title box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
    </div><!--end page-wrapper-img-inner-->
</div><!--end page-wrapper-img-->