@extends('layout.backend.main')
{{-- title --}}
@section('title', '')
{{-- breadcrumb --}}
@section('breadcrumb','')
{{-- css --}}
@push('css')
@endpush
{{-- js --}}
@push('js')
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
    @foreach($blog as $blog)
    <div class="col-lg-4">
        <div class="card text-center">
            <div class="card-body">
                <div class="blog-card mb-3">
                    <img src="{{ asset('blog/'.$blog->thumbnail)}}" alt="" class="img-fluid"/>
                    <div class="meta-box">
                        <ul class="p-0 mt-4 list-inline">
                            <li class="list-inline-item">{{ $blog->create_at }}</li>
                            <li class="list-inline-item">by <a href="#">{{ $blog->create_by }}</a></li>
                        </ul>
                    </div><!--end meta-box-->            
                    <h4 class="mt-2">
                        <a href="">{{ $blog->title }}</a>
                    </h4>
                </div><!--end blog-card-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div>
    @endforeach
</div>
@endsection
