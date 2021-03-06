@extends('layouts.admin')

@section('content')
    @if (Session::has('messageOnSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('messageOnSuccess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::has('messageOnFailed'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('messageOnFailed') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" target="_self">Dashboard</a></li>
        </ol>
    </nav>
    <div class="alert alert-info" role="alert">
        <div class="row">
            <div class="col-12 col-sm-1 col-md-1 col-lg-1">
                <div class="info-icon text-center">
                    <i class="fas fa-question-circle"></i>
                </div>
            </div>
            <div class="col-12 col-sm-11 col-md-11 col-lg-11">
                <div class="info-text-containe">
                    <p>
                        *Pindutin lamang ang "Quick Clock in" upang makapag tala ng oras sa ating karera.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <video class="qr-scanner" style="width: 0%"></video>
    <div class="container mb-5 featured">
        <div class="row justify-content-center">
           <div class="col-12 col-sm-12 col-md-7 col-lg-7">
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <ul class="list-group list-group-flush">
                    <form action="{{ route('tournaments.clock.in') }}" method="POST">
                        @csrf 
                        <li class="list-group-item">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sticker Code</label>
                                <input 
                                    name="qr_code"
                                    class="form-control bg-secondary @error('qr_code') is-invalid @enderror manual-input-qr-code" id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" 
                                    placeholder="Code"
                                    value="{{ old('qr_code') }}"
                                >
                                @error('qr_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </li>
                        <li class="list-group-item">
                            <button type="submit" class="btn btn-outline-primary btn-block btn-quick-clock-in">Quick Clock In</button>
                        </li>
                    </form>
                    <li class="list-group-item">
                        <a href="{{ route('tournaments.index') }}" class="btn btn-info btn-block">
                            View Result
                        </a>
                    </li>
                    <li class="list-group-item">
                        <form class="form-qr-upload">
                            <input 
                                type="file" 
                                name="image"
                                id="chooseFile"
                                class="input-qr-code"
                                style="display: none"
                            >
                            <label for="chooseFile" class="btn btn-info btn-block upload-qr-code">
                                <i class="fas fa-qrcode mr-3 text-dark"></i>Scan
                            </label>
                        </form>

                        <button 
                            type="button" 
                            class="btn btn-info btn-block btn-scan-thru-webcam"
                        >
                            <i class="fas fa-qrcode mr-3 text-dark"></i>Scan
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/qrScanner.js') }}" type="module"></script>
@endsection
