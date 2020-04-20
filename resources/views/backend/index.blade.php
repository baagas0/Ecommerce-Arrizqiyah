@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Dashboard')
{{-- breadcrumb --}}
@section('breadcrumb','Dashboard')
{{-- css --}}
@push('css')
<link href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/plugins/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css">
@endpush
{{-- js --}}
@push('js')
<script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.form-upload.init.js') }}"></script>

<script src="{{ asset('admin/plugins/custombox/custombox.min.js') }}"></script>
<script src="{{ asset('admin/plugins/custombox/custombox.legacy.min.js') }}"></script>

<script src="{{ asset('admin/pages/jquery.modal-animation.js') }}"></script>
@endpush
{{-- content --}}
@section('content')
 @if (count($errors) > 0)
    <div class="alert alert-danger">
    <strong>Whoops!</strong> Where the System Finds Human Error With Data Input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    Please <strong>Try Again !!!</strong>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="mt-0">Hello ! {{ Auth::user()->name }}</h4>  
                        <p class="text-muted">{{ $greeting }} ! increase your sales.</p>
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-user-group font-24 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-danger">Users Count</span>
                                        <h3 class="font-weight-bold">{{ $users }}<small> Users</small></h3>

                                        <p class="mb-0 text-muted text-truncate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="fas fa-user-times font-20 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-info">Delete Users</span>
                                        <h3 class="font-weight-bold">{{ $users_deleted }}<small> Users</small></h3>
                                        <p class="mb-0 text-muted text-truncate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-cart font-20 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-warning">Product</span>
                                        <h3 class="font-weight-bold">{{ $product }}<small> Product</small></h3>
                                        <p class="mb-0 text-muted text-truncate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-article font-20 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-success">Blog</span>
                                        <h3 class="font-weight-bold">{{ $blog }}<small> Posted</small></h3>
                                        <p class="mb-0 text-muted text-truncate">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 align-self-center">
                        <img src="{{ asset('admin/images/dash.svg') }}" alt="" class="img-fluid">
                    </div>
                </div>                                                                              
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="{{ asset('site/danger.png') }}">
                    </div>
                    <div class="col-sm-10">
                        <h5>Maintenance Mode !!!</h5>
                        <small>Please Be Care Full Before You Push This Button <i class="mdi mdi-arrow-bottom-left"></i></small>
                        <br>
                        <a href="{{ url('ip-admin/maintenance') }}"><button type="button" class="btn btn-outline-danger waves-effect waves-light"><i class="mdi mdi-power mr-2"></i>Maintenance</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12">
                        <h5>Instant Site Setting</h5>
                    </div>
                </div>

                <br>

                @foreach($site1 as $site2)
                <form method="POST" action="{{ url('ip-admin/site/update/') }}" enctype="multipart/form-data" class="form-horizontal well" role="form">
                {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-7">
                            <label>Logo</label>
                            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{ asset('site/'.$site2->logo) }}" value="{{ $site2->logo }}" name="logo" />
                        </div>

                        <div class="col-sm-5">
                            <label>Vaficon</label>
                            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{ asset('site/'.$site2->vaficon) }}" value="{{ $site2->vaficon }}" name="vaficon" />
                        </div>
                    </div>

                    <br>

                            
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Site Name</label>
                            <input type="text" class="form-control" name="site_name" value="{{ $site2->site_name }}">
                        </div>
                    </div>
                            

                    <br>

                    <button type="submit" style="float: right;" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i> Submit</button>
                    
                </form>
                @endforeach
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
           
</div><!--end row--> 
@endsection
