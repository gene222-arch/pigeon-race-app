@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">
    @hasrole('Admin')
        <div class="card my-3 p-3">
            <div class="row align-items-center">
                <div class="col-5 col-sm-3">
                    <a type="button" class="btn btn-success" href="{{ route('coordinates.create') }}">
                        <i class="fas fa-plus fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    @endhasrole
    <div class="card">
      <div class="card-header bg-warning">
          <h5>View Coordinates</h5>
      </div>
      <table class="table table-hover">
          <thead class="thead-dark">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Name</th>
                <th scope="col">Coordinates</th>
                <th scope="col">Distance in KM</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($coordinates as $coordinate)
                <tr>
                    <td class="text-center">
                        <a type="button" class="btn btn-info btn-block" href="{{ route('coordinates.show', [ 'coordinate' => $coordinate->id ]) }}">
                            <i class="fas fa-eye text-white"></i>
                        </a>
                        @hasrole('Admin')
                            <a type="button" class="btn btn-warning btn-block" href="{{ route('coordinates.edit', [ 'coordinate' => $coordinate->id ]) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endhasrole
                        <form method="POST" action="{{ route('coordinates.destroy', $coordinate->id) }}">
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
                    </td>
                    <td>
                        {{ $coordinate->name }}
                    </td>
                    <td>
                        {{ $coordinate->coordinate }}
                    </td>
                    <td>
                        {{ $coordinate->distance_in_km }}
                    </td>
                </tr>
              @empty
                  <h4>Empty</h4>
              @endforelse
          </tbody>
      </table>
  </div>
</div>
@endsection