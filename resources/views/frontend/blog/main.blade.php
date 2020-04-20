@extends('layout.frontend.main')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
<div class="row d-flex flex-wrap align-items-stretch mt-3">
    <div class="container">
    <div class="featured-post mb-5 bg-soft-green rounded hover-box-shadow">
        <div class="row align-items-md-center">
            <div class="col-lg-6 col-md-12">
                <div class="featured-post--img position-relative ">
                    <a href="{{ url('/blog/'.$latest_blog->id_blog) }}">
                    <img alt="bg image" class="bg-image thumbnail rounded-left" src="{{ asset('thumbnail_blog/'.$latest_blog->thumbnail) }}" />
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="p-4">

                    <div class="blog-date d-flex justify-content-start align-items-center mb-2">
                        <a href="{{ url('/blog/'.$latest_blog->id_blog) }}" class="label font-weight-bold"><span class="badge badge-danger">New Blog</span></a>
                    </div>

                    <h2 class="h3 mb-2">
                        <a href="#" class="blog-title text-dark">{{ $latest_blog->title }}</a>
                    </h2>

                    <div class="card-footer border-0 d-flex justify-content-between align-items-center mt-5 px-0 py-3">
                        <div class="author-box d-sm-flex flex-row flex-wrap text-center align-items-center">
                            <img src="{{ asset('site/'.$site->vaficon) }}" class="img-sm rounded-circle" alt="profile image" />
                            <div class=" ml-sm-3 ml-md-0 ml-xl-3 text-left">
                                <h6 class="mt-1 mb-0">{{ $latest_blog->create_by }}</h6>
                                <p class="mb-1">Admin</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @foreach($blog as $blog)
    <div class="col-md-4 mb-4">
        <div class="card colored-card color-light hover-box-shadow border-0">
            <div class="card-body p-1 bg-primary-alt">
                <div class="blog-date d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ url('/blog/'.$blog->id_blog) }}">
                    <img src="{{ asset('thumbnail_blog/'.$blog->thumbnail) }}" class="img-thumbnail">
                    </a>
                </div>

                <div class="container-fluid">
                    <h4 >
                        <a href="{{ url('/blog/'.$blog->id_blog) }}" class="blog-title">{{ str_limit($blog->title, 80) }}</a>
                    </h4>
                    

                    <div class="card-footer border-0 d-flex justify-content-between align-items-center px-0 py-3">
                        <div class="author-box d-sm-flex flex-row flex-wrap text-center align-items-center">
                            <img src="{{ asset('site/'.$site->vaficon) }}" class="img-sm rounded-circle" alt="profile image" />
                            <div class=" ml-sm-3 ml-md-0 ml-xl-3 text-left">
                                <h6 class="mt-1 mb-0">{{ $blog->create_by }}</h6>
                                <p class="mb-1">Admin</span></p>
                            </div>
                        </div>
                        <!--/author card --> <a href="#!" class="bg-black py-1 px-2 rounded-pill text-light small">
                            <i class="las la-heart mr-1"></i>145
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection