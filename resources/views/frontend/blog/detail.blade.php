@extends('layout.frontend.main')
@push('css')

@endpush
@push('js')

@endpush
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-9">
        <div class="blog-post mb-5 mt-2">
            <div class="blog-post--header mb-6">

                <h1 class="blog-title">
                    {{ $blog->title }}
                </h1>
                <div class="meta-info">
                    <ul class="list-unstyled list-inline">
                        <li class="post-author list-inline-item">
                            By <a href="#" tabindex="0">{{ $blog->create_by }}</a>
                        </li>
                        <li class="post-date list-inline-item">{{ $blog->create_at }}</li>

                    </ul>
                </div>
            </div>

            {!! $blog->content !!}
        </div>
        <hr class="my-5" />
        

        <h3>Leave a reply</h3>

        <!-- Form -->
        <form class="mb-2">
            <div class="form-row">
                <div class="col-sm">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" />
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea name="reply" rows="6" class="form-control" placeholder="Your Reply"></textarea>
            </div>
            <div>
                <button class="btn btn-primary btn-wide btn-md" type="submit">
                    Leave Reply
                </button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>
@endsection