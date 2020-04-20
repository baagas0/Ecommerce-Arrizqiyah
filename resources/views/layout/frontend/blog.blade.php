<div class="section">
    <div class="container">
        <div class="row">

            @foreach($blog as $blog1)

            @if(count($blog) == "1")
                <div class="col-lg-12">
            @elseif(count($blog) == "2")
                <div class="col-lg-6">
            @elseif(count($blog) == "3")
                <div class="col-lg-4">
            @elseif(count($blog) == "4")
                <div class="col-lg-3">
            @endif
            
                <div class="info-box p-4">
                    <img src="{{ asset('thumbnail_blog/'.$blog1->thumbnail) }}" class="img-thumbnail">
                    <h3>
                        {{ str_limit($blog1->title, 80) }}
                    </h3>
                    <div class="card-footer border-0 d-flex justify-content-between align-items-center px-0 py-3">
                        <div class="author-box d-sm-flex flex-row flex-wrap text-center align-items-center">
                            <img src="{{ asset('site/'.$site->vaficon) }}" class="img-sm rounded-circle" alt="profile image" />
                            <div class=" ml-sm-3 ml-md-0 ml-xl-3 text-left">
                                <h6 class="mt-1 mb-0">{{ $blog1->create_by }}</h6>
                                <p class="mb-1">Admin</span></p>
                            </div>
                        </div>
                        <!--/author card --> <a href="#!" class="bg-black py-1 px-2 rounded-pill text-light small">
                            <i class="las la-heart mr-1"></i>145
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>