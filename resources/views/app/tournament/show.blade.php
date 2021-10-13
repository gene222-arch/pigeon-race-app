@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>{{ $tournament->name }} <i class="fas {{ !$tournament->is_public ? 'fa-lock' : 'fa-globe-asia' }}"></i></h4>
            </div>
            <div class="card-text">
                <ul class="list-group">
                    <li class="list-group-item active"><strong>Tournament Information</strong></li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Name</strong>
                            </div>
                            <div class="col">
                                {{ $tournament->name }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Club Name</strong>
                            </div>
                            <div class="col">
                                {{ $tournament->club_name }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Remarks</strong>
                            </div>
                            <div class="col">
                                {{ $tournament->remarks }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Legs</strong>
                            </div>
                            <div class="col">
                                {{ $tournament->legs }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Birds Count</strong>
                            </div>
                            <div class="col">
                                {{ $tournament->birds_count }}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection