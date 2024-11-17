@extends('index')
@section('content')
    <!--/ Header end -->
    <div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/images/banner/banner1.jpg') }})">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">Posts</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('first.index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('post') }}">Posts</a></li>
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
                <div class=" ">
                    @foreach ($posts as $post)
                        <div class="post">
                            <div class="post-media post-image">
                                <img loading="lazy" src="{{ asset('storage/'.$post->image) }}" class="img-fluid"
                                    alt="post-image">
                            </div>

                            <div class="post-body">
                                <div class="entry-header">
                                    <div class="post-meta">
                                        <span class="post-author">
                                            <i class="far fa-user"></i><a href="#">{{ $post->createdBy->full_name }}</a>
                                        </span>
                                        <span class="post-meta-date"><i class="far fa-calendar"></i>{{  $post->created_at }}</span>
                                        <span class="post-meta-date"><i class="far fa-calendar"></i>{{ $post->category->title }}</span>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="{{ route('single.post',$post->id) }}"> {{ $post->title }}</a>
                                    </h2>
                                </div><!-- header end -->

                                <div class="entry-content">
                                    <p>{!! Str::limit($post->description,400) !!}</p>
                                </div>

                                <div class="post-footer">
                                    <a href="{{ route('single.post',$post->id) }}" class="btn btn-primary">Continue Reading</a>
                                </div>

                            </div><!-- post-body end -->
                        </div><!-- 1st post end -->
                    @endforeach


                    <nav class="paging" aria-label="Page navigation example">
                       {{ $posts->links() }}
                    </nav>

                </div><!-- Content Col end -->

            </div><!-- Main row end -->

        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
