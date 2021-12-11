@extends('layouts.admin')

@section('content')
    <div class="card">
        <img 
            class="card-img-top" 
            src="https://i.guim.co.uk/img/media/4f9193ea0a25b57fdef97fccc18f36715c3f9d72/0_542_3264_1958/master/3264.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=160a2b92a9276172dbd587d24d71f781" 
            alt="Card image cap"
            width="100"
            height="400"
        >
        <div class="card-body">
            <div class="card-title">
                <h4>{{ $myPigeon->ring_band }} <span class="badge badge-pill badge-success">{{ $myPigeon->status }}</span></h4>
            </div>
            <div class="card-text">
                <ul class="list-group">
                    <li class="list-group-item active"><strong>Pigeon Information</strong></li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Gender</strong>
                            </div>
                            <div class="col">
                                {{ $myPigeon->gender }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Color</strong>
                            </div>
                            <div class="col">
                                {{ $myPigeon->color }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Remarks</strong>
                            </div>
                            <div class="col">
                                {{ $myPigeon->remarks }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Bloodline</strong>
                            </div>
                            <div class="col">
                                {{ $myPigeon->bloodline }}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection