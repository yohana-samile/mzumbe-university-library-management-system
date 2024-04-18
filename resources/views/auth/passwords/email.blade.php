@extends('includes.header')
<h4 class="text-center my-4">{{__('SRMS')}}</h4>
<div class="row justify-content-center">
    <div class="card col-md-5">
        <div class="card-header text-center">{{ __('Reset Password') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-0">
                    <input type="submit" value="Send Password Reset Link" class="form-control text-white bg-primary">
                </div>
            </form>
        </div>
    </div>
</div>

