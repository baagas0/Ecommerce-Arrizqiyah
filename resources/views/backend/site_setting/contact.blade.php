@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Contact')
{{-- breadcrumb --}}
@section('breadcrumb','Contact')
{{-- css --}}
@push('css')
@endpush
{{-- js --}}
@push('js')
<script src="{{ asset('admin/plugins/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.form-repeater.js') }}"></script>

<script>
	$('textarea').each(function () {
	  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
	}).on('input', function () {
	  this.style.height = 'auto';
	  this.style.height = (this.scrollHeight) + 'px';
	});
</script>
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
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<label>Contact</label>
				<hr>
				<form method="POST" action="{{ url('ip-admin/contact/update') }}">
					{{ csrf_field() }}
					<div class="row">
						@foreach($contact as $contact)
						<div class="col-md-3">
							<label>Phone</label>
							<input type="text" class="form-control" value="{{ $contact->phone }}" name="phone">
						</div>

						<div class="col-md-3">
							<label>Telegram</label>
							<input type="text" class="form-control" value="{{ $contact->telegram }}" name="telegram">
						</div>

						<div class="col-md-3">
							<label>Email</label>
							<input type="text" class="form-control" value="{{ $contact->email }}" name="email">
						</div>

						<div class="col-md-3">
							<label>Location</label>
							<input type="text" class="form-control" value="{{ $contact->location }}" name="location">
							<br>
						</div>

						@endforeach
					</div>
					<button style="float: right;" type="Submit" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i>Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h5 class="mt-0">General Questions</h5>
                <hr>

                <form method="POST" class="form-horizontal well" role="form">
                    <fieldset>
                        <div class="repeater-default">
                            <div data-repeater-list="car">
                                <div data-repeater-item="">
                                    <div class="form-group row d-flex align-items-end">
                                        
                                        <div class="col-md-3">
											<label>Title</label>
											<input type="text" class="form-control" value="" name="">
										</div>
                                        
                                        <div class="col-md-8">
											<label>Answer</label>
											<input type="text" class="form-control" value="" name="">
										</div>
                            
                                       
                            
                                        <div class="col-sm-1">
                                            <span data-repeater-delete="" class="btn btn-danger btn-sm">
                                                <span class="far fa-trash-alt mr-1"></span> Delete
                                            </span>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end /div-->

                            </div><!--end repet-list-->
                            <div class="form-group mb-0 row">
                                <div class="col-sm-12">
                                    <button style="float: right;" type="Submit" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i>Submit</button>

                                    <span data-repeater-create="" class="btn btn-light" style="float: right;margin-right: 10px">
                                        <span class="fas fa-plus"></span> Add
                                    </span>
                                </div><!--end col-->
                            </div><!--end row-->                                         
                        </div> <!--end repeter-->                                           
                    </fieldset><!--end fieldset-->
                </form><!--end form-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
</div> --}} <!-- end row -->  
@endsection
