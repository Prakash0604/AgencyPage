@extends('index')
@section('content')
    @include('crousal')
    <section id="ts-features" class="ts-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ts-intro">
                        <h2 class="into-title">About Us</h2>
                        <h3 class="into-sub-title">{{ $frontend->about_us_title ?? ''}}</h3>
                        <p>{{ $frontend->about_us_description  ?? ''}}</p>
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
                    <h3 class="into-sub-title">{{ $frontend->about_us_value ?? '' }}</h3>
                    <p>{{ $frontend->about_us_value_description  ?? ''}}</p>


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
                            <img loading="lazy" src="{{ asset('front/images/icon-image/fact1.png') }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                            <h3 class="ts-facts-title">Total Projects</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('front/images/icon-image/fact2.png') }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                            <h3 class="ts-facts-title">Staff Members</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('front/images/icon-image/fact3.png') }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
                            <h3 class="ts-facts-title">Hours of Work</h3>
                        </div>
                    </div><!-- Col end -->

                    <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('front/images/icon-image/fact4.png') }}" alt="facts-img">
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

    @include('testimonial')
    {{-- <section id="ts-service-area" class="ts-service-area pb-0">
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
    </section><!-- Service end --> --}}

    {{-- <section id="project-area" class="project-area solid-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="section-title">Work of Excellence</h2>
                    <h3 class="section-sub-title">Recent Projects</h3>
                </div>
            </div>
            <!--/ Title row end -->

            <div class="row">
                <div class="col-12">
                    <div class="shuffle-btn-group">
                        <label class="active" for="all">
                            <input type="radio" name="shuffle-filter" id="all" value="all"
                                checked="checked">Show All
                        </label>
                        <label for="commercial">
                            <input type="radio" name="shuffle-filter" id="commercial" value="commercial">Commercial
                        </label>
                        <label for="education">
                            <input type="radio" name="shuffle-filter" id="education" value="education">Education
                        </label>
                        <label for="government">
                            <input type="radio" name="shuffle-filter" id="government" value="government">Government
                        </label>
                        <label for="infrastructure">
                            <input type="radio" name="shuffle-filter" id="infrastructure"
                                value="infrastructure">Infrastructure
                        </label>
                        <label for="residential">
                            <input type="radio" name="shuffle-filter" id="residential" value="residential">Residential
                        </label>
                        <label for="healthcare">
                            <input type="radio" name="shuffle-filter" id="healthcare" value="healthcare">Healthcare
                        </label>
                    </div><!-- project filter end -->


                    <div class="row shuffle-wrapper">
                        <div class="col-1 shuffle-sizer"></div>

                        <div class="col-lg-4 col-md-6 shuffle-item"
                            data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects/project1.jpg" aria-label="project-img">
                                    <img class="img-fluid" src="images/projects/project1.jpg" alt="project-img">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.html">Capital Teltway Building</a>
                                        </h3>
                                        <p class="project-cat">Commercial, Interiors</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 1 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;healthcare&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects/project2.jpg" aria-label="project-img">
                                    <img class="img-fluid" src="images/projects/project2.jpg" alt="project-img">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.html">Ghum Touch Hospital</a>
                                        </h3>
                                        <p class="project-cat">Healthcare</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 2 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item"
                            data-groups="[&quot;infrastructure&quot;,&quot;commercial&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects/project3.jpg" aria-label="project-img">
                                    <img class="img-fluid" src="images/projects/project3.jpg" alt="project-img">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.html">TNT East Facility</a>
                                        </h3>
                                        <p class="project-cat">Government</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 3 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item"
                            data-groups="[&quot;education&quot;,&quot;infrastructure&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects/project4.jpg" aria-label="project-img">
                                    <img class="img-fluid" src="images/projects/project4.jpg" alt="project-img">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.html">Narriot Headquarters</a>
                                        </h3>
                                        <p class="project-cat">Infrastructure</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 4 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item"
                            data-groups="[&quot;infrastructure&quot;,&quot;education&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects/project5.jpg" aria-label="project-img">
                                    <img class="img-fluid" src="images/projects/project5.jpg" alt="project-img">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.html">Kalas Metrorail</a>
                                        </h3>
                                        <p class="project-cat">Infrastructure</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 5 end -->

                        <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;residential&quot;]">
                            <div class="project-img-container">
                                <a class="gallery-popup" href="images/projects/project6.jpg" aria-label="project-img">
                                    <img class="img-fluid" src="images/projects/project6.jpg" alt="project-img">
                                    <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                                </a>
                                <div class="project-item-info">
                                    <div class="project-item-info-content">
                                        <h3 class="project-item-title">
                                            <a href="projects-single.html">Ancraft Avenue House</a>
                                        </h3>
                                        <p class="project-cat">Residential</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- shuffle item 6 end -->
                    </div><!-- shuffle end -->
                </div>

                <div class="col-12">
                    <div class="general-btn text-center">
                        <a class="btn btn-primary" href="projects.html">View All Projects</a>
                    </div>
                </div>

            </div><!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Project area end --> --}}

@endsection
