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
        <h4 class="text-white">Add New Club</h4>
    </div>
    <div class="card bg-dark">
        <form action="{{ route('clubs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="card-text">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                            <div class="row justify-content-center">
                                <div class="col-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <img 
                                        id="img"
                                        class="logo img mb-3 w-100" 
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAANlBMVEX///+/v7+8vLzKysr8/Pzg4ODFxcXb29vT09Pj4+P4+PjBwcH6+vry8vLY2NjIyMjs7Ozo6Oia8u11AAAEdUlEQVR4nO2d65bqIAxGp/Smrb34/i971KqlEC7FGuJZ3/7dKewJBgK4/PsDAAAAAAAAAAAAAAAA4KUam5+i3m94UsUPoVoYwlA6MIShfGAIQ/nAEIbyOcBQSeNww9NZGOXBhuq8+w1fxugfDG1gmB0YBoFhdmAYBIbZgWEQGGYHhkFgmB0YBoFhdmAYBIbZyWB4qVI6mgyv4WUeH7u007lL7vFeWA3n8rUFrZqWK5KchnWvPapOTGFkNDQPOJrhk45Hw2d4Ns+oVPlRz2NhMxyawkTtv2OWAJvhSBwzfjBO2+g/5TLs7BDeSF4eDP0Y+yiX4UydFKtT4pRxa3SKTcVchtQgLYrobhq0Kj7+XIb0aX+fZtipHfH/ScPlZZG5Jq9hk2RYP96lTnFPcxnWpGF52d2eNrPGPc5lOJC5NDrl65Sv1fs16nEuw8v20sdCP+9uTh8NZVSuYVvTnKlBmjAdaqu/uH8Qm2FVWuNUJYSwOu3tLV9tcelNw5SF9yZjRaVixvpwbrZRTKnyuyKysRXOGn/QBqpK25QzptVm9598eyfqXDaPnah+GlNmwr/aGOcqYl3DvJtYzXU7jvU1bbVmVdExE+pP7Qjb6TiiOBFmOPuyD7XyC+djWYadGt2KxE5PzMpWluHtXc6KQZ/rNYK5RpThfWXnrGzp6iRcQ0ky7KbHK+iBup3rtQZD6wZJhq+9HDIsri89BBsUZPguIal0Y871K6ECRY6hXkFaimQeXQjVUHIMNwWkuVax5/q1xcC6Rozh0G+7vYmidaqzCaJ/whBjaEZJr608Y7QIHvBIMbR3/dfB55jr3/hrKCGGxMHN+vmi53rtSW+uEWLYUj1/dsY1169tetc1MgwHaw9HU3TN9Svec0huw4os6CZHcO7dcc/163O+XMNteC0JRfdk0Aby6BNfDcW9i1EquzedI4R36vAYLfy5htnwtnBRvaHo/SZxjN8Nz7UO5ltf97WnMgbqHCfhRbmHKa/hdXl2qxjzQQsaunMNr+FzUlD62W8bORD9TM4gshpe3xVg+Z7BonJlmN55mMhpWGkV4GughtacsbgvLnAa6hXga6B666I9OGsoRsPtMbCa7l2q6OVaAs6uMxpejXDdd+SPSTMP+vyGdri6+bAQui8u8BmaIbwxUdcXkg0dNRTjOf6BNiSOGirrXYxjcXQ+632ag6EPE7kMiU/h4dA1FJfhgUnTzZTRkCOEt8apYcpj+P1E6u4+j+H3E+kCdUmKxZAjkS4QrbMY8nwKC7qGYjFkSaQL9rqGw5AthORhIoMhUyJ9ksPwsDI+Brv97xtWY8mJNUwZYtixYu0qyjhd+yYwDALD7MAwCAyzA8MgMMwODIPAMDtHGxZ1JYvjDRvWajCC7SYRfhsBhvKBIQzlA0MYygeGMJQPDGEoHxjCUD4whKF8YAhD+cAQhvKBIQzlA0MYygeGMJQPDGEoHxjCUD4whKF8YAhD+cAQhvJJM/wpEgyv9U+R8iNaAAAAAAAAAAAAAAAAAP4r/gEYCYE2Xwz6DQAAAABJRU5ErkJggg=="
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
                                          <span class="input-group-text" id="basic-addon2">Current Balance</span>
                                        </div>
                                        <input 
                                            id="current_balance" 
                                            type="text" 
                                            name="current_balance" 
                                            class="form-control @error('current_balance') is-invalid @enderror" 
                                            value="{{ old('current_balance') }}"
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
                                    class="custom-control-input" {{ old('entry_fee_reversal') === 'Yes' ? 'checked' : '' }}
                                    value="Yes"
                                >
                                <label class="custom-control-label" for="yes">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline w-100">
                                <input 
                                    type="radio" 
                                    id="no" 
                                    name="entry_fee_reversal" 
                                    class="custom-control-input" {{ old('entry_fee_reversal') === 'No' ? 'checked' : '' }}
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
                                    value="{{ old('club_coordinates') }}"
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
                                    value="{{ old('player_coordinates') }}"
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
                                    value="{{ old('address') }}"
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
                                    value="{{ old('country') }}"
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
                                <option value="Active" {{ old('status') === 'Active' ? 'selected': '' }}>Active</option>
                                <option value="Inactive" {{ old('status') === 'Inactive' ? 'selected': '' }}>Inactive</option>
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
                                            {{ in_array($player->id, old('user_ids') ?? []) ? 'selected' : '' }}
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