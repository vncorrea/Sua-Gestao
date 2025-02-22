@extends('layouts.app')

<div class="">
    <div class="row justify-content-center h-100">
        <div class="col-12 col-lg-5 d-flex justify-content-center align-items-center">
            <form method="POST" class="w-100 m-5" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-dark-subtle" id="basic-addon1">
                            <i class="bi bi-people-fill my-1"></i>
                        </span>
                    </div>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="E-mail"
                           value="{{ old('email') }}"
                           required
                           autocomplete="email"
                           autofocus
                           aria-label="Username"
                           aria-describedby="basic-addon1">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

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
        <div class="col-lg-7 d-none d-lg-block">
            <div class="w-100 h-100" style="background-image: url('{{ asset('images/bg-preview-login.png') }}');">
            </div>
        </div>
    </div>
</div>
