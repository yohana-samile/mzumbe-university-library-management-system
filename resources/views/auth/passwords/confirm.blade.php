@extends('includes.header')
<h4 class="text-center my-4">{{__('SRMS')}}</h4>
<div class="justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center">{{ __('Confirm Password') }}</div>
            <div class="card-body">
                {{ __('Please confirm your password before continuing.') }}
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="bg-primary text-white form-control" value="Confirm Password">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

