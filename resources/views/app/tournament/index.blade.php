@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">
        @if (Session::has('messageOnSuccess'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('messageOnSuccess') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @hasrole('Admin')
            <div class="card my-3 p-3">
                <div class="row align-items-center justify-space-between">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <a type="button" class="btn btn-success" href="{{ route('tournaments.create') }}">
                            <i class="fas fa-plus fa-2x"></i>
                        </a>
                    </div>
                    @if ($hasActiveTournaments)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                            <a type="button" class="btn btn-warning" href="{{ route('tournaments.start.time') }}">
                                <i class="fas fa-clock text-info mr-1"></i> Start Tournament
                            </a>
                        </div>
                    @endif
                    @if ($timeStartedAt)
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                            <a type="button" class="btn btn-warning" href="{{ route('tournaments.create') }}">
                                Time started: <span class="text-secondary">{{ $timeStartedAt }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endhasrole
        <div class="card">
            <div class="card-header bg-warning">
                <h5>Tournaments</h5>
            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Privacy</th>
                    <th scope="col">Club Name</th>
                    <th scope="col">Tournament Name</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Legs</th>
                    <th scope="col">Total Birds</th>
                    <th scope="col">Date Created</th>
                </tr>
                </thead>
                    <tbody>
                        @forelse ($tournaments as $tournament)
                        <tr>
                            <td>
                                @hasrole('User')
                                    <a 
                                        type="button" 
                                        class="btn btn-{{ \App\Models\Club::find(Auth::user()?->club?->club_id)?->name !== $tournament->club_name ? 'dark' : 'info' }} btn-block" 
                                        href="{{ route('tournaments.show', [ 'tournament' => $tournament->id ]) }}"
                                        aria-disabled="{{ \App\Models\Club::find(Auth::user()?->club?->club_id)?->name !== $tournament->club_name }}"
                                    >
                                        <i class="fas fa-eye text-{{ \App\Models\Club::find(Auth::user()?->club?->club_id)?->name === $tournament->club_name ? 'white' : 'secondary' }}"></i>
                                    </a>
                                @endhasrole

                                @hasrole('Admin')
                                    <a 
                                        type="button" 
                                        class="btn btn-info btn-block" 
                                        href="{{ route('tournaments.show', [ 'tournament' => $tournament->id ]) }}"
                                    >
                                        <i class="fas fa-eye text-white"></i>
                                    </a>
                                @endhasrole
                                
                                @hasrole('Admin')
                                    <a 
                                        type="button" 
                                        class="btn btn-warning btn-block" 
                                        href="{{ route('tournaments.edit', [ 'tournament' => $tournament->id ]) }}"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endhasrole
                                @hasrole('Admin')
                                    <form method="POST" action="{{ route('tournaments.destroy', $tournament->id) }}">
                                        @csrf
                                        @method('DELETE')
                                    
                                        <div class="form-group my-2">
                                            <button 
                                                type="submit" 
                                                class="btn btn-danger btn-block"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                @endhasrole
                        </td>
                        <td class='text-center'>
                            <i class="fas {{ !$tournament->is_public ? 'fa-lock' : 'fa-globe-asia' }}"></i>
                        </td>
                        <td>
                            {{ $tournament->club_name }}
                        </td>
                        <td>
                            {{ $tournament->name }}
                        </td>
                        <td>
                            {{ $tournament->remarks }}
                        </td>
                        <td class="text-center">
                            {{ $tournament->legs }}
                        </td>
                        <td class="text-center">
                            {{ $tournament->birds_count }}
                        </td>
                        <td>
                            {{ $tournament->created_at }}
                        </td>
                    </tr>
                    @empty
                        <h4>Empty</h4>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $tournaments->links() }}
@endsection
