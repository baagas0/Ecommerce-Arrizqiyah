@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Faq')
{{-- breadcrumb --}}
@section('breadcrumb','Faq')
{{-- css --}}
@push('css')
@endpush
{{-- js --}}
@push('js')
<script src="{{ asset('admin/plugins/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.form-repeater.js') }}"></script>
@endpush
{{-- content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h5 class="mt-0">Faq</h5>
                <hr>

                <form method="POST" action="{{ url('ip-admin/faq/store') }}" class="form-horizontal well" role="form">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="repeater-default">
                            <div data-repeater-list="faq">
                                <div data-repeater-item="">
                                    <div class="form-group row d-flex align-items-end">
                                        
                                        <div class="col-md-3">
											<label>Title</label>
											<input type="text" class="form-control" value="" name="faq[title][title]">
										</div>
                                        
                                        <div class="col-md-8">
											<label>Answer</label>
											<input type="text" class="form-control" value="" name="faq[answer][answer]">
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
</div> <!-- end row -->  

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Faq Management</h4>
                

                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Answer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faq as $faq)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $faq->title }}</td>
                            <td>{{ $faq->answer }}</td>
                            <td>@if($faq->status == '0') <span class="badge badge-success">Regular</span> @elseif($faq->status == '1') <span class="badge badge-primary">Special</span> @endif</td>
                            <td>                                                       
                                <a href="{{ url('ip-admin/faq/edit/'.$faq->id_faq) }}"><button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button></a>
                                <a href="{{url('ip-admin/faq/delete/'.$faq->id_faq) }}"><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table><!--end /table-->
                </div><!--end /tableresponsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
