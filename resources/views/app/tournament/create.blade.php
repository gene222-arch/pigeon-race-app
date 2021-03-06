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
        <h4 class="text-white">Create Tournament</h4>
    </div>
    <div class="card bg-dark">
        <form action="{{ route('tournaments.store') }}" method="post">
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
                                    <select 
                                        class="form-control @error('type') is-invalid @enderror"
                                        name="type"
                                    >
                                        <option value="North Race" {{ old('type') === 'North Race' ? 'selected' : '' }}>North Race</option>
                                        <option value="South Race" {{ old('type') === 'South Race' ? 'selected' : '' }}>South Race</option>
                                        <option value="Summer Race" {{ old('type') === 'Summer Race' ? 'selected' : '' }}>Summer Race</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon2">Club Name</span>
                                        </div>
                                        <select 
                                            class="form-control @error('club_id') is-invalid @enderror"
                                            name="club_id"
                                        >
                                            <option>Select Club</option>
                                            @foreach ($clubs as $club)
                                                <option value="{{ $club->id }}" {{ old('club_id') === $club->id && 'selected' }}>{{ $club->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('club_id')
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
                                  <span class="input-group-text" id="basic-addon1">Remarks</span>
                                </div>
                                <input 
                                    id="remarks" 
                                    type="text" 
                                    name="remarks" 
                                    class="form-control @error('remarks') is-invalid @enderror" 
                                    value="{{ old('remarks') }}"
                                    aria-describedby="basic-addon1"
                                    aria-label="remarks"
                                >
                                @error('remarks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Laps</span>
                                </div>
                                <input 
                                    id="legs" 
                                    type="text" 
                                    name="legs" 
                                    class="form-control @error('legs') is-invalid @enderror" 
                                    value="3"
                                    aria-describedby="basic-addon1"
                                    aria-label="legs"
                                    disabled
                                >
                                @error('legs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Bird Count</span>
                                </div>
                                <input 
                                    id="birds_count" 
                                    type="text" 
                                    name="birds_count" 
                                    class="form-control @error('birds_count') is-invalid @enderror" 
                                    value="{{ old('birds_count') }}"
                                    aria-describedby="basic-addon1"
                                    aria-label="birds_count"
                                >
                                @error('birds_count')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_public" class="custom-control-input" id="customSwitch1" checked>
                                <label class="custom-control-label" for="customSwitch1">Public</label>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 float-right">
                <button class="btn btn-success">
                    Submit
                </button>
                <a class="btn btn-outline-danger" href="{{ route('tournaments.index') }}">
                    X
                </a>
            </div>
        </form>
    </div>
@endsection