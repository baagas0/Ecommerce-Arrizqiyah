@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Payment')
{{-- breadcrumb --}}
@section('breadcrumb','Payment Update')
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
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<form  method="POST" action="{{ url('ip-admin/site/payment/update/'.$payment->id_payment) }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="col-sm-12">
						<label>Image</label>
						<input type="file" id="input-file-now" class="dropify" data-default-file="{{ asset('site/Payment/'.$payment->image)}}" name="image" />
						<small>Preview Not Available On SVG Image !!!</small>
					</div>
					<br>

					<div class="row">
						<div class="col-sm-6">
							<label>Name</label>
							<input type="text" class="form-control" value="{{ $payment->name }}" name="name">
						</div>
						<div class="col-sm-6">
							<label>Status</label>
							<select class="form-control" id="exampleFormControlSelect1" name="status">
                                <option @if($payment->status == '0') selected @endif value="0">Tidak Aktif</option>
                                <option @if($payment->status == '1') selected @endif value="1">Aktif</option>
                            </select>
						</div>
					</div>
					<br>
					<button style="float: right;" type="submit" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i>Info</button>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection
