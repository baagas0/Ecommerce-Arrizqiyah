@extends('layout.frontend.main')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
{{--  <div class="breadcrumb-wrap" style="visibility: hidden;">
                <div class="container py-3">
                    <div class="row d-flex justify-content-md-between justify-content-sm-center">
                        <div class="col-md-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        Library
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="header-actions">
                            <button class="btn btn-ghost grey-dark font-weight-bold">
                                <i class="las la-share-alt"></i>
                                <span>Share</span>
                            </button>
                            <button class="btn btn-ghost grey-dark like-button font-weight-bold">
                                <i class="las la-hand-holding-heart"></i>
                                <span>150 Likes</span>
                            </button>
                            <button class="btn btn-ghost grey-dark font-weight-bold">
                                <i class="las la-bookmark"></i>
                                <span><span>Save for Later</span></span>
                            </button>

                            <!---->
                        </div>
                    </div>
                </div>
            </div> --}}
	<div class="row " style="margin-top: 10px">
        
        <div class="col-lg-12">
            <div class="alert bg-info-alt text-info alert-dismissible fade show mb-4" role="alert">
                <strong>Welcome back!</strong> You should check in on some of those fields below.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <h2>How can we help?</h2>
            <p class="lead">If you need help with the product, please contact the shop owner by visiting their shop profile and sending them a message. For anything else (licensing, billing, etc), please visit our Help Center.</p>

            <hr class="divider divider-fade">
            
            <div id="purchase" class="">
                <div class="row">

                	@foreach($regular as $regular)
                    <div class="col-md-6">
                        <h4 class="mt-5">{{ $regular->title }}</h4>
                        <p>{{ $regular->answer.'.'}}</p>
                    </div>
                    @endforeach
                    
                </div>
                <!--/end:row-->
                <hr class="divider divider-fade py-4">
                
                
                <div id="licence" class="">
                    <div id="faq-accordion" class="mb-5">

                    	@foreach($special as $special)
                        <div class="card mb-2 mb-md-3">
                            <a href="#accordion-1" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 mr-2">{{ $regular->title }}</h6>
                                    <i class="las la-arrow-right icon"></i>
                                </div>
                            </a>
                            <div class="collapse" id="accordion-1" data-parent="#faq-accordion">
                                <div class="px-3 px-md-4 pb-3 pb-md-4">
                                    {{ $regular->answer.'.'}}
                                </div>
                            </div>
                        </div>
                        @endforeach
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection