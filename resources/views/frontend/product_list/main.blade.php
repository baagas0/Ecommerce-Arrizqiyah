@extends('layout.frontend.main')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
<br>
<br>

	<div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-3">
                        <!-- edit in partials -->
                        <div class="sidebar-widget">
                            <div class="row">
                                <div class="col-12">
                                    <span class="sidebar-widget-title--sm">Search</span>
                                    <div class="input-group mb-4">
                                        <form method="get" action="{{ url('list/search') }}">
                                        <input type="text" placeholder="Search ..." class="form-control" name="keyword">
                                        <span class="input-group-append"> <button class="btn btn-primary" type="submit"> <i class="las la-search"></i></button></span>
                                        </form>
                                    </div>
                                    
                              
                                    

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-lg-9">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- edit in partials -->
                                <header class="mb-3">
                                    <div class="form-inline">
                                        <strong class="mr-md-auto">{{ $product->count() }} Items found </strong>
    
                                        <div class="btn-group">
                                            <a href="search-page-list.html" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="List view">
                                                <i class="las la-list"></i></a>
                                            <a href="search-page.html" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="Grid view">
                                                <i class="las la-border-all"></i></a>
                                            <a href="#" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="Price Down">
                                                <i class="las la-sort-amount-down"></i></a>


                                        </div>
                                    </div>
                                </header>
                            </div>
                        </div>

                        <div class="row">
                            @if($product->count() < '1')
                                <div class="container-fluid">
                                <h5 class="text-danger">Sorry Your Product No Available In {{ $site->site_name }}</h5>
                                </div>
                            @endif

                        	@foreach($product as $product1)
                            <div class="col-md-4">
                                <!-- edit in partials -->
                                <div class="card item-card h-100 border-0">
                                    <div class="item-card__image rounded">
                                        <a href="{{ url('product/'.$product1->id_product)}}">
                                            <img src="{{ asset('product/thumbnail/'.$product1->thumbnail) }}" style="width: 100%;height: 250px" class="img-fluid rounded" alt="">
                                        </a>
                                        <div class="hover-icons">
                                            <ul class="list-unstyled">
                                                <li><a href="{{ url('product/'.$product1->id_product)}}" data-toggle="tooltip" data-placement="left" title="Demo"><i class="las la-desktop"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end: Item card image -->
                                    <div class="card-body px-0 pt-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="item-title">
                                                <a href="{{ url('product/'.$product1->id_product)}}">
                                                    <h3 class="h5 mb-0 text-truncate">{{ str_limit($product1->name,18) }}</h3>
                                                </a>
                                            </div>
                                            @if( $product1->best_item == '1')
						                        <div class="badge badge-primary" style="color: #17141d">
						                          <span>Rp.<small><b>{{ number_format($product1->price) }}</b></small></span>
						                        </div>
						                    @else
						                        <div class="badge badge-primary" style="color: #17141d">
						                          <span>Rp.<small><b>{{ number_format($product1->price) }}</b></small></span>
						                        </div>
						                    @endif
                                        </div>
                                        <!-- end: Card info -->
                                        <div class="d-flex justify-content-between align-items-center item-meta">
                                            <div class="short-description mb-0">
                                                @if( $product1->best_item == '1')
						                         <span class="badge badge-primary">Best Item</span> 
						                        @else
						                         <span class="badge badge-danger">Product</span>
						                        @endif
                                            </div>
                                        </div>
                                        <!-- end: Card meta -->
                                    </div>
                                    <!-- edn:Card body -->
                                </div>
                                <!-- end: Card -->
                            </div>
                            @endforeach

                        </div>
                        <hr class="divider divider-fade" />
                        
                        {!! $product->links('vendor.pagination.default') !!}
                    </div>
                </div>
            </div>
@endsection