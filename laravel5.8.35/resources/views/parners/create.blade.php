@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="POST" action="{{ route('parner.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-2 mx-auto">
                                <div class="image-upload">
                                    <label for="file-input">
                                        <img style="cursor: pointer;" class="card-img-top rounded-circle" alt="Card image" src="/storage/users/amy.jpg" id="output" />
                                    </label>

                                    <input id="file-input" name="image" type="file" style="display: none" onchange="loadFile(event)" />
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            @error('image')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ratio" class="col-md-4 col-form-label text-md-right">{{ __('Ratio') }}</label>

                            <div class="col-md-6 input-group">

                                <input id="ratio" type="number" class="form-control @error('ratio') is-invalid @enderror" name="ratio" value="{{ old('ratio') }}" autocomplete="ratio" autofocus min="0.01" step="0.01">

                                @error('ratio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('home')}}" class="text-white btn btn-danger">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary ml-1">
                                    {{ __('Subcribe') }}
                                </button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
