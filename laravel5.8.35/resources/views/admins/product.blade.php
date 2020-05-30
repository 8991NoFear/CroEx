@extends('layouts.admin')

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

    .card-footer>h5 {
        color: orange;
    }

    .card {
        -webkit-box-shadow: 6px 12px 12px 3px rgba(99, 99, 99, 0.7);
        box-shadow: 6px 8px 12px 3px rgba(99, 99, 99, 0.7);
    }
</style>
@endsection

@section('content')
    <form class="form card col" method="POST" action="{{ route('admin.product.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-header py-5">
            @if(session()->has('msg'))
                <div class="row">
                    <div class="col-sm-8 offset-2">
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> {{ session()->get('msg') }}.
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <div class="card p-2">
                        <div class="card-header p-0 pb-2">
                            <input name="name" placeholder="PRODUCT NAME" class="form-control input-md mb-2 @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input name="bonus_point" placeholder="BONUS POINT" class="form-control input-md @error('bonus_point') is-invalid @enderror" type="number" min="0" step="5" value="{{ old('bonus_point') }}">

                            @error('bonus_point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="card-body p-0 m-0 mt-2 mb-2">
                            <div id="img-body" class="row mx-auto">
                                <div class="col-sm-8 p-0 m-0 border">
                                    <label for="file-input-1" class="m-0 p-0">
                                        <img style="cursor: pointer;" class="mw-100 h-100 rounded" alt="Card image" src="/storage/products/na.jpg" id="output1" />
                                    </label>
                                    <input id="file-input-1" name="image1" type="file" style="display: none" onchange="loadFile1(event)" />
                                </div>
                                <div class="col-sm-4 p-0 pl-2 m-0">
                                    <div class="row mb-2 m-0 border">
                                        <label for="file-input-2" class="m-0 p-0">
                                            <img style="cursor: pointer;" class="mw-100 h-100 rounded" alt="Card image" src="/storage/products/na.jpg" id="output2" />
                                        </label>
                                        <input id="file-input-2" name="image2" type="file" style="display: none" onchange="loadFile2(event)"/>
                                    </div>
                                    <div class="row m-0 border">
                                        <label for="file-input-3" class="m-0 p-0">
                                            <img style="cursor: pointer;" class="mw-100 h-100 rounded" alt="Card image" src="/storage/products/na.jpg" id="output3" />
                                        </label>
                                        <input id="file-input-3" name="image3" type="file" style="display: none" onchange="loadFile3(event)"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->has('image1') || $errors->has('image2') || $errors->has('image2'))
                                    <span class="text-danger small ml-3" role="alert">
                                        <strong>All images are required</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer p-0 m-0 pt-2">
                            <input name="price" placeholder="PRICE" class="form-control input-md @error('price') is-invalid @enderror" type="number" min="100" step="50" value="{{ old('price') }}">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-4 control-label text-md-right" for="trademark">TRADEMARK</label>
                <div class="col-md-6">
                    <select class="custom-select mb-2" id="trademark" name="parner_name">
                        @foreach ($parners as $parner)
                            <option value="{{ $parner->name }}">{{ $parner->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group row">
                <label class="col-md-4 control-label text-md-right" for="available_quantity">AVAILABLE QUANTITY</label>
                <div class="col-md-6">
                    <input id="available_quantity" name="quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md @error('quantity') is-invalid @enderror" type="number" min="50" step="50" value="{{ old('quantity') }}">

                    @error('quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group row">
                <label class="col-md-4 control-label text-md-right" for="product_description">PRODUCT DESCRIPTION</label>
                <div class="col-md-6">
                    <textarea id="product_description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <label class="col-md-4 control-label text-md-right" for="percentage_discount">EXPIRED DATE</label>
                <div class="col-md-6">
                    <input id="percentage_discount" name="expired" class="form-control input-md @error('expired') is-invalid @enderror" type="date" value="{{ old('expired') }}">

                    @error('expired')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 offset-4">
                <a class="btn btn-danger" href="{{ route('admin.dashboard') }}">CANCLE</a>
                <button type="submit" class="btn btn-primary">POST</button>
            </div>
        </div>
    </form>
@endsection

@section('custom-js')
    <script type="text/javascript">
        var loadFile1 = function(event) {
            var output = document.getElementById('output1');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        var loadFile2 = function(event) {
            var output = document.getElementById('output2');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        var loadFile3 = function(event) {
            var output = document.getElementById('output3');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
