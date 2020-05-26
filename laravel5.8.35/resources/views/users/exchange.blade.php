@extends('layouts.app')

@section('content')
{{-- {{ dd(get_defined_vars()) }} --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ route('user.exchange.submit') }}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4>Exchanging</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <h5 class="ml-3">Type: </h5>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="type_exchange" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="customRadioInline1">From User To Parner</label>
                                </div>

                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="type_exchange" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadioInline2">From Parner To User</label>
                                </div>

                                @error ('type_exchange')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <h5 class="mt-1">Parner: </h5>
                                </div>

                                <div class="col-sm-4">
                                    <select class="custom-select m-0 " name="parner">
                                    @foreach ($parners as $parner)
                                        <option>{{ $parner->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error ('parner')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <h5 class="mt-1">Amount Of Points: </h5>
                                    <input type="number" name="exchange_point"/>
                                </div>

                                <div class="col-sm-4">
                                    @if(session()->has('msg'))
                                        <strong>{{session()->get('msg')}}</strong>
                                    @endif
                                </div>
                            </div>

                            @if(session()->has('msg'))
                                <strong>{{session()->get('msg')}}</strong>
                            @endif

                            <div class="form-group row mb-0 mt-3 justify-content-end">
                                <a href="/" class="text-white btn btn-danger ml-3">
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
