{{--

Đây là trang xem toàn bộ sản phẩm
input:  $categories     ---> mảng các loại sản phẩm (làm heading)
        $products       ---> mảng tất cả các sản phẩm (phải foreach)

Yêu cầu: mỗi sản phẩm là 1 ảnh có linh tới trang mua
+, src của ảnh: srt="/storage/{{ $product->image }}"
+, href của link: href="php/products/{{ $product->id }}"

--}}

@extends('layouts.welcome')

@section('main')

<div class="jumbotron">
    <div class="text-center mb-5">
        <h2 class="text-center">Our Coupons</h2>
        <h5 class="text-center">Check other default demos, which pretty much show some features available</h5>
    </div>

    <div class="row mx-auto">
        <div class="col-sm-4">
            <div class="card p-2">
                <div class="card-header p-0">
                    <h6 class="mb-0 font-weight-bolder">Voucher</h6>
                    <p class="small mb-2">discount 10%</p>
                </div>
                <div class="card-body p-0 m-0 mb-2">
                    <div id="img-body" class="row mx-auto">
                        <div class="col-sm-8 p-0 m-0">
                            <img class="mw-100 h-100 rounded" src="/storage/products/pizza1.jpg" alt="img">
                        </div>
                        <div class="col-sm-4 p-0 pl-2 m-0">
                            <div class="row pb-2 m-0">
                                <img class="mw-100 h-100 rounded" src="/storage/products/pizza2.jpeg" alt="img">
                            </div>
                            <div class="row m-0">
                                <img class="mw-100 h-100 rounded" src="/storage/products/pizza3.jpeg" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-0 pt-2 mt-1 mb-0 d-inline-flex justify-content-between align-items-center">
                    <h5 class="mb-0">$ 320</h5>
                    <a class="btn-sm btn-info" href="#">Buy Now!</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
