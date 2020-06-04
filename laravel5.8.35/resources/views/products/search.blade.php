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
