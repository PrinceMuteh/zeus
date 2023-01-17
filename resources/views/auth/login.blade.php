<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Zeus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/logo.jpeg')}}">
    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="form_background">
        <div class="left-form-section">
            <p class="left-text">Unlocking value for <br> connected vehicle(s)</p>
        </div>
        <div class="right-form-section">
            <div class="formBox">
                <div class="cardTop">
                    <img src="{{ asset('/assets/images/zeus.svg') }}" alt="" height="40" width="40"
                        style="border-radius: 5px" />
                    <p class="admin_title text-inter">Zeus console Login</p>
                    @include('components.message')
                    <p class="subtitleText text-center">
                        Enter your details to sign in to your account
                    </p>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="text"
                            placeholder="Enter Email / Username" value="{{ old('email') }}" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                            type="password" placeholder="Password" password />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="question mb-2">
                        <span>Having trouble getting in?</span>
                    </div>
                    <div class="form-group mb-4">
                        <input type="submit" value="Sign in" class="form-control mb-2 btn-submit text-inter">
                    </div>
                </form>
                <div class="form-group d-flex justify-content-center">
                    <a class="question_account" href="/login">Don't have an account? <span
                            class="font-weight-bold text-dark">Request
                            Now</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



{{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
