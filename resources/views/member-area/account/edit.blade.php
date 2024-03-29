@extends('layout.member-area.main')
@section('content')
<div class="col-xl-8">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Account Update</h4>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified nav-tabs-custom" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">
                        <i class="mdi mdi-face-profile mr-1"></i> <span class="d-none d-md-inline-block">User Profile</span> 
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#account" role="tab">
                        <i class="mdi mdi-account-edit-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">Account</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password" role="tab">
                        <i class="mdi mdi-lock-open-variant-outline mr-1 align-middle"></i> <span class="d-none d-md-inline-block">Password</span>
                    </a>
                </li>
                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile" role="tabpanel">
                    {!! Form::model($user->profile, ['method' => 'PATCH', 'route' => ['profile.update', $user->name], 'id' => 'user_profile_form', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-10 offset-1 col-sm-10 offset-sm-1 mb-1">
                                    <div class="row" data-toggle="buttons">
                                        <div class="col-6 col-xs-6 right-btn-container">
                                            <label class="btn btn-primary @if($user->profile->avatar_status == 0) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne:not(.show), .collapseTwo.show">
                                                <input type="radio" name="avatar_status" id="option1" autocomplete="off" value="0" @if($user->profile->avatar_status == 0) checked @endif> Use Gravatar
                                            </label>
                                        </div>
                                        <div class="col-6 col-xs-6 left-btn-container">
                                            <label class="btn btn-primary @if($user->profile->avatar_status == 1) active @endif btn-block btn-sm" data-toggle="collapse" data-target=".collapseOne.show, .collapseTwo:not(.show)">
                                                <input type="radio" name="avatar_status" id="option2" autocomplete="off" value="1" @if($user->profile->avatar_status == 1) checked @endif> Use My Image
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('theme') ? ' has-error ' : '' }}">
                                {!! Form::label('theme_id', trans('profile.label-theme') , array('class' => 'col-12 control-label')); !!}
                                <div class="col-12">
                                    <select class="form-control" name="theme_id" id="theme_id">
                                        @if ($themes->count())
                                            @foreach($themes as $theme)
                                              <option value="{{ $theme->id }}"{{ $currentTheme->id == $theme->id ? 'selected="selected"' : '' }}>{{ $theme->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="glyphicon {{ $errors->has('theme') ? ' glyphicon-asterisk ' : ' ' }} form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('theme'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('theme') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('location') ? ' has-error ' : '' }}">
                                {!! Form::label('location', trans('profile.label-location') , array('class' => 'col-12 control-label')); !!}
                                <div class="col-12">
                                    {!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => trans('profile.ph-location'))) !!}
                                    <span class="glyphicon {{ $errors->has('location') ? ' glyphicon-asterisk ' : ' glyphicon-pencil ' }} form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('bio') ? ' has-error ' : '' }}">
                                {!! Form::label('bio', trans('profile.label-bio') , array('class' => 'col-12 control-label')); !!}
                                <div class="col-12">
                                    {!! Form::textarea('bio', old('bio'), array('id' => 'bio', 'class' => 'form-control', 'placeholder' => trans('profile.ph-bio'))) !!}
                                    <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('bio'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('bio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('twitter_username') ? ' has-error ' : '' }}">
                                {!! Form::label('twitter_username', trans('profile.label-twitter_username') , array('class' => 'col-12 control-label')); !!}
                                <div class="col-12">
                                    {!! Form::text('twitter_username', old('twitter_username'), array('id' => 'twitter_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-twitter_username'))) !!}
                                    <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('twitter_username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('twitter_username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="margin-bottom-2 form-group has-feedback {{ $errors->has('github_username') ? ' has-error ' : '' }}">
                                {!! Form::label('github_username', trans('profile.label-github_username') , array('class' => 'col-12 control-label')); !!}
                                <div class="col-12">
                                    {!! Form::text('github_username', old('github_username'), array('id' => 'github_username', 'class' => 'form-control', 'placeholder' => trans('profile.ph-github_username'))) !!}
                                    <span class="glyphicon glyphicon-pencil form-control-feedback" aria-hidden="true"></span>
                                    @if ($errors->has('github_username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('github_username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group margin-bottom-2">
                                <div class="col-12">
                                    {!! Form::button(
                                        '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitButton'),
                                         array(
                                            'id'                => 'confirmFormSave',
                                            'class'             => 'btn btn-success disabled',
                                            'type'              => 'button',
                                            'data-target'       => '#confirmForm',
                                            'data-modalClass'   => 'modal-success',
                                            'data-toggle'       => 'modal',
                                            'data-title'        => trans('modals.edit_user__modal_text_confirm_title'),
                                            'data-message'      => trans('modals.edit_user__modal_text_confirm_message')
                                    )) !!}

                                </div>
                            </div>
                        {!! Form::close() !!}
                </div>
                
                <div class="tab-pane" id="account" role="tabpanel">
                    <p class="mb-0">
                        Raw denim you probably haven't heard of them jean shorts Austin.
                        Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                        cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                        butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                        qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                        iphone. Seitan aliquip quis cardigan american apparel, butcher
                        voluptate nisi qui.
                    </p>
                </div>

                <div class="tab-pane" id="password" role="tabpanel">
                    <p class="mb-0">
                        Etsy mixtape wayfarers, ethical wes anderson tofu before they
                        sold out mcsweeney's organic lomo retro fanny pack lo-fi
                        farm-to-table readymade. Messenger bag gentrify pitchfork
                        tattooed craft beer, iphone skateboard locavore carles etsy
                        salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                        Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                        mi whatever gluten carles.
                    </p>
                </div>
                
            </div>

        </div>
    </div>
</div>

@endsection