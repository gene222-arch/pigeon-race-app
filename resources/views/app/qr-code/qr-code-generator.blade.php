@extends('layouts.admin')


@section('content')
    <div class="card ">
        <div class="card-header">
            Qr Codes 
        </div>
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
@endsection