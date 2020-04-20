@extends('layout.backend.main')
{{-- title --}}
@section('title', '')
{{-- breadcrumb --}}
@section('breadcrumb','')
{{-- css --}}
@push('css')
<link href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
@endpush
{{-- js --}}
@push('js')
<script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.form-upload.init.js') }}"></script>
@endpush
{{-- content --}}
@section('content')
<div class="row">

    <div class="col-xl-12">
    	 @if (count($errors) > 0)
    	 <div class="body"><div class="body-body">
		    <div class="alert alert-danger">
		    <strong>Whoops!</strong> Where the System Finds Human Error With Data Input.<br><br>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    Please <strong>Try Again !!!</strong>
		    </div>
		 </div></div>
		@endif
        <div class="card">
            <div class="card-body">
            	<form enctype="multipart/form-data" action="{{ url('ip-admin/banner/post') }}" method="POST">
            		{{ csrf_field() }}

                	<h4 class="mt-0 header-title">Home Banner Option</h4>
            		
                <hr>
	                <label>Image Home</label><br>
	                <p><b>Nb : </b> PNG File | dimensions : 570x555px</p>
	                <input type="file" name="image" accept=".png" id="input-file-now-custom-1" class="dropify" data-default-file="{{ asset('site/banner/'.$banner->image) }}" />

	                <div class="row">
	                	<div class="col-sm-6">
		                	<label class=" mt-2">Title</label>
			                <input type="text" name="title" class="form-control" value="{{$banner->title }}">
		                </div>
		                <div class="col-sm-6">
			                <label class="mt-2">Description</label>
			                <input type="text" name="description" class="form-control mt-2" value="{{$banner->description }}">
			            </div>
	                </div>

	                <button type="submit" style="float: right;" class="btn btn-outline-info waves-effect waves-light mt-2"><i class="mdi mdi-send mr-2"></i>Submit</button>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->

</div><!--end row-->


@endsection
