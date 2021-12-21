@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid register-container">
    <div class="row justify-content-end align-items-center register-row-container">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header text-white register-page-header text-right">
                    <i class="fas fa-user-shield fa-2x"></i>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row align-items-center">
                                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label for="email">{{ __('Loft Name') }}</label>
                                    </div>
                                    <div class="col-7 col-xs-7 col-sm-7 col-md-7">
                                        <input id="loft_name" type="text" class="form-control @error('loft_name') is-invalid @enderror" name="loft_name" value="{{ old('loft_name') }}" required autocomplete="loft_name">
            
                                        @error('loft_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                    </div>
        
                                    <div class="col-7 col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label for="name">{{ __('Name') }}</label>
                                    </div>
        
                                    <div class="col-7 col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label for="phone">{{ __('Phone') }}</label>
                                    </div>
                                    <div class="col-7 col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                        <input 
                                            id="phone" 
                                            type="text" 
                                            class="form-control @error('phone') is-invalid @enderror" 
                                            name="phone" 
                                            value="{{ old('phone') }}" 
                                            required 
                                            autocomplete="email"
                                        >
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label for="address">{{ __('Address') }}</label>
                                    </div>
                                    <div class="col-7 col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="email">
    
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label for="password">{{ __('Password') }}</label>
                                    </div>
                                    <div class="col-7 col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    </div>
        
                                    <div class="col-7 col-xs-7 col-sm-7 col-md-7">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2">Coordinate</span>
                                    </div>
                                    <select 
                                        class="custom-select @error('coordinate_id') is-invalid @enderror"
                                        name="coordinate_id"
                                    >
                                        <option value="">Select Coordinate</option>
                                        @foreach ($coordinates as $coordinate)
                                            <option 
                                                value="{{ $coordinate->id }}" {{ old('coordinate_id') === $coordinate->id ? 'selected' : '' }}
                                            >
                                                {{ $coordinate->coordinate .' '. $coordinate->distance_in_km . '(km)' }}
                                        </option>   
                                        @endforeach
                                    </select>
                                    @error('coordinate_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Club</span>
                                    </div>
                                    <select 
                                        class="custom-select @error('club_id') is-invalid @enderror"
                                        name="club_id"
                                    >
                                        <option value="">Select Club</option>
                                        @foreach ($clubs as $club)
                                            <option 
                                                value="{{ $club->id }}" {{ old('club_id') === $club->id ? 'selected' : '' }}
                                            >
                                                {{ $club->name }}
                                        </option>   
                                        @endforeach
                                    </select>
                                    @error('club_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary register-btn w-100 p-3">
                                    {{ __('Create Player') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 register-page-left-col mb-5">
            <h1 class="text-center mt-5">Create Your Player</h1>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-5">
            @include('includes.footer')
        </div>
    </div>
</div>
@endsection
