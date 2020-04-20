@extends('layout.member-area.main')
@section('content')
<div class="col-xl-8">
    <div class="card">
        <div class="card-body">
            <h5 class="header-title">Private Account Detail</h5>
            <hr>
            <div class="row">
            	<div class="col-sm-4">
            		<label>Username</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->name }}">
            	</div>
            	<div class="col-sm-4">
            		<label>First Name</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->first_name }}">
            	</div>
            	<div class="col-sm-4">
            		<label>Last Name</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->last_name }}">
            	</div>
            </div>
            <br>
            <div class="row">
            	<div class="col-sm-4">
            		<label>Email</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->email }}">
            	</div>
            	<div class="col-sm-4">
            		<label>Register Date</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->created_at }}">
            	</div>
            	<div class="col-sm-4">
            		<label>Last Update</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->updated_at }}">
            	</div>
            </div>
            <br>
            <div class="row">
            	<div class="col-sm-4">
            		<label>Email Confirmation</label>
            		<input type="text" class="form-control" name=""  readonly @if(Auth::user()->activated == '1') value="Confirm" @else value="Unconfirm" @endif>
            	</div>
            	<div class="col-sm-4">
            		<label>Sign Up IP Address</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->signup_ip_address }}">
            	</div>
            	<div class="col-sm-4">
            		<label>Confirm Ip Adress</label>
            		<input type="text" class="form-control" name="" readonly value="{{ Auth::user()->signup_confirmation_ip_address }}">
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection