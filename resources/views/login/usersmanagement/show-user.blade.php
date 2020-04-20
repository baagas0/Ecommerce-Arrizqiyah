@extends('layout.backend.main')
@section('title', 'User Management')
{{-- breadcrumb --}}
@section('breadcrumb','User Management')
{{-- css --}}
@push('css')


@php
  $levelAmount = trans('usersmanagement.labelUserLevel');
  if ($user->level() >= 2) {
    $levelAmount = trans('usersmanagement.labelUserLevels');
  }
@endphp

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 align-self-center">
                        <img src="@if ($user->profile && $user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mt-2">
                                <input type="text" class="form-control" name="" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-12 mt-2">
                                <input type="text" class="form-control" name="" value="{{ $user->first_name.' '.$user->last_name }}">
                            </div>
                            <div class="col-md-12 mt-2">
                                <input type="text" class="form-control" name="" value="{{ $user->email }}">
                            </div>
                            <div class="col-md-12 mt-2">
                                <a href="{{ url('ip-admin/users/1/edit') }}" class="btn btn-sm bg-info"><i class="mdi mdi-account-edit"></i> Edit User</a>

                                <a href="" class="btn btn-sm bg-danger"><i class="mdi mdi-trash-can"></i> Delete User</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <label>Username :</label>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="col-md-12">
                                <label>First Name :</label>
                                <p>{{ $user->first_name }}</p>
                            </div>
                            <div class="col-md-12">
                                <label>Last Name :</label>
                                <p>{{ $user->last_name }}</p>
                            </div>
                            <div class="col-md-12">
                                <label>Create At :</label>
                                <p>{{ $user->created_at }}</p>
                            </div>
                            <div class="col-md-12">
                                <label>Update At :</label>
                                <p>{{ $user->updated_at }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <label>Email :</label>
                                @if($user->email)
                                <br>
                                  <span class="text-center" data-toggle="tooltip" data-placement="top" title="{{ trans('usersmanagement.tooltips.email-user', ['user' => $user->email]) }}">
                                    {{ Html::mailto($user->email, $user->email) }}
                                  </span>
                                @endif
                            </div>
                            <div class="col-md-12 mt-2">
                                <label>Role :</label>
                                <br>
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
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Status :</label>
                                <br>
                                @if ($user->activated == 1)
                                  <span class="badge badge-success">
                                    Activated
                                  </span>
                                @else
                                  <span class="badge badge-danger">
                                    Not-Activated
                                  </span>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Access Level :</label>
                                <br>
                                @if($user->level() >= 5)
                                  <span class="badge badge-primary margin-half margin-left-0">5</span>
                                @endif

                                @if($user->level() >= 4)
                                   <span class="badge badge-info margin-half margin-left-0">4</span>
                                @endif

                                @if($user->level() >= 3)
                                  <span class="badge badge-success margin-half margin-left-0">3</span>
                                @endif

                                @if($user->level() >= 2)
                                  <span class="badge badge-warning margin-half margin-left-0">2</span>
                                @endif

                                @if($user->level() >= 1)
                                  <span class="badge badge-default margin-half margin-left-0">1</span>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Permissions :</label>
                                <br>
                                @if($user->canViewUsers())
                                  <span class="badge badge-primary margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionView') }}
                                  </span>
                                @endif

                                @if($user->canCreateUsers())
                                  <span class="badge badge-info margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionCreate') }}
                                  </span>
                                @endif

                                @if($user->canEditUsers())
                                  <span class="badge badge-warning margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionEdit') }}
                                  </span>
                                @endif

                                @if($user->canDeleteUsers())
                                  <span class="badge badge-danger margin-half margin-left-0">
                                    {{ trans('permsandroles.permissionDelete') }}
                                  </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>                                                                              
            </div><!--end card-body--> 
            
        </div><!--end card--> 
    </div> <!--end col-->                               
</div>

  @include('login.modals.modal-delete')

@endsection

@push('js')
  @include('login.scripts.delete-modal-script')
  @if(config('usersmanagement.tooltipsEnabled'))
    @include('login.scripts.tooltips')
  @endif
@endpush
