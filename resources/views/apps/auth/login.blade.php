<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('backend/assets_new/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets_new/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets_new/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <title>Login</title>
</head>
<body class="bg-pattern">
    <div class="bg-overlay"></div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="">
                                <div class="text-center">
                                    <a href="{{ url('/') }}" class="">
                                        <img src="{{ asset('backend/assets3/icon/logo_plesiran_new_black.png') }}" alt="" height="48" class="auth-logo logo-dark mx-auto">
                                        <img src="{{ asset('backend/assets3/icon/logo_plesiran_new_black.png') }} alt="" height="48" class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                <h4 class="font-size-18 text-muted mt-2 text-center">Login App</h4>
                                {{-- <p class="mb-5 text-center">Sign in to continue to Upzet.</p> --}}
                                <form class="form-horizontal" method="POST" action="{{ route('apps.post.login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }} id="customControlInline">
                                                        <label class="form-label" class="form-check-label" for="customControlInline">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-md-end mt-3 mt-md-0">
                                                        @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Login</button>
                                                    <a class="btn btn-secondary waves-effect waves-light" href="{{ route('login_google','google') }}"><i class="fab fa-google"></i> Google</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-white-50">Don't have an account ? <a href="{{ route('register') }}" class="fw-medium text-primary"> Register </a> </p>
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