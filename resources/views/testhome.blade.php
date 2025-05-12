<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    {{-- <title>Constra - Delightful LifeStyle</title> --}}
    <title>Constra - Delightful LifeStyle</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Best content ever">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon
================================================== -->
    {{-- <link rel="icon" type="image/png" href="{{ asset('storage/' . $logo) }}"> --}}

    <!-- CSS
================================================== -->
    {{-- Jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('front/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('front/plugins/fontawesome/css/all.min.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('front/plugins/animate-css/animate.css') }}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{ asset('front/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/slick/slick-theme.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('front/plugins/colorbox/colorbox.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> --}}
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <ul class="top-info text-center text-md-left">
                            <li><i class="fas fa-map-marker-alt"></i>
                                <p class="info-text">{{ $address }}</p>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top info end -->

                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                        <ul class="list-unstyled">
                            <li>
                                <a title="Facebook" href="https://facebbok.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                </a>
                                <a title="Twitter" href="https://twitter.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a title="Instagram" href="https://instagram.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                </a>
                                <a title="Linkdin" href="https://github.com/themefisher.com">
                                    <span class="social-icon"><i class="fab fa-github"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ Top social end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
        <header id="header" class="header-two">
            <div class="site-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">

                                <div class="logo">
                                    <a class="d-block" href="index-2.html">
                                        <img loading="lazy" src="{{ asset('storage/' . $logo) }}" alt="Constra">
                                    </a>
                                </div><!-- logo end -->

                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div id="navbar-collapse" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav ml-auto align-items-center">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="#">Home <span
                                                    class="sr-only">(current)</span></a>
                                        </li>

                                        <li class="nav-item"><a class="nav-link" href="{{ route('about-us') }}">About Us</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('contact-us') }}">Contact</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('post') }}">Post</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('machine') }}">Machine</a></li>

                                    </ul>
                                </div>

                            </nav>
                        </div>
                        <!--/ Col end -->
                    </div>
                    <!--/ Row end -->
                </div>
                <!--/ Container end -->

            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->

        @include('User.crousal')

        <section class="call-to-action-box no-padding">
            <div class="container">
                <div class="action-style-box">
                    <div class="row align-items-center">
                        <div class="col-md-8 text-center text-md-left">
                            <div class="call-to-action-text">
                                <h3 class="action-title">We understand your needs on machinary</h3>
                            </div>
                        </div><!-- Col end -->
                        <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                            <div class="call-to-action-btn">
                                <a class="btn btn-dark" href="{{ route('contact-us') }}">Request Quote</a>
                            </div>
                        </div><!-- col end -->
                    </div><!-- row end -->
                </div><!-- Action style box -->
            </div><!-- Container end -->
        </section><!-- Action end -->

        <section id="ts-features" class="ts-features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ts-intro">
                            <h2 class="into-title">About Us</h2>
                            <h3 class="into-sub-title">{{ $frontend->title }}</h3>
                            <p>{!! Str::limit($frontend->description, 1250, '...') !!}</p>
                        </div><!-- Intro box end -->

                        <div class="gap-20"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-trophy"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">We've Repution for Excellence</h3>
                                    </div>
                                </div><!-- Service 1 end -->
                            </div><!-- col end -->

                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-sliders-h"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">We Build Partnerships</h3>
                                    </div>
                                </div><!-- Service 2 end -->
                            </div><!-- col end -->
                        </div><!-- Content row 1 end -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-thumbs-up"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">Guided by Commitment</h3>
                                    </div>
                                </div><!-- Service 1 end -->
                            </div><!-- col end -->

                            <div class="col-md-6">
                                <div class="ts-service-box">
                                    <span class="ts-service-icon">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <div class="ts-service-box-content">
                                        <h3 class="service-box-title">A Team of Professionals</h3>
                                    </div>
                                </div><!-- Service 2 end -->
                            </div><!-- col end -->
                        </div><!-- Content row 1 end -->
                    </div><!-- Col end -->

                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <h3 class="into-sub-title">Our Values</h3>
                        <p>we believe in the power of personalized expression through high-quality digital and printed
                            media. Whether it's custom apparel, published books, or branded merchandise, our mission is
                            to bring creativity to life with precision, care, and sustainability at every step</p>

                        <div class="accordion accordion-group" id="our-values-accordion">
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            CREATIVITY & CUSTOMIZATION
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#our-values-accordion">
                                    <div class="card-body">
                                        We empower our clients with tools and services that support unique, personalized
                                        designs—whether it's a printed t-shirt or a custom book cover.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            QUALITY CRAFTSMANSHIP
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#our-values-accordion">
                                    <div class="card-body">
                                        Every item we produce—digital or physical—is reviewed with attention to detail,
                                        using high-quality materials and techniques.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-0 bg-transparent" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            SUSTAINABILITY
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#our-values-accordion">
                                    <div class="card-body">
                                        We use eco-friendly inks, materials, and practices to reduce waste and support a
                                        more sustainable production environment.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Accordion end -->

                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </section><!-- Feature are end -->

        <section id="facts" class="facts-area dark-bg">
            <div class="container">
                <div class="facts-wrapper">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 ts-facts">
                            <div class="ts-facts-img">
                                <img loading="lazy" src="{{ asset('front/images/icon-image/fact1.png') }}"
                                    alt="facts-img">
                                {{-- <i class="mdi mdi-grid-large menu-icon"></i> --}}
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                                <h3 class="ts-facts-title">Total Projects</h3>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                            <div class="ts-facts-img">
                                <img loading="lazy" src="{{ asset('front/images/icon-image/fact2.png') }}"
                                    alt="facts-img">
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                                <h3 class="ts-facts-title">Staff Members</h3>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                            <div class="ts-facts-img">
                                <img loading="lazy" src="{{ asset('front/images/icon-image/fact3.png') }}"
                                    alt="facts-img">
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
                                <h3 class="ts-facts-title">Hours of Work</h3>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                            <div class="ts-facts-img">
                                <img loading="lazy" src="{{ asset('front/images/facebook.png') }}" width="60"
                                    height="60" alt="facts-img">
                            </div>
                            <div class="ts-facts-content">
                                <h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
                                <h3 class="ts-facts-title">Countries Experience</h3>
                            </div>
                        </div><!-- Col end -->

                    </div> <!-- Facts end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </section><!-- Facts end -->

        <section id="ts-service-area" class="ts-service-area pb-0">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <h2 class="section-title">We Are Specialists In</h2>
                        <h3 class="section-sub-title">What We Do</h3>
                    </div>
                </div>
                <!--/ Title row end -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="images/icon-image/service-icon1.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">Home Construction</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                            </div>
                        </div><!-- Service 1 end -->

                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="images/icon-image/service-icon2.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">Building Remodels</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                            </div>
                        </div><!-- Service 2 end -->

                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="images/icon-image/service-icon3.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">Interior Design</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                            </div>
                        </div><!-- Service 3 end -->

                    </div><!-- Col end -->

                    <div class="col-lg-4 text-center">
                        <img loading="lazy" class="img-fluid" src="images/services/service-center.jpg"
                            alt="service-avater-image">
                    </div><!-- Col end -->

                    <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="images/icon-image/service-icon4.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">Exterior Design</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                            </div>
                        </div><!-- Service 4 end -->

                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="images/icon-image/service-icon5.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">Renovation</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                            </div>
                        </div><!-- Service 5 end -->

                        <div class="ts-service-box d-flex">
                            <div class="ts-service-box-img">
                                <img loading="lazy" src="images/icon-image/service-icon6.png" alt="service-icon">
                            </div>
                            <div class="ts-service-box-info">
                                <h3 class="service-box-title"><a href="#">Safety Management</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
                            </div>
                        </div><!-- Service 6 end -->
                    </div><!-- Col end -->
                </div><!-- Content row end -->

            </div>
            <!--/ Container end -->
        </section><!-- Service end -->

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="column-title">Testimonials</h3>

                        <div id="testimonial-slide" class="testimonial-slide">
                            <div class="item">
                                <div class="quote-item">
                                    <span class="quote-text">
                                        Question ran over her cheek When she reached the first hills of the Italic
                                        Mountains, she had a last
                                        view back on the skyline of her hometown Bookmarksgrove, the headline of
                                        Alphabet Village and the
                                        subline of her own road.
                                    </span>

                                    <div class="quote-item-footer">
                                        <img loading="lazy" class="testimonial-thumb"
                                            src="images/clients/testimonial1.png" alt="testimonial">
                                        <div class="quote-item-info">
                                            <h3 class="quote-author">Gabriel Denis</h3>
                                            <span class="quote-subtext">Chairman, OKT</span>
                                        </div>
                                    </div>
                                </div><!-- Quote item end -->
                            </div>
                            <!--/ Item 1 end -->

                            <div class="item">
                                <div class="quote-item">
                                    <span class="quote-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        inci done idunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa
                                        tion ullamco laboris
                                        nisi aliquip consequat.
                                    </span>

                                    <div class="quote-item-footer">
                                        <img loading="lazy" class="testimonial-thumb"
                                            src="images/clients/testimonial2.png" alt="testimonial">
                                        <div class="quote-item-info">
                                            <h3 class="quote-author">Weldon Cash</h3>
                                            <span class="quote-subtext">CFO, First Choice</span>
                                        </div>
                                    </div>
                                </div><!-- Quote item end -->
                            </div>
                            <!--/ Item 2 end -->

                            <div class="item">
                                <div class="quote-item">
                                    <span class="quote-text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        inci done idunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitoa
                                        tion ullamco laboris
                                        nisi ut commodo consequat.
                                    </span>

                                    <div class="quote-item-footer">
                                        <img loading="lazy" class="testimonial-thumb"
                                            src="images/clients/testimonial3.png" alt="testimonial">
                                        <div class="quote-item-info">
                                            <h3 class="quote-author">Minter Puchan</h3>
                                            <span class="quote-subtext">Director, AKT</span>
                                        </div>
                                    </div>
                                </div><!-- Quote item end -->
                            </div>
                            <!--/ Item 3 end -->

                        </div>
                        <!--/ Testimonial carousel end-->
                    </div><!-- Col end -->

                    <div class="col-lg-6 mt-5 mt-lg-0">

                        <h3 class="column-title">Happy Clients</h3>

                        <div class="row all-clients">
                            <div class="col-sm-4 col-6">
                                <figure class="clients-logo">
                                    <a href="#!"><img loading="lazy" class="img-fluid"
                                            src="images/clients/client1.png" alt="clients-logo" /></a>
                                </figure>
                            </div><!-- Client 1 end -->

                            <div class="col-sm-4 col-6">
                                <figure class="clients-logo">
                                    <a href="#!"><img loading="lazy" class="img-fluid"
                                            src="images/clients/client2.png" alt="clients-logo" /></a>
                                </figure>
                            </div><!-- Client 2 end -->

                            <div class="col-sm-4 col-6">
                                <figure class="clients-logo">
                                    <a href="#!"><img loading="lazy" class="img-fluid"
                                            src="images/clients/client3.png" alt="clients-logo" /></a>
                                </figure>
                            </div><!-- Client 3 end -->

                            <div class="col-sm-4 col-6">
                                <figure class="clients-logo">
                                    <a href="#!"><img loading="lazy" class="img-fluid"
                                            src="images/clients/client4.png" alt="clients-logo" /></a>
                                </figure>
                            </div><!-- Client 4 end -->

                            <div class="col-sm-4 col-6">
                                <figure class="clients-logo">
                                    <a href="#!"><img loading="lazy" class="img-fluid"
                                            src="images/clients/client5.png" alt="clients-logo" /></a>
                                </figure>
                            </div><!-- Client 5 end -->

                            <div class="col-sm-4 col-6">
                                <figure class="clients-logo">
                                    <a href="#!"><img loading="lazy" class="img-fluid"
                                            src="images/clients/client6.png" alt="clients-logo" /></a>
                                </figure>
                            </div><!-- Client 6 end -->

                        </div><!-- Clients row end -->

                    </div><!-- Col end -->

                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </section>

        {{-- @include('User.testimonial') --}}


        <!-- Content end -->

        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">About Us</h3>
                            <img loading="lazy" class="footer-logo" src="{{ asset('storage/' . $logo) }}"
                                alt="Constra">
                            <p>{{ $frontend->footer_description }}</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="{{ $frontend->facebook_url }}" aria-label="Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li>
                                        <a href="{{ $frontend->twitter_url }}" aria-label="Twitter"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="{{ $frontend->instagram_url }}" aria-label="Instagram"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $frontend->github_url }}" aria-label="Github"><i
                                                class="fab fa-github"></i></a></li>
                                </ul>
                            </div><!-- Footer social end -->
                        </div><!-- Col end -->

                        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Working Hours</h3>
                            <div class="working-hours">
                                {!! $work_description !!}
                                <br>
                                <ul>
                                    @foreach ($workdesc as $work)
                                        @php
                                            $workArray = json_decode($work->days);
                                            $startTime = \Carbon\Carbon::createFromFormat(
                                                'H:i:s',
                                                $work->starting_time,
                                            )->format('g:i A');
                                            $endTime = \Carbon\Carbon::createFromFormat(
                                                'H:i:s',
                                                $work->ending_time,
                                            )->format('g:i A');
                                        @endphp

                                        @if (!empty($workArray))
                                            @foreach ($workArray as $day)
                                                <li>
                                                    {{ $day }}
                                                    <span class="text-right">{{ $startTime }} -
                                                        {{ $endTime }}</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>



                            </div>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="copyright-info text-center">
                                <span>Copyright &copy;
                                    {{ date('Y') }}, Designed &amp; Developed by <a
                                        href="https://jayprakashchaudhary.com.np/">Jay Prakash Chaudhary</a>
                                </span>
                            </div>
                        </div>

                    </div><!-- Row end -->

                    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                        <button class="btn btn-primary" title="Back to Top">
                            <i class="fa fa-angle-double-up"></i>
                        </button>
                    </div>

                </div><!-- Container end -->
            </div><!-- Copyright end -->
        </footer>
        <!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->

        <script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}"></script>
        <!-- Slick Carousel -->
        <script src="{{ asset('front/plugins/slick/slick.min.js') }}"></script>
        <script src="{{ asset('front/plugins/slick/slick-animation.min.js') }}"></script>
        <!-- Color box -->
        <script src="{{ asset('front/plugins/colorbox/jquery.colorbox.js') }}"></script>
        <!-- shuffle -->
        <script src="{{ asset('front/plugins/shuffle/shuffle.min.js') }}" defer></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
        <!-- Google Map API Key-->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script> --}}
        <!-- Google Map Plugin-->
        {{-- <script src="plugins/google-map/map.js" defer></script> --}}

        <!-- Template custom -->
        <script src="{{ asset('front/js/script.js') }}"></script>

    </div>
    <!-- Body inner end -->
</body>

</html>
