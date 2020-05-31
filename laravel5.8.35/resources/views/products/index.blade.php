@extends('layouts.welcome')

@section('custom-style')
    <style media="screen">
        html {
            scroll-behavior: smooth;
        }

        footer {
            background-color: #212529;
        }

        img.footer {
            width: 50px;
            height: 50px;
        }

        a.nav-link:hover {
            background-color: #3490dc;
        }

        .card,
        .card-header,
        .card-body,
        .card-footer {
            background: #fff;
        }

        .card-footer {
            border-top: 1px dashed black;
        }

        .card-footer>h5 {
            color: orange;
        }

        .card {
            -webkit-box-shadow: 8px 12px 18px 4px rgba(99, 99, 99, 0.7);
            box-shadow: 8px 12px 18px 4px rgba(99, 99, 99, 0.7);
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

@section('main')

<div class="jumbotron mb-0">
    <div class="text-center mb-5">
        <h2 class="text-center">Our Coupons</h2>
        <h5 class="text-center">Check other default demos, which pretty much show some features available</h5>
    </div>

    <div class="row mx-auto">
        @foreach ($products as $product)
            <div class="col-sm-4 mb-5">
                <div class="card p-2">
                    <div class="card-header p-0">
                        <h6 class="mb-0 font-weight-bolder">{{ $product->name }}</h6>
                        <p class="small mb-2">bonus {{ $product->bonus_point }} points</p>
                    </div>
                    <div class="card-body p-0 m-0 mb-2">
                        <div id="img-body" class="row mx-auto">
                            <div class="col-sm-8 p-0 m-0">
                                <img id="img1" class="mw-100 rounded" src="/storage/{{ $product->image1 }}" alt="img">
                            </div>
                            <div class="col-sm-4 p-0 pl-2 m-0">
                                <div class="row pb-2 m-0">
                                    <img id="img2" class="mw-100 rounded" src="/storage/{{ $product->image1 }}" alt="img">
                                </div>
                                <div class="row m-0">
                                    <img id="img3" class="mw-100 rounded" src="/storage/{{ $product->image1 }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0 pt-2 mt-1 mb-0 d-inline-flex justify-content-between align-items-center">
                        <h5 class="mb-0">$ {{ $product->price }}</h5>
                        <a class="btn-sm btn-info" href="/products/{{ $product->id }}">Buy Now!</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
