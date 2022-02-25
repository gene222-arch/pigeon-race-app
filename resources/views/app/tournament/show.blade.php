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
            <div class="card mt-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Player</th>
                                <th scope="col">Points</th>
                                <th scope="col">Speed per minute</th>
                                <th scope="col">Leg 1 meter per minute</th>
                                <th scope="col">Leg 2 meter per minute</th>
                                <th scope="col">Leg 3 meter per minute</th>
                                <th scope="col">Time</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($tournament->details as $detail)
                                <tr align="center">
                                    <td class="text-secondary">
                                        <strong>{{ $detail->user->name }}</strong>
                                    </td>
                                    <td>{{ $detail->points }}</td>
                                    <td>{{ $detail->speed_per_minute }}</td>
                                    <td>{{ $detail->leg_1_meter_per_minute }}</td>
                                    <td>{{ $detail->leg_2_meter_per_minute }}</td>
                                    <td>{{ $detail->leg_3_meter_per_minute }}</td>
                                    <td>{{ \Carbon\Carbon::parse($detail->created_at)->format('h:i:s A') }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection