@extends('layouts.admin')


@section('content')
    <div class="card ">
        <div class="card-header">
            <div class="row align-items-center justify-space-between">
                <div class="col-9 col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <h4>Qr Codes</h4>
                </div>   
                <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="row align-items-center">
                        @if (! $qrCodes->count())
                            <div class="col mb-2">
                                <form action="{{ route('generate.qrcode.store') }}" method="POST">
                                    @csrf
                                    <button 
                                        class="btn btn-success w-100 py-3"
                                        target="_blank"
                                    >
                                        Generate
                                    </button>
                                </form>
                            </div>
                        @endif
                        @if ($qrCodes->count())
                            <div class="col mb-2">
                                <a 
                                    class="btn btn-info w-100 py-3"
                                    href="{{ route('exports.qr.code.pdf') }}"
                                    target="_blank"
                                >
                                    Print
                                </a>
                            </div>
                        @endif
                        {{-- <div class="col mb-2">
                            <form action="{{ route('generate.qrcode.clear') }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button 
                                    class="btn btn-danger w-100 py-3"
                                    target="_blank"
                                >
                                    Clear
                                </button>
                            </form>
                        </div> --}}
                    </div>
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
                    
                @endforelse
            </div>
        </div>
    </div>
@endsection