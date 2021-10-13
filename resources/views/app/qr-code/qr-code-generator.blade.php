@extends('layouts.admin')


@section('content')
    <div class="card ">
        <div class="card-header">
            <div class="row align-items-center justify-space-between">
                <div class="col-9 col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <h4>Qr Codes</h4>
                </div>   
                <div class="col">
                    <a 
                        class="btn btn-danger"
                        href="{{ route('exports.qr.code.pdf') }}"
                        target="_blank"
                    >
                        Print
                    </a>
                </div> 
            </div> 
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($qrCodes as $qrCode)
                    <div class="col">
                        <span class="mr-3">{{  QrCode::size(50)->generate($qrCode->value) }}</span>
                        <span class="text-center">{{ $qrCode->value }}</</span>
                    </div>
                @empty
                    <h4>Empty</h4>
                @endforelse
            </div>
        </div>
    </div>
@endsection