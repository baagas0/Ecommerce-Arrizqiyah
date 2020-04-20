@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Site Setting')
{{-- breadcrumb --}}
@section('breadcrumb','Site Setting')
{{-- css --}}
@push('css')
<link href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/plugins/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css">
@endpush
{{-- js --}}
@push('js')
<script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.form-upload.init.js') }}"></script>

<script src="{{ asset('admin/plugins/custombox/custombox.min.js') }}"></script>
<script src="{{ asset('admin/plugins/custombox/custombox.legacy.min.js') }}"></script>

<script src="{{ asset('admin/pages/jquery.modal-animation.js') }}"></script>


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
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

            	<div class="row">
            		<div class="col-sm-12">
            			<h5>Site Setting</h5>
            		</div>
            	</div>

            	<br>

        		@foreach($site1 as $site2)
            	<form method="POST" action="{{ url('ip-admin/site/update/') }}" enctype="multipart/form-data" class="form-horizontal well" role="form">
            	{{csrf_field()}}
	            	<div class="row">
	            		<div class="col-sm-7">
	            			<label>Logo</label>
			                <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{ asset('site/'.$site2->logo) }}" value="{{ $site2->logo }}" name="logo" />
	            		</div>

	            		<div class="col-sm-5">
	            			<label>Vaficon</label>
			                <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{ asset('site/'.$site2->vaficon) }}" value="{{ $site2->vaficon }}" name="vaficon" />
	            		</div>
	            	</div>

	            	<br>

	            			
	            	<div class="row">
	            		<div class="col-sm-12">
	            			<label>Site Name</label>
			                <input type="text" class="form-control" name="site_name" value="{{ $site2->site_name }}">
	            		</div>
	            	</div>
			                

	            	<br>

	            	<button type="submit" style="float: right;" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i> Submit</button>
	            	
            	</form>
            	@endforeach
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
                <div class="row">
				<div class="col-sm-6">
					<h5>Payment Method</h5>	
				</div>	
                <div class="col-sm-6">
                    <a href="#add-payment" style="float: right;" class="btn btn-primary waves-effect" data-animation="contentscale" data-plugin="custommodal" data-overlayColor="#38414a">Add Payment</a>
                </div>
                </div>
                    <br>

					<div class="table-responsive">
                        <table class="table table-striped mb-0" id="payment">
                            <thead hidden="">
                                <th>asd</th>
                                <th>asd</th>
                                <th>asd</th>
                                <th>asd</th>
                                <th>asd</th>
                            </thead>
                            <tbody>
        					@foreach($payment as $payment1)
                            <tr>
                                <td>
                                    <a class="user-avatar mr-2" href="#">
                                        <img src="{{ asset('site/payment/'.$payment1->image) }}" alt="user" class="thumb-xl rounded">
                                    </a>
                                </td>
                                <td>{{ $payment1->name }}</td>
                                <td hidden="">{{ $payment1->image }}</td>
                                <td>@if($payment1->status == '0') <span class="badge badge-warning">Tidak Aktif</span> @elseif($payment1->status == '1') <span class="badge badge-success">Aktif</span> @endif</td>
                                <td>                                                       
                                    <a href="{{ url('ip-admin/site/payment/edit/'.$payment1->id_payment) }}"><button type="button" class="edit btn btn-sm btn-success"><i class="fas fa-edit"></i></button></a>

                                    <a href="{{ url('ip-admin/site/payment/delete/'.$payment1->id_payment) }}"><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->
			</div>
		</div>
	</div>
</div>

{{-- <div id="update-payment" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form method="POST" id="editform">
                {{ csrf_field()}}
                <div class="modal-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-12">
                            <input type="file" id="image" class="dropify"  name="image" />
                        </div>  
                    </div>
                    <p>Name</p>
                    <input class="form-control" type="text" placeholder="Payment Name"  name="name" id="name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> --}}

<div id="add-payment" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Add Payment</h4>
    <div class="custom-modal-text">
        <form method="POST" action="{{ url('ip-admin/site/payment/add') }}" enctype="multipart/form-data" class="form-horizontal well" >
            {{csrf_field()}}
            <div class="row">
                    <div class="col-sm-12">
                        <input type="file" id="input-file-now-custom-1" class="dropify" name="image" />
                    </div>
                    <div class="col-sm-12">
                    <br>
                        <label>Name</label>
                        <input type="text"  class="form-control" name="name" />
                    </div>
                    <div class="col-sm-12">
                    <br>
                        <button type="submit" style="float: right;" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i> Submit</button>
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection
