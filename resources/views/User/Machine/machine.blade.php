@extends('User.layout.main')
@section('content')
    <!--/ Header end -->
    <style>
        .ts-service-image-wrapper {
            width: 100%;
            height: 250px;
            /* or any desired height */
            overflow: hidden;
            position: relative;
        }

        .ts-service-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Machine</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('first.index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('post') }}">Machine</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end -->
    </div><!-- Banner area end -->

    <section id="main-container" class="main-container pb-2">
        <div class="container">
            <h1 class="text-center">Machines</h1>
            <div class="row">

                @foreach ($machines as $machine)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="ts-service-box">
                            <div class="ts-service-image-wrapper">
                                <img loading="lazy" class="w-100" src="{{ asset('storage/' . $machine->image) }}"
                                    alt="service-image">
                            </div>
                            <div class="d-flex">
                                <div class="ts-service-info">
                                    <h3 class="service-box-title"><a href="service-single.html">{{ $machine->title }}</a>
                                    </h3>
                                    <p>{{ $machine->description }}</p>
                                    <a class="learn-more d-inline-block" href="service-single.html" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                                </div>
                            </div>
                        </div><!-- Service1 end -->
                    </div><!-- Col 1 end -->
                @endforeach

            </div><!-- Main row end -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->
@endsection
