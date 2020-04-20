@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Faq')
{{-- breadcrumb --}}
@section('breadcrumb','Update Faq')
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
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{ url('ip-admin/faq/update/'.$faq->id_faq) }}">
					{{csrf_field()}}
				
				<div class="row">
					<div class="col-sm-12">
						<label>Title</label>
						<input type="text" class="form-control" value="{{ $faq->title }}" name="title">
					</div>
					<br>
					<div class="col-sm-12">
						<label>Answer</label>
						<input type="text" class="form-control" value="{{ $faq->answer }}" name="answer">
					</div>
					<div class="col-sm-12">
						<br>
						<button type="submit" style="float: right;" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i>Submit</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>	
@endsection
