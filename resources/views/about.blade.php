@extends('index')
@section('content')
    <!--/ Header end -->
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">About</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('first.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('about-us') }}">About Us</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="column-title">{{ $frontend->about_us_title }}</h3>
                    <p>{!! $frontend->about_us_description !!}</p>
                </div><!-- Col end -->

            </div><!-- Content row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->



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

    <section id="ts-team" class="ts-team">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h2 class="section-title">Quality Service</h2>
                    <h3 class="section-sub-title">Professional Team</h3>
                </div>
            </div><!--/ Title row end -->

            <div class="row">
                <div class="col-lg-12">
                    <div id="team-slide" class="team-slide">
                        @foreach ($users as $user)
                        <div class="item">
                            <div class="ts-team-wrapper">
                                <div class="team-img-wrapper">
                                    @if ($user->image!=null)
                                    <img loading="lazy" class="w-100" src="{{ asset('storage/'.$user->image) }}"  alt="team-img">
                                    @else
                                    <img loading="lazy" class="w-100" src="{{ asset('defaultImage/defaultimage.webp') }}"  alt="team-img">

                                    @endif
                                </div>
                                <div class="ts-team-content">
                                    <h3 class="ts-name">{{ $user->full_name }}</h3>
                                    <p class="ts-designation">{{ $user->position ?? '' }}</p>
                                    <p class="ts-description">{!! $user->notes ?? '' !!}</p>
                                    <div class="team-social-icons">
                                        <a target="_blank" href="{{ $user->facebook_link ?? '' }}"><i class="fab fa-facebook-f"></i></a>
                                        <a target="_blank" href="{{ $user->twitter_link ?? '' }}"><i class="fab fa-twitter"></i></a>
                                        <a target="_blank" href="{{ $user->email_link ?? '' }}"><i class="fab fa-google-plus"></i></a>
                                        <a target="_blank" href="{{ $user->instagram_link ?? '' }}"><i class="fab fa-linkedin"></i></a>
                                    </div><!--/ social-icons-->
                                </div>
                            </div><!--/ Team wrapper end -->
                        </div><!-- Team 1 end -->
                        @endforeach
                    </div><!-- Team slide end -->
                </div>
            </div><!--/ Content row end -->
        </div><!--/ Container end -->
    </section><!--/ Team end -->
@endsection
