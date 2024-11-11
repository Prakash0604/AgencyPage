@extends('index')
@section('content')
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">News</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">News</a></li>
                                    <li class="breadcrumb-item"><a href="#">detail</a></li>
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

                <div>

                    <div class="post-content post-single">
                        <div class="post-media post-image">
                            <img loading="lazy" src="{{ asset('front/images/news/news1.jpg') }}" class="img-fluid"
                                alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a href="#"> Admin</a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i> June 14, 2016</span>
                                </div>
                                <h2 class="entry-title">
                                    We Just Completes $17.6 million Medical Clinic in Mid-Missouri
                                </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu
                                    fugiat nulla pariatur.</p>

                                <p>Kucididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                    in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur Lorem ipsum dolor sit amet,
                                    consectetur
                                    adipisicing elit, sed do</p>

                                <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                    dolor in
                                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                    sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    Sed ut
                                    perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium. </p>

                                <blockquote>
                                    <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure dolor.<cite>-
                                            Anger Mathe</cite></p>

                                </blockquote>

                                <p>Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                                    vitae dicta
                                    sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                    fugit, sed quia
                                    consequuntur magni dolores eos quira tione voluptatem sequi nesciunt. Neque porro
                                    quisquam est, qui
                                    dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam
                                    eius modi tempora
                                    incidunt ue magnam aliquam quaerat voluptatem.</p>
                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                    <div class="author-box d-nlock d-sm-flex">
                        <div class="author-img mb-4 mb-md-0">
                            <img loading="lazy" src="{{ asset('front/images/news/avator1.png') }}" alt="author">
                        </div>
                        <div class="author-info">
                            <h3>Elton Themen<span>Site Engineer</span></h3>
                            <p class="mb-2">Lisicing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim
                                ad vene minim
                                veniam, quis nostrud exercitation nisi ex ea commodo.</p>
                            <p class="author-url mb-0">Website: <span><a href="#">http://www.example.com</a></span>
                            </p>

                        </div>
                    </div> <!-- Author box end -->

                    <!-- Post comment start -->
                    <div id="comments" class="comments-area">
                        <h3 class="comments-heading">07 Comments</h3>

                        <ul class="comments-list">
                            <li>
                                <div class="comment d-flex">
                                    <img loading="lazy" class="comment-avatar" alt="author"
                                        src="{{ asset('front/images/news/avator1.png') }}">
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="comment-author mr-3">Michelle Aimber</span>
                                            <span class="comment-date float-right">January 17, 2016 at 1:38 pm</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut
                                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation ullamco laboris
                                                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen.
                                            </p>
                                        </div>
                                        <div class="text-left">
                                            <a class="comment-reply font-weight-bold" href="#">Reply</a>
                                        </div>
                                    </div>
                                </div><!-- Comments end -->

                                <ul class="comments-reply">
                                    <li>
                                        <div class="comment d-flex">
                                            <img loading="lazy" class="comment-avatar" alt="author"
                                                src="{{ asset('front/images/news/avator2.png') }}">
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author mr-3">Tom Harnandez</span>
                                                    <span class="comment-date float-right">January 17, 2016 at 1:38
                                                        pm</span>
                                                </div>
                                                <div class="comment-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut
                                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco
                                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor in reprehen.</p>
                                                </div>
                                                <div class="text-left">
                                                    <a class="comment-reply font-weight-bold" href="#">Reply</a>
                                                </div>
                                            </div>
                                        </div><!-- Comments end -->
                                    </li>
                                </ul><!-- comments-reply end -->
                                <div class="comment d-flex last">
                                    <img loading="lazy" class="comment-avatar" alt="author"
                                        src="{{ asset('front/images/news/avator3.png') }}">
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="comment-author mr-3">Genelia Dusteen</span>
                                            <span class="comment-date float-right">January 17, 2016 at 1:38 pm</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut
                                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation ullamco laboris
                                                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehen.
                                            </p>
                                        </div>
                                        <div class="text-left">
                                            <a class="comment-reply font-weight-bold" href="#">Reply</a>
                                        </div>
                                    </div>
                                </div><!-- Comments end -->
                            </li><!-- Comments-list li end -->
                        </ul><!-- Comments-list ul end -->
                    </div><!-- Post comment end -->
                </div><!-- Content Col end -->
            </div><!-- Main row end -->

        </div><!-- Conatiner end -->

        <div class="container">
            <h4>Add a Comment</h4>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary mt-3">Comment</button>
            </form>
        </div>
        </div>
    </section><!-- Main container end -->
@endsection
