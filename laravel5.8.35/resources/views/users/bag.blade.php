@extends('layouts.user-dashboard')

@section('custom-css')
    <style media="screen">
    .card,
    .card-header,
    .card-body,
    .card-footer {
        background: #fff;
    }

    .card-footer {
        border-top: 1px dashed black;
    }

    .card-header>div>h5 {
        color: orange;
    }

    .card {
        -webkit-box-shadow: 8px 12px 18px 4px rgba(99, 99, 99, 0.7);
        box-shadow: 8px 12px 18px 4px rgba(99, 99, 99, 0.7);
    }

    #left {
        border-right: 1px solid #996666;
    }

    @media screen and (min-width: 768px) {
        #img1 {
            height: 169px;
        }

        #img2 {
            height: 80px;
        }

        #img3 {
            height: 80px;
        }
    }

    @media screen and (max-width: 768px) {
        #img2 {
            display: none;
        }

        #img3 {
            display: none;
        }
    }
    </style>
@endsection

@section('content')

<div class="jumbotron mb-0 pt-3">
    <div class="text-center mb-5">
        <h2 class="text-center">Your Coupons</h2>
        <h5 class="text-center">Check other default demos, which pretty much show some features available</h5>

        <!-- Search form -->
        <input class="form-control col-sm-6 offset-3" type="text" placeholder="Search Vouchers" aria-label="Search" onkeyup="liveSearch('/user/bag/search')" id="search">
    </div>

    <div class="row mx-auto" id="defaultResults">
        @foreach ($codes as $code)
            <div class="col-sm-12 mb-5">
                <div class="card p-2">
                    <div class="row">
                        <div id="left" class="col-sm-7 d-flex flex-column justify-content-between">
                            <div class="">
                                <h5>Description</h5>
                                <p>{{ $code->product->description }}</p>
                                <h5>Expiry Date</h5>
                                <p>This coupon will be expired on {{ $code->product->expired }}</p>
                            </div>
                            <div>
                                <div class="d-flex">
                                    <small class="">* you have bought this coupon on {{ $code->buy_at }}</small>
                                </div>
                            </div>
                        </div>

                        <div id="right" class="col-sm-5">
                            <div class="card-header p-0">
                                <h6 class="mb-0 font-weight-bolder">{{ $code->product->name }}</h6>
                                <div class="d-flex justify-content-between">
                                    <h5>$ {{ $code->product->price }}</h5>
                                    <h5 class="mb-2"><small><sup>+</sup>{{ $code->product->bonus_point }} points</small></h5>
                                </div>
                            </div>
                            <div class="card-body p-0 m-0 mb-2">
                                <div id="img-body" class="row mx-auto">
                                    <div class="col-sm-8 p-0 m-0">
                                        <img id="img1" class="mw-100 rounded" src="/storage/{{ $code->product->image1 }}" alt="img">
                                    </div>
                                    <div class="col-sm-4 p-0 pl-2 m-0">
                                        <div class="row pb-2 m-0">
                                            <img id="img2" class="mw-100 rounded" src="/storage/{{ $code->product->image1 }}" alt="img">
                                        </div>
                                        <div class="row m-0">
                                            <img id="img3" class="mw-100 rounded" src="/storage/{{ $code->product->image1 }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-0 pt-2 mt-1 mb-0">
                                <h6 class="mb-0 d-block text-success">{{ $code->code }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <div class="" id="ajaxResults">

    </div>

    <div class="row justify-content-center" id="links">
        {{ $codes->links() }}
    </div>
</div>

@endsection

<script src="{{ asset('js/ajax.js') }}" ></script>
