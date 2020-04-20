@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Product Management')
{{-- breadcrumb --}}
@section('breadcrumb','Product')
{{-- css --}}
@push('css')
	<link href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
@endpush
{{-- js --}}
@push('js')
	<script src="{{ asset('admin/plugins/repeater/jquery.repeater.min.js') }}"></script>
	<script src="{{ asset('admin/pages/jquery.form-repeater.js') }}"></script>
	<script src="{{ asset('admin/plugins/tiny-editable/mindmup-editabletable.js') }}"></script>
	<script src="{{ asset('admin/plugins/tiny-editable/numeric-input-example.js') }}"></script>
	<script src="{{ asset('admin/plugins/tabledit/jquery.tabledit.js') }}"></script> 
	<script src="{{ asset('admin/pages/jquery.tabledit.init.js') }}"></script> 
	<script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/pages/jquery.form-upload.init.js') }}"></script>
    <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/pages/jquery.form-editor.init.js') }}"></script>
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h5 class="mt-0">Add Product</h5>
                {{-- <p class="text-muted font-13 mb-4">An interface to add and remove a repeatable group of input elements.</p> --}}

                <form method="POST" action="{{ url('ip-admin/product/add/store') }}" enctype="multipart/form-data" class="form-horizontal well" role="form">
                    {{csrf_field()}}

                    <fieldset>
                        <div class="row">
                            <div class="col-sm-11">
                                <label>Product Thumbnail ( 520x400 )</label>
                                <input type="file" id="input-file-now" class="dropify" name="thumbnail" />
                            </div>
                        </div>

                        <br>

                        <div class="repeater-default">
                            <div data-repeater-list="image">
                                <div data-repeater-item="">
                                    <div class="form-group row d-flex align-items-end">
                                        
                                        <div class="col-sm-11">
                                            <label class="control-label">Product Image ( 950x500 )</label>
                                            <input type="file" id="input-file-now" class="dropify" name="image[0]" />
                                        </div><!--end col-->
                            
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
                                    <span data-repeater-create="" class="btn btn-light">
                                        <span class="fas fa-plus"></span> Add
                                    </span>
                                </div><!--end col-->
                            </div><!--end row-->                                         
                        </div> <!--end repeter-->   
                        
                        <br>
                        
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Name</label>
                                <input class="form-control" type="text" name="name">
                            </div>

                            <div class="col-sm-3">
                                <label>Category</label>
                                <select class="form-control" name="id_category">
                                    <option>Select</option>
                                    @foreach($category as $category)
                                    <option value="{{ $category->id_category }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label>Best Item</label>
                                <select class="form-control" name="best_item">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label>Price</label>
                                <input class="form-control" type="number" name="price">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <label>Product Description</label>
                                <textarea id="elm1" name="description"></textarea>
                            </div>
                        </div>        

                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="repeater-default">
                                    <div data-repeater-list="feature">
                                        <div data-repeater-item="">
                                            <div class="form-group row d-flex align-items-end">
                                                
                                                <div class="col-sm-11">
                                                    <label class="control-label">Product Feature</label>
                                                    <input class="form-control" type="text" name="feature[0]">
                                                </div><!--end col-->
                                    
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
                                            <span data-repeater-create="" class="btn btn-light">
                                                <span class="fas fa-plus"></span> Add
                                            </span>
                                        </div><!--end col-->
                                    </div><!--end row-->                                         
                                </div> <!--end repeter-->  
                            </div>
                        </div>    

                        <br>

                        <div class="row">
                            <div class="col-sm-12">
                                <label>Product Checkout</label>
                                <input class="form-control" type="text" name="checkout">
                            </div>
                        </div>   

                        <br>

                        <div class="row" style="float: right;">
                            <button type="Submit" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i>Submit</button>
                        </div>
                    </fieldset><!--end fieldset-->

                </form><!--end form-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
</div> <!-- end row -->    
@endsection
