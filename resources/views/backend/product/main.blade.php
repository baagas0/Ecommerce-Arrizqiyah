@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Product Management')
{{-- breadcrumb --}}
@section('breadcrumb','Product')
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
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    	<div class="row">
                    		<div class="col-6">
        		                <h4 class="mt-0 header-title">Product Management</h4>
                    		</div>
                    		<div class="col-6" >
                    			<a href="{{ url('ip-admin/product/add') }}"><button style="float: right;margin-bottom: 10px" type="button" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus mr-2"></i>Tambah</button></a> 
                    		</div>
                    	</div>


                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>ID Categry</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->id_category }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>@if($product->status == '0') <span class="badge badge-warning">Tidak Aktif</span> @elseif($product->status == '1') <span class="badge badge-success">Aktif</span> @endif</td>
                                        <td>
                                            <a href="{{ url('ip-admin/product/edit/'.$product->id_product) }}">
                                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                                            </a>
                                            <a href="{{ url('ip-admin/product/delete/'.$product->id_product) }}">
                                                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </a>
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
