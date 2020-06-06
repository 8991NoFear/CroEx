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
                                    <img id="img2" class="mw-100 rounded" src="/storage/{{ $code->product->image2 }}" alt="img">
                                </div>
                                <div class="row m-0">
                                    <img id="img3" class="mw-100 rounded" src="/storage/{{ $code->product->image3 }}" alt="img">
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
