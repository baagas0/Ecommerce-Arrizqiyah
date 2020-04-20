@extends('layout.backend.main')
{{-- title --}}
@section('title', 'Category Management')
{{-- breadcrumb --}}
@section('breadcrumb','Category')
{{-- css --}}
@push('css')
<link href="{{ asset('admin/plugins/custombox/custombox.min.css') }}" rel="stylesheet" type="text/css">
@endpush
{{-- js --}}
@push('js')
<script src="{{ asset('admin/plugins/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.form-repeater.js') }}"></script>

<script src="{{ asset('admin/plugins/custombox/custombox.min.js') }}"></script>
<script src="{{ asset('admin/plugins/custombox/custombox.legacy.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.modal-animzation.js') }}"></script>

{{-- <script src="{{ asset('admin/js/datatables.min.js')}}"></script>

<script>

    var table = $('#category').DataTable();

    table.on('click','.edit', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#id_category').val(data[1]);
        $('#name').val(data[2]);

        $('#editform').attr('action','/dsadmin/category/update/' + data[0]);
        $('#update').modal('show');

    });


</script> --}}
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

                <h5 class="mt-0">Add Category</h5>
                {{-- <p class="text-muted font-13 mb-4">An interface to add and remove a repeatable group of input elements.</p> --}}

                <form method="POST" action="{{ url('ip-admin/category/add') }}" class="form-horizontal well" role="form">
                    {{csrf_field()}}

                    <fieldset>
                        <div class="repeater-default">
                            <div data-repeater-list="category">
                                <div data-repeater-item="">
                                    <div class="form-group row d-flex align-items-end">
                                        
                                        <div class="col-sm-11">
                                            <label class="control-label">Name</label>
                                            <input class="form-control" type="text" name="category[0][name]">
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
                                    <input type="submit" value="Submit" class="btn btn-success">
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Category Management</h4>

                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="category">
                    <thead>
                      <tr>
                        <th>ID Category</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $data)
                      <tr>
                          <td>{{ $data->id_category }}</td>
                          <td>{{ $data->name }}</td>
                          <td>
                            <a href="{{ url('ip-admin/category/edit/'.$data->id_category) }}">
                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></button>
                            </a>
                            <a href="{{ url('ip-admin/category/delete/'.$data->id_category) }}"><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></a>
                          </td>
                      </tr>
                        @endforeach
                    </tbody>
                </table><!--end table-->   
                </div>  
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!-- end col -->
</div> <!-- end row --> 


{{-- <div id="update" class="modal">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Animation Modal title</h4>
    <div class="custom-modal-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
    </div>
</div> --}}

{{-- <div  id="update" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content1">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="custom-modal-title">Update Cateogory</h4> --}}
                        {{-- <h5>Update Category</h5>
                        <hr>
                        <div class="custom-modal-text">
                            <form method="POST" id="editform" enctype="multipart/form-data" class="form-horizontal well" >
                                {{csrf_field()}}
                                <div class="row">
                                        <div class="col-sm-12">
                                            <label>ID Category</label>
                                            <input type="text"  class="form-control" name="id_category" />
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
            </div> --}}
        {{-- </div>/.modal-content --}}
    {{-- </div>/.modal-dialog --}}
{{-- </di/v> --}} 

{{-- <div id="update-category" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Update Cateogory</h4>
    <div class="custom-modal-text">
        <form method="POST" id="editform" enctype="multipart/form-data" class="form-horizontal well" >
            {{csrf_field()}}
            <div class="row">
                    <div class="col-sm-12">
                        <label>ID Category</label>
                        <input type="text"  class="form-control" name="id_category" />
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
</div> --}}
@endsection
