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
        <h4 class="text-white">Update</h4>
    </div>
    <div class="card bg-dark">
        <form action="{{ route('my-pigeons.update', [ 'my_pigeon' => $myPigeon->id ]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="card-text">
                    <div class="row">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                            <div class="row justify-content-center">
                                <div class="col-12 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <img 
                                        id="img"
                                        class="img mb-3 w-100" 
                                        src="{{ $myPigeon->image_path }}"
                                        style="width: 30%"
                                    >
                                    <input type="hidden" name="id" value="{{ $myPigeon->id }}">
                                </div>
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="custom-file">
                                        <input 
                                            type="file" 
                                            name="image" 
                                            class="form-control @error('image') is-invalid @enderror w-100" 
                                            id="chooseFile"
                                            oninput="img.src=window.URL.createObjectURL(this.files[0])"
                                        >
                                        <label class="custom-file-label" for="chooseFile">Select Image</label>
                                        @error('image')
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
                                          <span class="input-group-text" id="basic-addon1">Ring Band</span>
                                        </div>
                                        <input 
                                            id="ring_band" 
                                            type="text" 
                                            name="ring_band" 
                                            class="form-control @error('ring_band') is-invalid @enderror" 
                                            value="{{ old('ring_band') ?? $myPigeon->ring_band }}"
                                            aria-describedby="basic-addon1"
                                            aria-label="ring_band"
                                        >
                                        @error('ring_band')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon2">Color</span>
                                        </div>
                                        <input 
                                            id="color" 
                                            type="text" 
                                            name="color" 
                                            class="form-control @error('color') is-invalid @enderror" 
                                            value="{{ old('color') ?? $myPigeon->color }}"
                                            aria-describedby="basic-addon2"
                                        >
                                        @error('color')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h5 class="text-white">Gender</h5>
                            <div class="custom-control custom-radio custom-control-inline w-100">
                                <input 
                                    type="radio" 
                                    id="male" 
                                    name="gender" 
                                    class="custom-control-input" {{ old('gender') === 'Male' || $myPigeon->gender === 'Male' ? 'checked' : '' }}
                                    value="Male"
                                >
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline w-100">
                                <input 
                                    type="radio" 
                                    id="female" 
                                    name="gender" 
                                    class="custom-control-input" {{ old('gender') === 'Female' || $myPigeon->gender === 'Female' ? 'checked' : '' }}
                                    value="Female"
                                >
                                <label class="custom-control-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Remarks</label>
                                <textarea class="form-control" name="remarks" id="exampleFormControlTextarea1" rows="3">{{ old('remarks') ?? $myPigeon->remarks }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">Bloodline</span>
                                </div>
                                <input 
                                    id="bloodline" 
                                    type="text" 
                                    name="bloodline" 
                                    class="form-control @error('bloodline') is-invalid @enderror" 
                                    value="{{ old('bloodline') ?? $myPigeon->remarks }}"
                                    aria-describedby="basic-addon1"
                                    aria-label="bloodline"
                                >
                            </div>
                        </div>
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                            <select class="form-control">
                                <option value="">Status</option>
                                <option value="Active" {{ old('status') === 'Active' || $myPigeon->status === 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status') === 'Inactive' || $myPigeon->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 float-right">
                <button class="btn btn-success">
                    Submit
                </button>
                <a class="btn btn-outline-danger" href="{{ route('my-pigeons.index') }}">
                    X
                </a>
            </div>
        </form>
    </div>
@endsection