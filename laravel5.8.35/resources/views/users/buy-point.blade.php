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
            <form method="POST" action="{{ route('user.buy.submit') }}">
                @csrf

                <div class="card mt-4">
                    <div class="card-header">
                        <label>
                            <h3 class="mb-0">Buying Points</h3>
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
                        @elseif (session()->has('failure'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger alert-dismissible fade show mb-0">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Failure!</strong> {{ session()->get('failure') }}.
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">

                        <div class="row mt-3">
                            <div class="col-sm-5 text-sm-right">
                                <h5 class="mt-1">Buy</h5>
                            </div>

                            <div class="col-sm-6">
                                <input id="point" onchange="updateReceive();" name="point" placeholder="amount of points" class=" @error('point') is-invalid @enderror @if (session()->has('point')) is-invalid @endif" type="number" min="10" step="10"
                                    value="{{ old('point') ?? 10 }}">

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
                            <div class="col-sm-5 text-sm-right">
                                <h5 class="mt-1">Card Number</h5>
                            </div>

                            <div class="col-sm-6">
                                <input id="cc-number" maxlength="19" placeholder="1111 2222 3333 4444" class="">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-5 text-sm-right">
                                <h5 class="mt-1">Expiry Date</h5>
                            </div>

                            <div class="col-sm-6">
                                <div id="date-val">
                                    <select id="expiry-month" class="">
                                        <option id="trans-label_month" value="" default="default" selected="selected">Month</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <select id="expiry-year">
                                        <option id="trans-label_year" value="" default="" selected="selected">Year</option>
                                        <option value="2018">18</option>
                                        <option value="2019">19</option>
                                        <option value="2020">20</option>
                                        <option value="2021">21</option>
                                        <option value="2022">22</option>
                                        <option value="2023">23</option>
                                        <option value="2024">24</option>
                                        <option value="2025">25</option>
                                        <option value="2026">26</option>
                                        <option value="2027">27</option>
                                        <option value="2028">28</option>
                                        <option value="2029">29</option>
                                        <option value="2030">30</option>
                                        <option value="2031">31</option>
                                        <option value="2032">32</option>
                                        <option value="2033">33</option>
                                        <option value="2034">34</option>
                                        <option value="2035">35</option>
                                        <option value="2036">36</option>
                                        <option value="2037">37</option>
                                        <option value="2038">38</option>
                                        <option value="2039">39</option>
                                        <option value="2040">40</option>
                                        <option value="2041">41</option>
                                        <option value="2042">42</option>
                                        <option value="2043">43</option>
                                        <option value="2044">44</option>
                                        <option value="2045">45</option>
                                        <option value="2046">46</option>
                                        <option value="2047">47</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-5 text-sm-right">
                                <h5 class="mt-1">Security Code</h5>
                            </div>

                            <div class="col-sm-6">
                                <input type="password" maxlength="3" placeholder="123">
                            </div>
                        </div>




                        <div class="form-group row mb-0 mt-3">
                            <div class="col-sm-6 offset-5 pl-0">
                                <a href="{{ route('user.dashboard') }}" class="text-white btn btn-danger ml-3">
                                    {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary ml-3">
                                    {{ __('Buy Points') }}
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
