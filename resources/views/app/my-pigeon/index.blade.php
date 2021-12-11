@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    @if (Session::has('messageOnDeleteSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('messageOnDeleteSuccess') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @hasrole('User')
        <div class="card my-3 p-3">
            <div class="row align-items-center">
                <div class="col-5 col-sm-3">
                    <a type="button" class="btn btn-success" href="{{ route('my-pigeons.create') }}">
                        <i class="fas fa-plus fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    @endhasrole
    <div class="card">
      <div class="card-header bg-warning">
          <h5>My Pigeons</h5>
      </div>
      <table class="table table-hover">
          <thead class="thead-dark">
              <tr>
                  <th scope="col">Action</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Ring Band#</th>
                  <th scope="col">Color or Gender</th>
                  <th scope="col">Remarks</th>
                  <th scope="col">Blood Line</th>
                  <th scope="col">Status</th>
                  <th scope="col">Date Created</th>
              </tr>
          </thead>
          <tbody>
            @forelse ($myPigeons as $myPigeon)
                <tr>
                    <td class="text-center">
                        <a type="button" class="btn btn-info btn-block" href="{{ route('my-pigeons.show', [ 'my_pigeon' => $myPigeon->id ]) }}">
                            <i class="fas fa-eye text-white"></i>
                        </a>
                        @hasrole('User')
                            <a type="button" class="btn btn-warning btn-block" href="{{ route('my-pigeons.edit', [ 'my_pigeon' => $myPigeon->id ]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endhasrole
                        @hasrole('User')
                            <form method="POST" action="{{ route('my-pigeons.destroy', $myPigeon->id) }}">
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
                        <img src="{{ $myPigeon->image_path }}" width="100" height="100" alt="">
                    </td>
                    <td>
                        {{ $myPigeon->ring_band }}
                    </td>
                    <td>
                        {{ $myPigeon->color . ' ' . $myPigeon->gender }}
                    </td>
                    <td>{{ $myPigeon->remarks }}</td>
                    <td>{{ $myPigeon->bloodline }}</td>
                    <td>
                        <span class="badge badge-success">{{ $myPigeon->status }}</span>
                    </td>
                    <td>{{ $myPigeon->created_at }}</td>
                </tr>
            @empty
                <h4>Empty</h4>
            @endforelse
          </tbody>
      </table>
  </div>
</div>
@endsection