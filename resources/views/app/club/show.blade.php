@extends('layouts.admin')

@section('content')
    <div class="card">
        <img 
            class="card-img-top" 
            src="{{ $club->logo_path }}" 
            alt="Card image cap"
            width="100"
            height="400"
        >
        <div class="card-body">
            <div class="card-title">
                <h4>{{ $club->name }} <span class="badge badge-pill {{ $club->status !== 'Active' ? 'badge-disabled' : 'badge-success' }}">{{ $club->status }}</span></h4>
            </div>
            <div class="card-text">
                <ul class="list-group">
                    <li class="list-group-item active"><strong>Tournament Information</strong></li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Club Coordinates</strong>
                            </div>
                            <div class="col">
                                {{ $club->club_coordinates }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Current Balance</strong>
                            </div>
                            <div class="col">
                                {{ $club->current_balance }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Address</strong>
                            </div>
                            <div class="col">
                                {{ $club->address }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row align-items-center justify-space-between">
                            <div class="col">
                                <strong class="text-secondary">Player Coordinates</strong>
                            </div>
                            <div class="col">
                                {{ $club->player_coordinates }}
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Pigeon Image</th>
                        <th scope="col">Ring Band No.</th>
                        <th scope="col">Points</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($club->players as $player)
                      <tr>
                          <td>{{ $player->id }}</td>
                          <td>
                              <img src="{{ $player->logo_path }}" width="100" height="100" alt="">
                          </td>
                          <td>
                              {{ $player->name }}
                          </td>
                          <td>
                            <img src="{{ $player->logo_path }}" width="100" height="100" alt="">
                          </td>
                          <td>{{ '' }}</td>
                          <td>{{ '' }}</td>
                          <td>{{ $player->created_at }}</td>
                      </tr>
                  @empty
                      <h4>Empty</h4>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection