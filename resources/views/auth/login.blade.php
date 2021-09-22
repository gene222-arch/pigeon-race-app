@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid login-page-container">
    <div class="row justify-content-end">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 login-page-left-col">
            <div class="card" style="width: 100%; height: 86vh">
                <h1 class="text-center py-4">
                    <span class="badge badge-secondary">BEST</span>
                </h1>
                <h3 class="text-center py-4">
                    <span class="badge badge-light">TOURNAMENTS JUST FOR</span>
                </h3>
                <h1 class="text-center py-4">
                    <span class="badge badge-secondary">YOU</span>
                </h1>
                <p class="text-center py-4">
                    <img src="{{ asset('storage/app/mulawin.png') }}" alt="" width="96" height="100"> 
                </p>
                <p class="text-center py-4 text-muted">
                    Easy to use &middot; Secured Server &middot; Quick and Accurate
                </p>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-5">
            <div class="card">
                <div class="card-header text-white login-page-card-header">
                    <h3>
                        <strong>{{ __('Login') }}</strong>
                    </h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror full-width" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password"
                                >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 text-right">
                                <button type="submit" class="btn btn-primary login-btn btn-block">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-right" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
