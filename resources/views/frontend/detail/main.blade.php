@extends('layout.frontend.main')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
	<section>
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-9">
                    <div class="product-info">

                        <!-- Item Img Slider -->
                        <div class="swiper-container rounded border">
                            <div class="swiper-wrapper">
                                @foreach(json_decode($product->image) as $image1)
                                <div class="swiper-slide">
                                    <img src="{{ asset('product/'.$image1) }}" alt="image">
                                </div>
                                @endforeach
                                
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>


                    <div class="product-description-text pr-lg-2">
                        <h1 class="mt-4 mb-4">
                            {{ $product->name }}
                        </h1>
                        <p class="lead">
                            {!! $product->description !!}
                        </p>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="sidebar-widget bg-light-soft">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="sidebar-widget-title--sm">Features</span>
                                            <ul class="list-unstyled mb-0">

                                                @foreach(json_decode($product->feature) as $feature)
                                                <li>
                                                    <i class="las la-check mr-2 text-success"></i>{{ $feature }}
                                                </li>
                                                @endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="sidebar-widget bg-light-soft">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="sidebar-widget-title--sm">Product Detail</span>
                                            <ul class="list-unstyled mb-0">

                                                
                                                <li>
                                                    Name : {{ $product->name }}
                                                </li>

                                                <li>
                                                    Harga : Rp. {{ number_format($product->price) }}
                                                </li>

                                                <li>
                                                    Category : 
                                                    <div class="badge badge-primary">   {{ $category->name }}
                                                    </div>
                                                </li>

                                                <li>
                                                    Best Product : 
                                                    @if($product->best_item == '1')
                                                        <i class="mdi mdi-bookmark-remove mdi-24px" style="color: blue"></i>
                                                    @else
                                                        <i class="mdi mdi-bookmark-check mdi-24px" style="color: blue"></i>
                                                    @endif
                                                </li>

                                                <li>
                                                    Last Update : {{ date('d-m-Y', strtotime($product->create_at)) }}
                                                </li>
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach(json_decode($product->image) as $image)
                        <img src="{{ asset('product/'.$image) }}" alt="" class="img-fluid mt-5 mb-4 rounded" />
                        @endforeach
                        
                        <br>

                        <div class="row mb-4 d-flex justify-content-between">
                            <div class="col-md-8">
                                <h6 class="mb-2">Regular Ask</h6>
                                <p>
                                    For More Question Please Visit FAQ
                                </p>
                            </div>
                        </div>
                        <!-- Accordions-->
                        <div id="faq-accordion" class="mb-5">
                            @foreach($faq as $faq)
                            <div class="card mb-2 mb-md-3">
                                <a href="#accordion-1" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0 mr-2">{{ $faq->title }}</h6>
                                        <i class="las la-arrow-right icon"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="accordion-1" data-parent="#faq-accordion">
                                    <div class="px-3 px-md-4 pb-3 pb-md-4">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--/ end: accordion -->
                    </div>

                </div>
                <!-- edn: Col 9 -->
                <div class="col-md-5 col-lg-3" style="">
                    <div class="sidebar sticky-lg-top sticky-md-top">
                        <div class="sidebar-widget">
                            
                            {{-- <hr> --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="sidebar-widget bg-light-soft">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="sidebar-widget-title--sm">Product Detail</span>
                                                <ul class="list-unstyled mb-0">

                                                    
                                                    <li>
                                                        Name : {{ str_limit($product->name, 20) }}
                                                    </li>

                                                    <li>
                                                        Harga : Rp. {{ number_format($product->price) }}
                                                    </li>

                                                    <li>
                                                        Category : 
                                                        <div class="badge badge-primary">   {{ $category->name }}
                                                        </div>
                                                    </li>

                                                    <li>
                                                        Best Product : 
                                                        @if($product->best_item == '1')
                                                            <i class="mdi mdi-bookmark-remove mdi-24px" style="color: blue"></i>
                                                        @else
                                                            <i class="mdi mdi-bookmark-check mdi-24px" style="color: blue"></i>
                                                        @endif
                                                    </li>

                                                    <li>
                                                        Last Update : {{ date('d-m-Y', strtotime($product->create_at)) }}
                                                    </li>
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ $product->checkout }}">
                            <button class="btn btn-primary btn-block" type="button">
                                Purchase Now
                            </button></a>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection