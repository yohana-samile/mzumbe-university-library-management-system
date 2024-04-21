@extends('includes.header')
    <nav class="navbar navbar-expand-md navbar-light bg-primary text-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">{{ __('MU-Library Management System') }}</a>
            {{-- <a class="navbar-brand btn btn-sm btn-danger text-white" href="{{ url('/login') }}"> {{__('Log Me In')}} </a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#our_service">{{ __('Our Service') }}</a>
                            </li>
                        @endif

                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#announcement">{{ __('Announcement') }}</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#usersummary">{{ __('User Summary') }}</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item btn btn-sm btn-light float-right">
                                <a class="nav-link  text-dark float-right" href="{{ url('/login') }}"> {{__('Log Me In')}} </a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="card col-md-4 mx-auto my-4">
        <div class="card-header bg-white">
            <h4 class="text-center">{{__('Login')}}</h4>
        </div>
        <div class="card-body">
            <form id="log_me_in">
                @csrf
                <div class="form-group">
                    <label for="username">{{__('Username')}}</label>
                    <input type="text" name="email" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">{{__('Password')}}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    {{-- <div class="form-group"> --}}
                    <input type="submit" name="submit" value="Login" class="form-control bg-primary text-white">
                </div>

                <div class="mb-0">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <script src="{{ url("vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{ url("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url("vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    {{-- jquery --}}
    <!-- Custom scripts for all pages-->
    <script src="{{ url("js/style.min.js")}}"></script>
    <script src="{{ url("js/custom.js")}}"></script>
