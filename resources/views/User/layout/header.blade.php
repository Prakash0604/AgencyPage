<header id="header" class="header-two">
    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">

                        <div class="logo">
                            <a class="d-block" href="{{url('/')}}">
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
                                    <a class="nav-link" href="{{ url('/') }}">Home <span
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
