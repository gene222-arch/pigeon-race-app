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

    @if (Session::has('errorMessage'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('errorMessage') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    @hasrole('Admin')
        <div class="card my-3 p-3">
            <div class="row align-items-center">
                <div class="col-5 col-sm-3">
                    <a type="button" class="btn btn-success" href="{{ route('clubs.create') }}">
                        <i class="fas fa-plus fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    @endhasrole
    <div class="card">
      <div class="card-header bg-warning">
          <h5>Clubs</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Actions</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Club Coordinates</th>
                    <th scope="col">Country</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
              @forelse ($clubs as $club)
                  <tr>
                      <td class="text-center">
                          <a type="button" class="btn btn-info btn-block" href="{{ route('clubs.show', [ 'club' => $club->id ]) }}">
                              <i class="fas fa-eye text-white"></i>
                          </a>
                          @hasrole('Admin')
                              <a type="button" class="btn btn-warning btn-block" href="{{ route('clubs.edit', [ 'club' => $club->id ]) }}">
                                  <i class="fas fa-edit"></i>
                              </a>
                          @endhasrole
                          @hasrole('Admin')
                              <form method="POST" action="{{ route('clubs.destroy', $club->id) }}">
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
                      <td>
                          <img src="{{ $club->logo_path }}" width="100" height="100" alt="">
                      </td>
                      <td>
                          {{ $club->name }}
                      </td>
                      <td>{{ $club->club_coordinates }}</td>
                      <td>{{ $club->country }}</td>
                      <td>{{ $club->address }}</td>
                      <td>{{ $club->created_at }}</td>
                      <td>
                          <span class="badge {{ $club->status !== 'Active' ? 'badge-disabled' : 'badge-success' }}">{{ $club->status }}</span>
                      </td>
                      <td>{{ $club->created_at }}</td>
                  </tr>
              @empty
                  
              @endforelse
            </tbody>
        </table>
      </div>
  </div>
</div>
@endsection