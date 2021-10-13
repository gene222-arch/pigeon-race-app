@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>{{ $coordinate->name }}</h4>
            </div>
            <div class="card-text">
                <ul class="list-group">
                    <li class="list-group-item active"><strong>Coordinate Information</strong></li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Name</strong>
                            </div>
                            <div class="col">
                                {{ $coordinate->name }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Coordinate</strong>
                            </div>
                            <div class="col">
                                {{ $coordinate->coordinate }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Distance(km)</strong>
                            </div>
                            <div class="col">
                                {{ $coordinate->distance_in_km }}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection