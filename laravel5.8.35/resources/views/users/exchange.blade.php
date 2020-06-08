@extends('layouts.user-dashboard')

@section('custom-css')
    <style media="screen">

    .card {
        -webkit-box-shadow: 6px 12px 12px 3px rgba(99, 99, 99, 0.7);
        box-shadow: 6px 8px 12px 3px rgba(99, 99, 99, 0.7);
    }

    </style>

@php
    // dd(old());
@endphp

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <form method="POST" action="{{ route('user.exchange.submit') }}">
                    @csrf

                    <div class="card mt-4">
                        <div class="card-header">
                            <label>
                                <h3 class="mb-0">Exchanging</h3>
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
                                <div class="col-sm-6 d-flex justify-content-between" id="type">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input onclick="updateType(this)" type="radio" class="custom-control-input" id="customRadio" name="type" value="0" @if (empty(old('type')) || (old('type') == 0)) checked @endif>
                                        <label class="custom-control-label" for="customRadio">Croex => Parner</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input onclick="updateType(this)" type="radio" class="custom-control-input" id="customRadio2" name="type" value="1" @if ((old('type') == 1)) checked @endif >
                                        <label class="custom-control-label" for="customRadio2">Parner => Croex</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5 class="mt-1">Parner</h5>
                                </div>

                                <div class="col-sm-6">
                                    <select onchange="updateRatio(this);" class="custom-select m-0 @if (session()->has('parner')) is-invalid @endif" name="parner">

                                        @foreach ($parners as $parner)
                                        <option value="{{ $parner->name }}" @if (old('parner') == $parner->name) selected @endif >{{ $parner->name }}</option>
                                        @endforeach

                                    </select>

                                    @if (session()->has('parner'))
                                        <small class="text-danger">{{ session()->get('parner') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5 class="mt-1">Send</h5>
                                </div>

                                <div class="col-sm-6">
                                    <input id="point" onchange="updateReceive();" name="point" placeholder="amount of points" class="form-control input-md @error('point') is-invalid @enderror @if (session()->has('point')) is-invalid @endif" type="number" min="10" step="10" value="{{ old('point') ?? 10 }}">

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

                            <div class="row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5 class="mt-1">Discount</h5>
                                </div>

                                <div class="col-sm-6 d-flex align-items-center">
                                    <span>5%</span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5 class="mt-1" id="headRadioView"></h5>
                                </div>

                                <div class="col-sm-6 d-flex align-items-center">
                                    <span id="ratioView"></span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3 text-sm-right">
                                    <h5 class="mt-1">Receive</h5>
                                </div>

                                <div class="col-sm-6 d-flex align-items-center">
                                    <span id="receive"></span>
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
@endsection

<script type="text/javascript" defer>
    var parners =  @php
        echo json_encode($parners);
    @endphp;

    var ratio = @php
        echo $parners->first()->ratio;
    @endphp;

    var discount = @php
        echo $discount;
    @endphp;

    var type = 0;

    var selectedParner = parners[0]['name'];

    document.addEventListener('DOMContentLoaded', function() {
        var receive         = document.getElementById('receive');
        var point           = document.getElementById('point');
        var ratioView       = document.getElementById('ratioView');
        var headratioView   = document.getElementById('headRatioView');
        updateReceive();
        updateDisplayRatio();
    }, false);


    function updateReceive() {
        if (type == 0) {
            receive.innerHTML = '+' + Math.floor(Math.floor(point.value * (1 - discount)) / ratio) + ' points';
        } else if (type == 1) {
            receive.innerHTML = '+' + Math.floor(Math.floor(point.value * ratio) * (1 - discount))  + ' points';
        }
    }

    function updateType(input) {
        type = input.value;
        updateReceive();
        updateDisplayRatio();
    }

    function updateRatio(sel) {
        var parner_name = sel.options[sel.selectedIndex].text;
        for(var i = 0; i < parners.length; i++) {
            var parner = parners[i];
            if (parner.name == parner_name) {
                ratio = parner.ratio;
                selectedParner = parner['name'];
            }
        }

        updateReceive();
        updateDisplayRatio();
    }

    function updateDisplayRatio() {
        if (type == 0) {
            headRadioView.innerHTML = "croex/" + selectedParner;
            ratioView.innerHTML = '1/' + ratio;
        } else if (type == 1) {
            headRadioView.innerHTML = selectedParner + '/croex';
            ratioView.innerHTML = ratio + '/1';
        }
    }
</script>
