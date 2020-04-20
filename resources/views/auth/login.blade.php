@extends('xoric.login.main')

@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-5 col-sm-8">
            <div class="card">
                <div class="card-body p-4">
                    <div class="p-2">
                        <h5 class="mb-5 text-center">{{ 'Sign In To Continue To '.$site->site_name }}</h5>
                        <form method="POST" class="form-horizontal" action="{{ route('login') }}">
                        @csrf

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="E-mail">

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

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-md-right mt-3 mt-md-0">
                                                <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="{{ url('register')}}" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                    </div>
                                </div>
                                
                                

                                <div class="center" style="margin: auto;width: 70%;padding: 10px;">
                                    @include('login.partials.socials')
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
            