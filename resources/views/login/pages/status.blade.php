@extends('login.layouts.app')

@section('template_title')
	See Message
@endsection

@section('head')
@endsection

@section('content')

 <div class="container">
	<div class="row">
	    <div class="col-md-12">
			 @include('login.partials.form-status')
        </div>
    </div>
</div>

@endsection