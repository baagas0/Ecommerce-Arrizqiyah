<hr class="divider divider-fade">


<div class="row mb-4 mt-3 d-flex justify-content-between align-items-center">
    <div class="col-md-8">
        <h5 class="mb-0">New Product</h5>
    </div>
    
</div>


<div class="row">

    @foreach($newproduct as $newproduct)
    <div class="col-md-3">
        <div class="card item-card h-100 border-0">
            <div class="item-card__image rounded">
                <a href="{{ url('product/'.$newproduct->id_product)}}" class="swap-link">
                    <img src="{{ asset('product/thumbnail/'.$newproduct->thumbnail) }}" style="width: 100%;height: 250px" class="img-fluid rounded" alt="">
                </a>
                <div class="hover-icons">
                    <ul class="list-unstyled">
                        <li><a href="{{ url('product/'.$newproduct->id_product)}}"><i class="las la-desktop"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- end: Item card image -->
            <div class="card-body px-0 pt-3">
                <div class="d-flex justify-content-between align-items-start">


                    <div class="item-title">
                        <a href="{{ url('product/'.$newproduct->id_product)}}">
                            <h3 class="h5 mb-0 text-truncate">{{ str_limit($newproduct->name,18) }}</h3>
                        </a>
                    </div>

                    @if( $newproduct->best_item == '1')
                        <div class="badge badge-primary" style="color: #17141d">
                          <span>Rp.<small><b>{{ number_format($newproduct->price) }}</b></small></span>
                        </div>
                    @else
                        <div class="badge badge-primary" style="color: #17141d">
                          <span>Rp.<small><b>{{ number_format($newproduct->price) }}</b></small></span>
                        </div>
                    @endif

                
                </div>
                <!-- end: Card info -->
                <div class="d-flex justify-content-start align-items-center item-meta">
                    <div class="short-description mb-0">
                        @if( $newproduct->best_item == '1')
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
<div class="row d-flex justify-content-center">
    <div class="col-7 text-center mt-3"> <a href="{{ url('list') }}" class="btn btn-white "><i class="las la-paper-plane mr-2"></i>Get All</a> </div>
</div>