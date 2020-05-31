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
<section id="banner">
    <div class="container content-wrap text-center">
        <h1 class="display-3 my-3">Lorem Ipsum</h1>
        <h3 class="my-3">
            <em>Lorem ipsum dolor sit amet, consectetur adipisicing elit</em>
        </h3>
        <a class="btn btn-primary mt-3" href="#about">Find Out More</a>
    </div>
</section>
<!-- Header Ends -->


<!-- About CroEx -->
<section id="about" class="py-5">
    <div class="container text-center my-3">
        <div class="row">
            <div class="col">
                <h1 class="display-4 my-3">About CroEx</h2>
                    <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                        scrambled it to make a type specimen book.</p>
            </div>
        </div>
    </div>
</section>



<!-- What We Offer Starts -->
<section id="offer" class="py-5">
    <div class="container text-center my-3">
        <div>
            <h1 class="display-4 my-3">What We Offer</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="row mt-5">

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front">
                        <h3 class="">Lorem IpSum</h3>
                    </div>
                    <div class="offer-behind">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front">
                        <h3 class="">Lorem IpSum</h3>
                    </div>
                    <div class="offer-behind">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front">
                        <h3 class="">Lorem IpSum</h3>
                    </div>
                    <div class="offer-behind">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="offer-box">
                    <div class="offer-front">
                        <h3 class="">Lorem IpSum</h3>
                    </div>
                    <div class="offer-behind">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>

        </div>

        <a class="btn btn-primary mt-5" href="{{ route('products') }}">Explore Now</a>
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
        <a class="btn btn-primary mt-5" href="{{ route('parner.create') }}">Become Our Parner</a>
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
                                    <p class="card-text mb-5">"Some example text some example text. John Doe is an architect and engineer"</p>
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
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text mb-5">"Some example text some example text. John Doe is an architect and engineer"</p>
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
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text mb-5">"Some example text some example text. John Doe is an architect and engineer"</p>
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
                                            <img class="card-img-top" src="<?php echo asset('storage/users/amy.jpg'); ?>" alt="Card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text mb-5">"Some example text some example text. John Doe is an architect and engineer"</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 mb-3">
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
                                    <p class="card-text mb-5">"Some example text some example text. John Doe is an architect and engineer"</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 mb-3">
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
                                    <p class="card-text mb-5">"Some example text some example text. John Doe is an architect and engineer"</p>
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
        <a class="btn btn-primary mt-5" href="#">Contact Us Now</a>
    </div>
</section>
<!-- END OF TESTIMONIALS -->

@endsection
