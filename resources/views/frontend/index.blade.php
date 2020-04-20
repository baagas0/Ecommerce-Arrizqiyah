@extends('layout.frontend.main')

@section('content')
	@if ($message = Session::get('success'))
	<div class="container">
		<div class="">
	      <div class="alert alert-success alert-block mt-3">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	          <h5>Thank You,</h5>
	          <p>Now You're Subscriber On {{ $site->site_name }}</p>
	      </div>
		</div>
	</div>
    @endif
	@include('layout.frontend.banner')
	    @include('layout.frontend.bestitems')
	    	@include('layout.frontend.newproduct')
	    @include('layout.frontend.feature')
	@include('layout.frontend.blog')
@endsection