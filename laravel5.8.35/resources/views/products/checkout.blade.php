<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('custom-style')
</head>

<body>
    <main id="main">
        <section id="left">
            <div id="head">
                <h3 class="mb-0">{{ $product->name }}</h3>
                <div class="d-flex flex-column">
                    <p class="small m-0 p-0">expiry date: {{ $product->expired }}</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm-12 p-1">
                    <img class="mw-100" id="image3" src="/storage/{{ $product->image2 }}" alt="img go here">

                </div>

                <div class="col-sm-6 p-1">
                    <img class="mw-100" id="image1" src="/storage/{{ $product->image1 }}" alt="img go here">


                </div>
                <div class="col-sm-6 p-1">
                    <img class="mw-100" id="image2" src="/storage/{{ $product->image2 }}" alt="img go here">

                </div>
            </div>
            <h3>
                Only ${{ $product->price }}
                <p class="small"><small><sup>+</sup>{{ $product->bonus_point }} points</small></p>
            </h3>
        </section>
        <section id="right">

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#menu1" data-toggle="tab"><h3>use visa</h3></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu2" data-toggle="tab"><h3>use point</h3></a>
                </li>
            </ul>

            <form action="{{ route('checkout.submit') }}" method="post">
                @csrf
            <div class="tab-content">
                    <div class="tab-pane active" id="menu1">

                        <div id="form-card" class="form-field mt-3">
                            <label for="cc-number">Card number:</label>
                            <input id="cc-number" maxlength="19" placeholder="1111 2222 3333 4444">
                        </div>

                        <div id="form-date" class="form-field">
                            <label for="expiry-month">Expiry date:</label>
                            <div id="date-val">
                                <select id="expiry-month">
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

                        <div id="form-sec-code" class="form-field">
                            <label for="sec-code">Security code:</label>
                            <input type="password" maxlength="3" placeholder="123">
                        </div>

                        <div class="d-none">
                            <input type="number" name="product_id" value="{{ $product->id }}">
                        </div>

                        <button type="submit" class="btn-block mt-3">Purchase Coupon</button>
                    </div>

                    <div class="tab-pane fade" id="menu2">
                        <h6 class="mt-3 text-danger">
                            @if ($user->point < $product->price)
                                sorry, you have not enought points to do this transaction
                            @endif
                        </h6>
                        <div class="custom-control custom-switch pl-3">
                            <input type="checkbox" class="custom-control-input" id="switch1" name="type" value="2" @if ($user->point < $product->price)
                                disabled
                            @endif>
                            <label class="custom-control-label" for="switch1">use {{ $product->price }} croex points</label>
                        </div>
                        <button type="submit" class="btn-block" @if ($user->point < $product->price)
                            style="display: none"
                        @endif>Purchase Coupon</button>
                    </div>

            </div>
        </form>

        </section>
    </main>
</body>

</html>
