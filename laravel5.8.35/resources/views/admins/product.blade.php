@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <form method="POST" action="{{ route('admin.product.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-2 mx-auto">
                                    <div class="image-upload">
                                        <label for="file-input">
                                            <img style="cursor: pointer;" class="card-img-top rounded-circle" alt="Card image" src="/storage/{{ '/users/amy.jpg' }}" id="output" />
                                        </label>
                                        <input id="file-input" name="image" type="file" style="display: none" onchange="loadFile(event)" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="parner_name" class="col-md-4 col-form-label text-md-right">{{ __('Parner Name') }}</label>

                                <div class="col-md-6">
                                    <select class="custom-select m-0 " name="parner_name">
                                    @foreach ($parners as $parner)
                                        <option>{{ $parner->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error ('parner_name')
                                    {{ $message }}
                                @enderror
                            </div>

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
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" name="description" rows="8" cols="80"></textarea>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <h5 class="mt-1">Price: </h5>
                                    <input type="number" name="price"/>
                                </div>

                                <div class="col-sm-4">
                                    @if(session()->has('msg'))
                                        <strong>{{session()->get('msg')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <h5 class="mt-1">Quantity: </h5>
                                    <input type="number" name="quantity"/>
                                </div>

                                <div class="col-sm-4">
                                    @if(session()->has('msg'))
                                        <strong>{{session()->get('msg')}}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <h5 class="mt-1">Bonus point: </h5>
                                    <input type="number" name="bonus_point"/>
                                </div>

                                <div class="col-sm-4">
                                    @if(session()->has('msg'))
                                        <strong>{{session()->get('msg')}}</strong>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <a href="{{ route('admin.dashboard') }}" class="text-white btn btn-danger">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
