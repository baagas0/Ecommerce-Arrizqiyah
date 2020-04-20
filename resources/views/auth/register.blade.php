@extends('xoric.login.main')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-5 col-sm-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="p-2">
                    <h5 class="mb-5 text-center">{{ 'Register Account To '.$site->site_name }}</h5>
                    <form class="form-horizontal"  method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="First Name">

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Last Name">

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Username">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-mail">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmation Password">
                                    </div>
                                </div>


                                @if(config('settings.reCaptchStatus'))
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <div class="g-recaptcha" data-sitekey="{{ config('settings.reCaptchSite') }}"></div>
                                        </div>
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Register</button>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="auth-login.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</a>
                                </div>

                                <div class="center" style="margin: auto;width: 70%;padding: 10px;">
                                @include('login.partials.socials')
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
    @if(config('settings.reCaptchStatus'))
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif
@endsection
