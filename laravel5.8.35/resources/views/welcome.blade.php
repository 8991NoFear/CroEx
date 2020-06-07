@extends('layouts.welcome')

@section('title')
    <title>Croex</title>
@endsection

@section('custom-style')
    <link rel="stylesheet" href="css/welcome.css">
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
    </style>
@endsection

@section('main')


<!-- Header Starts -->
{{-- <section id="banner">
    <div class="container content-wrap text-center">
        <h1 class="display-3 my-3">Lorem Ipsum</h1>
        <h3 class="my-3">
            <em>Lorem ipsum dolor sit amet, consectetur adipisicing elit</em>
        </h3>
        <a class="btn btn-primary mt-3" href="#about">Find Out More</a>
    </div>
</section> --}}
<!-- Header Ends -->
<div id="carouselExampleFade" class="carousel slide carousel-fade pt-5" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://utop.vn/uploads/2005263275.jpg" class="d-block w-100" alt="https://utop.vn/uploads/2005263275.jpg.">
      </div>
      <div class="carousel-item">
        <img src="https://utop.vn/uploads/471565722.jpg" class="d-block w-100" alt="https://utop.vn/uploads/471565722.jpg">
      </div>
      <div class="carousel-item">
        <img src="https://utop.vn/uploads/752598661.jpg" class="d-block w-100" alt="https://utop.vn/uploads/752598661.jpg.">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>

<!-- About CroEx -->
<section id="about" class="py-5">
    <div class="container text-center my-3">
        <div class="row">
            <div class="col">
                <h1 class="display-4 my-3">About CroEx</h2>
                    <p class="lead">CroEx is an application developed under the O2O model making Online-To-Offline shopping process more convenient and easy to manage with Business Units, Consumers.<br />

In addition to the Gift Redemption, Affiliate shopping services with the largest e-commerce platforms in Vietnam (UtopBACK), Gaming, winning coupons, and discount shopping coupons, especially for Utoper from big partners like Pepsi , Unilever, FPT Shop ....
</p>
            </div>
        </div>
    </div>
</section>



<!-- What We Offer Starts -->
<section id="minishop" class="py-5">
    <div class="container text-center my-3">
        <div>
            <h1 class="display-4 my-3">CroEx Shop's</h1>
            <p class="lead">Meal For You</p>
        </div>
        <div class="row mt-5">

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front" >
                        <h2>Bean Vermicelli</h2>
                    </div>
                    <div class="offer-behind" >
                        <img src='/storage/welcome/1.jpg' style="height: 255px; weight:255px;" >
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front" >
                        <h2>Baked Rolls</h2>
                    </div>
                    <div class="offer-behind" >
                        <img src='/storage/welcome/2.jpg' style="height: 255px; weight:220px;" >
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front" >
                        <h2 class="">Noodle Soup</h2>
                    </div>
                    <div class="offer-behind" >
                        <img src='/storage/welcome/3.jpg' style="height: 255px; weight:220px;" >
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front" >
                        <h2 class="">Balut</h2>
                    </div>
                    <div class="offer-behind" >
                      <img src='/storage/welcome/4.jpg' style="height: 255px; weight:220px;" >
                    </div>
                </div>
            </div>

        </div>

        <a class="btn btn-primary mt-5" style="background-color: #02CCBA;" href="{{ route('products') }}">Explore Now</a>
    </div>

</section>
<!-- What We Offer Ends -->



<!-- Our Parner Starts -->
<section id="parner" class="py-5">
    <div class="container text-center my-3">
        <div>
            <h1 class="display-4 my-3">Our Parners</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="row mt-5 justify-content-center">

            @foreach ($parners as $parner)
                <div class="col-sm-2 col-6 mb-3">
                    <img class="custom-rounded" src="/storage/{{ $parner->avatar }}" alt="no image loaded">
                </div>
            @endforeach

        </div>
        <a class="btn btn-primary mt-5" style="background-color: #02CCBA;" href="{{ route('parner.create') }}"><b>Become Our Parner</b></a>
    </div>
</section>



<!-- TESTIMONIALS -->
<section id="testimonial" class="py-5">
    <div class="container text-center my-3">
        <div>
            <h1 class="display-4 my-3">People Love Us</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>

        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <img class="card-img-top" src="<?php echo asset('storage/users/amy.jpg'); ?>" alt="Card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text mb-5">"Good app!"</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <img class="card-img-top" src="<?php echo asset('storage/users/amy.jpg'); ?>" alt="Card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Peter</h4>
                                    <p class="card-text mb-5">"It is so beautiful"</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <img class="card-img-top" src="<?php echo asset('storage/users/amy.jpg'); ?>" alt="Card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">David</h4>
                                    <p class="card-text mb-5">"It is so smart"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-sm-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <img class="card-img-top" src="<?php echo asset('storage/users/daniel.jpg'); ?>" alt="Card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Justine</h4>
                                    <p class="card-text mb-5">"Love it!"</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <img class="card-img-top" src="<?php echo asset('storage/users/daniel.jpg'); ?>" alt="Card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">May</h4>
                                    <p class="card-text mb-5">"Like it!"</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-6 mx-auto">
                                            <img class="card-img-top" src="<?php echo asset('storage/users/daniel.jpg'); ?>" alt="Card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Claire</h4>
                                    <p class="card-text mb-5">"fine"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev" >
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <a class="btn btn-primary mt-5" style="background-color: #02CCBA;" href="#"><b>Contact Us Now!</b></a>
    </div>
</section>
<!-- END OF TESTIMONIALS -->

@endsection
