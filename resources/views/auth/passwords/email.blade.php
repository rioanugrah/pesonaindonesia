{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('backend/assets_new/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets_new/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets_new/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body class="bg-pattern">
    <div class="bg-overlay"></div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <a href="{{ url('/') }}" class="">
                                    <img src="{{ asset('backend/assets3/icon/logo_plesiran_new_black.png') }}" alt="" height="48" class="auth-logo logo-dark mx-auto">
                                    <img src="{{ asset('backend/assets3/icon/logo_plesiran_new_black.png') }}" alt="" height="48" class="auth-logo logo-light mx-auto">
                                </a>
                            </div>
                            
                            <h4 class="font-size-18 text-muted text-center mt-2">Forget Password</h4>
                            {{-- <p class="text-muted text-center mb-4">Get your free Upzet account now.</p> --}}
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="useremail" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-grid mt-4">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Send Password Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-white-50">Already have account ?<a href="{{ route('login') }}" class="fw-medium text-primary"> Login </a> </p>
                        <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> CV Pesona Plesiran Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
    <script src="{{ asset('backend/assets_new/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets_new/js/app.js') }}"></script>
</html>