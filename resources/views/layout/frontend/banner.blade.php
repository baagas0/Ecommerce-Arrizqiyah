<div class="container">
    <div class="intro-2 poition-relative">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-8">
                <h1 class="intro-title">
                    {{ $banner->title }}
                </h1>
                <p class="lead">
                    {{ $banner->description }}
                </p>
                <div class="row">
                    <div class="col-md-7">
                        <div class="input-group mb-3">
                            <form method="get" action="{{ url('/list/search') }}">
                            {{-- {{ csrf_field() }} --}}
                                <input type="text" class="form-control border-0 bg-white" placeholder="Search assets ..." aria-label="search" aria-describedby="basic-addon2" name="keyword" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="las la-search"></i></button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-none d-sm-block">
                <img class="card-img-top opacity-8" src="{{ asset('site/banner/'.$banner->image) }}" alt="image" />
            </div>
        </div>
    </div>
</div>