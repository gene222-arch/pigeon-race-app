@extends('layouts.admin')

@section('content')
    @if ($errors->count())
        <div class="alert alert-danger" role="alert">
            An error occured. Please fix the problem!
            <pre>
                {{ print_r($errors) }}
            </pre>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card-header bg-dark mb-2 rounded">
        <h4 class="text-white">Add New Club</h4>
    </div>
    <div class="card bg-dark">
        <form action="{{ route('clubs.update', [ 'club' => $club->id ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="card-text">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                            <div class="row justify-content-center">
                                <div class="col-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <input type="hidden" name="id" value="{{ $club->id }}">
                                    <img 
                                        id="img"
                                        class="logo img mb-3 w-100" 
                                        src="{{ $club->logo_path }}"
                                        style="width: 30%"
                                    >
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="custom-file">
                                        <input 
                                            type="file" 
                                            name="logo" 
                                            class="form-control @error('logo') is-invalid @enderror w-100" 
                                            id="chooseFile"
                                            oninput="img.src=window.URL.createObjectURL(this.files[0])"
                                            value="{{ old('logo') }}"
                                        >
                                        <label class="custom-file-label" for="chooseFile">Select Image</label>
                                        @error('logo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            value="{{ $club->name }}"
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
                                          <span class="input-group-text" id="basic-addon2">Current Balance</span>
                                        </div>
                                        <input 
                                            id="current_balance" 
                                            type="text" 
                                            name="current_balance" 
                                            class="form-control @error('current_balance') is-invalid @enderror" 
                                            value="{{ $club->current_balance }}"
                                            aria-describedby="basic-addon2"
                                        >
                                        @error('current_balance')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h5 class="text-white">Entry Fee Reversal</h5>
                            <div class="custom-control custom-radio custom-control-inline w-100">
                                <input 
                                    type="radio" 
                                    id="yes" 
                                    name="entry_fee_reversal" 
                                    class="custom-control-input" {{ $club->entry_fee_reversal === 'Yes' ? 'checked' : '' }}
                                    value="Yes"
                                >
                                <label class="custom-control-label" for="yes">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline w-100">
                                <input 
                                    type="radio" 
                                    id="no" 
                                    name="entry_fee_reversal" 
                                    class="custom-control-input" {{ $club->entry_fee_reversal === 'No' ? 'checked' : '' }}
                                    value="No"
                                >
                                <label class="custom-control-label" for="no">No</label>
                            </div>
                            @error('entry_fee_reversal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Club Coordinates</label>
                                <input 
                                    id="club_coordinates" 
                                    type="text" 
                                    name="club_coordinates" 
                                    class="form-control @error('club_coordinates') is-invalid @enderror" 
                                    value="{{ $club->club_coordinates }}"
                                    aria-describedby="basic-addon2"
                                >
                                @error('club_coordinates')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Player Coordinates</span>
                                </div>
                                <input 
                                    id="player_coordinates" 
                                    type="text" 
                                    name="player_coordinates" 
                                    class="form-control @error('player_coordinates') is-invalid @enderror" 
                                    value="{{ $club->player_coordinates }}"
                                    aria-describedby="basic-addon1"
                                    aria-label="player_coordinates"
                                >
                                @error('player_coordinates')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Address</span>
                                </div>
                                <input 
                                    id="address" 
                                    type="text" 
                                    name="address" 
                                    class="form-control @error('address') is-invalid @enderror" 
                                    value="{{ $club->address }}"
                                    aria-describedby="basic-addon1"
                                    aria-label="address"
                                >
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Country</span>
                                </div>
                                <input 
                                    id="country" 
                                    type="text" 
                                    name="country" 
                                    class="form-control @error('country') is-invalid @enderror" 
                                    value="{{ $club->country }}"
                                    aria-describedby="basic-addon1"
                                    aria-label="country"
                                >
                                @error('country')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option>Status</option>
                                <option value="Active" {{ $club->status === 'Active' ? 'selected': '' }}>Active</option>
                                <option value="Inactive" {{ $club->status === 'Inactive' ? 'selected': '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Players</label>
                                </div>
                                <select 
                                    name="user_ids[]" 
                                    class="custom-select @error('user_ids') is-invalid @enderror" 
                                    id="inputGroupSelect01" 
                                    multiple
                                >
                                    @foreach ( $players as $player )
                                        <option 
                                            value="{{ $player->id }}"
                                            {{ in_array($player->id, $selectedPlayers) ? 'selected' : '' }}
                                        >
                                                {{ $player->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_ids')
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
                <a class="btn btn-outline-danger" href="{{ route('clubs.index') }}">
                    X
                </a>
            </div>
        </form>
    </div>
@endsection