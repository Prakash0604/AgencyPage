@extends('User.layout.main')
@section('content')
    @include('User.crousal')
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
    </section>

    <section id="facts" class="facts-area dark-bg">
        <div class="container">
            <div class="facts-wrapper">
                <div class="row">
                    @foreach ($achievements as $achievement)
                    <div class="col-md-3 col-sm-6 ts-facts">
                        <div class="ts-facts-img">
                            <img loading="lazy" src="{{ asset('storage/' . $achievement->icon) }}" alt="facts-img">
                        </div>
                        <div class="ts-facts-content">
                            <h2 class="ts-facts-num"><span class="counterUp" data-count="{{ $achievement->number }}">{{ $achievement->number }}</span></h2>
                            <h3 class="ts-facts-title">{{ $achievement->title }}</h3>
                        </div>
                    </div>
                    @endforeach
                </div> <!-- Facts end -->
            </div>
            <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </section><!-- Facts end -->

    @include('User.testimonial')

    {{-- Notice Modal --}}
    <div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formId" class="form">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="">Notice</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="card-title text-center mt-3 mb-3" id="noticeTitle">{{ $notice->title ?? '' }}</h4>
                        <div class="card text-start">
                            @if ($notice && $notice->image !== null)
                                <img class="card-img-top" src="{{ asset('storage/' . $notice->image) }}" alt="image" />
                            {{-- @else
                                <img class="card-img-top" src="{{ asset('defaultImage/defaultimage.webp') }}"
                                    alt="image" /> --}}
                            @endif
                            <div class="card-body">
                                <p class="card-text">{!!  $notice->description ?? ''  !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let title=$("#noticeTitle").text();
            if(title!=""){
                $("#formModal").modal('show');
            }else{
                $("#formModal").modal('hide');
            }
        })
    </script>
    {{-- Notice Modal --}}
@endsection
