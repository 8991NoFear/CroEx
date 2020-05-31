@extends('layouts.user-dashboard')

@section('custom-css')
    <style media="screen">
    .card {
        -webkit-box-shadow: 6px 12px 12px 3px rgba(99, 99, 99, 0.7);
        box-shadow: 6px 8px 12px 3px rgba(99, 99, 99, 0.7);
    }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-4">
                <form method="POST" action="{{ route('user.exchange.submit') }}">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <label>
                                <h3 class="mb-0">Exchanging</h3>
                                <p class="p-0 m-0">* discounting 5%</p>
                            </label>
                            @if(session()->has('success'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success alert-dismissible fade show mb-0">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Success!</strong> {{ session()->get('success') }}.
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">

                            <div class="form-group row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5>Type</h5>
                                </div>
                                <div class="col-sm-6 d-flex justify-content-between">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="type" value="0" checked>
                                        <label class="custom-control-label" for="customRadio">Croex => Parner</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="customRadio2" name="type" value="1">
                                        <label class="custom-control-label" for="customRadio2">Parner => Croex</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5 class="mt-1">Parner</h5>
                                </div>

                                <div class="col-sm-6">
                                    <select class="custom-select m-0 @if (session()->has('parner')) is-invalid @endif" name="parner">

                                        @foreach ($parners as $parner)
                                        <option>{{ $parner->name }}</option>
                                        @endforeach

                                    </select>

                                    @if (session()->has('parner'))
                                        <small class="text-danger">{{ session()->get('parner') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5 class="mt-1">Amount Of Points: </h5>
                                </div>

                                <div class="col-sm-6">
                                    <input name="point" placeholder="amount of points" class="form-control input-md @error('point') is-invalid @enderror @if (session()->has('point')) is-invalid @endif" type="number" min="5" step="5" value="{{ old('point') }}">

                                    @error ('point')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @if (session()->has('point'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ session()->get('point') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0 mt-3">
                                <div class="col-sm-6 offset-3 pl-0">
                                    <a href="{{ route('user.dashboard') }}" class="text-white btn btn-danger ml-3">
                                        {{ __('Cancel') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary ml-3">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
