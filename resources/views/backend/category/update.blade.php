@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Category')
{{-- breadcrumb --}}
@section('breadcrumb','Update Category')
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
				<form method="POST" action="{{ url('ip-admin/category/update/'.$category->id_category) }}">
					{{ csrf_field() }}
					<label>Update Category</label>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<label>ID Category</label>
							<input type="text" class="form-control" name="id_category" disabled="" value="{{ $category->id_category }}">
						</div>
						<div class="col-sm-6">
							<label>Name</label>
							<input type="text" class="form-control" name="name" value="{{ $category->name }}">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<button type="submit" style="float: right;" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i>Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
