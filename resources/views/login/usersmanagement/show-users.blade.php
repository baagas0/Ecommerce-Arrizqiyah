@extends('layout.backend.main')

@push('css')
    @if(config('usersmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('usersmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endpush

@section('content')
@if ($message = Session::get('success'))
  <div class="alert alert-primary alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif
@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mt-0">Users Data Management</h4>  
                            <h5>{{ 'number of users : '.$users->count() }}</h5>
                            {{-- <p class="text-muted">Good morning ! Have a nice day.</p> --}}
                            <div class="row justify-content-center">
                                <div class="col-md-12">

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0;">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
    
    
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td class="hidden-xs"><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                                                <td class="hidden-xs">{{$user->first_name}}</td>
                                                <td class="hidden-xs">{{$user->last_name}}</td>
                                                <td>
                                                    @foreach ($user->roles as $user_role)
                                                        @if ($user_role->name == 'User')
                                                            @php $badgeClass = 'primary' @endphp
                                                        @elseif ($user_role->name == 'Admin')
                                                            @php $badgeClass = 'warning' @endphp
                                                        @elseif ($user_role->name == 'Unverified')
                                                            @php $badgeClass = 'danger' @endphp
                                                        @else
                                                            @php $badgeClass = 'default' @endphp
                                                        @endif
                                                        <span class="badge badge-{{$badgeClass}}">{{ $user_role->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {!! Form::open(array('url' => 'ip-admin/users/' . $user->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                        {!! Form::hidden('_method', 'DELETE') !!}
                                                        {!! Form::button(trans(''), array('class' => 'btn btn-danger btn-sm mdi mdi-trash-can-outline','type' => 'submit', 'style' =>'width: 100%;' )) !!}
                                                    {!! Form::close() !!}

                                                    <a class="btn btn-sm btn-success btn-block mdi mdi-eye-settings-outline mt-2" href="{{ URL::to('ip-admin/users/' . $user->id) }}" data-toggle="tooltip" title="Edit">
                                                        
                                                    </a>

                                                    <a class="btn btn-sm btn-info btn-block mdi mdi-square-edit-outline" href="{{ URL::to('ip-admin/users/' . $user->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                        
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        </tbody>
                                    </table> 

                                </div>
                            </div>
                        </div>
                    </div>       
                </div><!--end card-body--> 

            </div><!--end card--> 
        </div> <!--end col-->                               
    </div><!--end row--> 

    @include('login.modals.modal-delete')

@endsection

@push('js')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.datatable.init.js') }}"></script> 
    @if ((count($users) > config('usersmanagement.datatablesJsStartCount')) && config('usersmanagement.enabledDatatablesJs'))
        @include('login.scripts.datatables')
    @endif
    @include('login.scripts.delete-modal-script')
    @include('login.scripts.save-modal-script')
    @if(config('usersmanagement.tooltipsEnabled'))
        @include('login.scripts.tooltips')
    @endif
    @if(config('usersmanagement.enableSearchUsers'))
        @include('login.scripts.search-users')
    @endif
@endpush
