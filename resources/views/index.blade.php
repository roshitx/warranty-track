@extends('layouts.main')
@section('content')
    <main>
        <!-- slider-area start -->
        <section id="home" class="slider-area slider-height position-relative" data-background="img/slider/slide1.png">
            <div class="shpae-wrapper d-none d-md-block">
                <img class="shape shape-01 rotateme" src="img/shape/slide-shape-01.png" alt="">
                <img class="shape shape-one shape-02 heartbeat" src="img/shape/slide-shape-02.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-text slider-content-space">
                            <h2 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s">Simplify Warranty Management.</h2>
                            <p>Simplify warranty management and stay protected with WarrantyTrack – the ultimate solution for hassle-free coverage.</p>
                            <div class="slider-btn">
                                <a class="btn" href="#">Start Now</a>
                                <a class="btn btn-border" href="#">LEARN More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5  d-none d-xl-block">
                        <div class="slider-img position-relative ">
                            <img src="img/slider/app.png" alt="">
                            <img class="app-shape" src="img/slider/app-m-01.png" alt="">
                            <img class="app-shape-02" src="img/slider/app-m-02.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider-area end -->
        <section class="fact-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 offset-xl-2">
                        <div class="row fact-parent justify-content-between">
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                <div class="single-fact text-center">
                                    <h2 class="counter">40,790</h2>
                                    <span>Download App</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                <div class="single-fact text-center">
                                    <h2 class="counter">10,90</h2>
                                    <span>Active Users</span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                <div class="single-fact text-center">
                                    <h2 class="counter">790</h2>
                                    <span>Positive Reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area -->
        <section id="features" class="features-area pt-140 pb-265">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                        <div class="section-title text-center mb-70">
                            <h2>Unique Features</h2>
                            <p>Enables you to define cross-channel profiles and improve
                                audience sessions per week</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-features text-center mb-30">
                            <div class="features-icon mb-35">
                                <img src="img/icon/f-icon.png" alt="">
                            </div>
                            <div class="feature-text">
                                <h3>Easy Customize</h3>
                                <p>Enables you to define cross-channel profiles and improve audience. Sessions per week
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-features text-center mb-30">
                            <div class="features-icon mb-35">
                                <img src="img/icon/f-icon1.png" alt="">
                            </div>
                            <div class="feature-text">
                                <h3>Retina Ready</h3>
                                <p>Enables you to define cross-channel profiles and improve audience. Sessions per week
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-features text-center mb-30">
                            <div class="features-icon mb-35">
                                <img src="img/icon/f-icon2.png" alt="">
                            </div>
                            <div class="feature-text">
                                <h3>Free Update</h3>
                                <p>Enables you to define cross-channel profiles and improve audience. Sessions per week
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-area -->
    </main>
@endsection
