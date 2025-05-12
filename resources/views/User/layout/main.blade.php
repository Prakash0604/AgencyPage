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
    <link rel="icon" type="image/png" href="{{ asset('storage/'. $logo) }}">

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
        <!-- Header start -->
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
                                <a title="Facebook" href="{{ $facebook }}">
                                    <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                </a>
                                <a title="Twitter" href="{{ $twitter }}">
                                    <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                </a>
                                <a title="Instagram" href="{{ $instagram }}">
                                    <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                </a>
                                <a title="Linkdin" href="{{ $github }}">
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
       @include('User.layout.header')
        <!--/ Header end -->

        @yield('content')
        {{-- <section class="content">
        </section> --}}

        @include('User.layout.footer')
        <!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->
    </div><!-- Body inner end -->
</body>

</html>
