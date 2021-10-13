@extends('layouts.admin')

@section('content')
    @if ($errors->count())
        <div class="alert alert-danger" role="alert">
            An error occured. Please fix the problem!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card-header bg-dark mb-2 rounded">
        <h4 class="text-white">Create Coordinate</h4>
    </div>
    <div class="card bg-dark">
        <form action="{{ route('coordinates.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="card-text">
                    <div class="row">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">Name</span>
                                        </div>
                                        <input 
                                            id="name" 
                                            type="text" 
                                            name="name" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            value="{{ old('name') }}"
                                            aria-describedby="basic-addon1"
                                            aria-label="name"
                                        >
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon2">Coordinate</span>
                                        </div>
                                        <input 
                                            id="coordinate" 
                                            type="text" 
                                            name="coordinate" 
                                            class="form-control @error('coordinate') is-invalid @enderror" 
                                            value="{{ old('coordinate') }}"
                                            aria-describedby="basic-addon2"
                                        >
                                        @error('coordinate')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Distance(km)</span>
                                </div>
                                <input 
                                    id="distance_in_km" 
                                    type="text" 
                                    name="distance_in_km" 
                                    class="form-control @error('distance_in_km') is-invalid @enderror" 
                                    value="{{ old('distance_in_km') }}"
                                    aria-describedby="basic-addon1"
                                    aria-label="distance_in_km"
                                >
                                @error('distance_in_km')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 float-right">
                <button class="btn btn-success">
                    Submit
                </button>
                <a class="btn btn-outline-danger" href="{{ route('coordinates.index') }}">
                    X
                </a>
            </div>
        </form>
    </div>
@endsection