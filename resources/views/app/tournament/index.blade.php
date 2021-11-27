@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">
        @hasrole('Admin')
            <div class="card my-3 p-3">
                <div class="row align-items-center">
                    <div class="col-5 col-sm-3">
                        <a type="button" class="btn btn-success" href="{{ route('tournaments.create') }}">
                            <i class="fas fa-plus fa-2x"></i>
                        </a>
                    </div>
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
