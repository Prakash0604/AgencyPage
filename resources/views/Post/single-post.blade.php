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
                            <img loading="lazy" src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                                alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a href="#"> {{ $post->createdBy->full_name }}</a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i>
                                        {{ $post->created_at }}</span>
                                </div>
                                <h2 class="entry-title">
                                    {{ $post->title }}
                                </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                <p>{{ $post->description }}</p>

                                <p>Kucididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud

                                <blockquote>
                                    <p>{{ $post->createdBy->notes }}<cite>-
                                            {{ $post->createdBy->full_name }}</cite></p>

                                </blockquote>
                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                    <!-- Post comment start -->
                    <div id="comments" class="comments-area">
                        <h3 class="comments-heading">{{ $comments->count() }} Comments</h3>

                        <ul class="comments-list">

                            <li>
                                @foreach ($comments as $comment)


                                <div class="comment d-flex">
                                    @if ($comment->user->image !=null)
                                    <img loading="lazy" class="comment-avatar" alt="author"src="{{ asset('storage/'.$comment->user->image) }}">
                                    @else
                                    <img loading="lazy" class="comment-avatar" alt="author"src="{{ asset('defaultImage/defaultimage.webp') }}">

                                    @endif
                                    <div class="comment-body">
                                        <div class="meta-data">
                                            <span class="comment-author mr-3">{{ $comment->user->full_name }}</span>
                                            <span class="comment-date float-right">{{ $comment->created_at }}</span>
                                        </div>
                                        <div class="comment-content">
                                            <p>{{ $comment->comment }}
                                            </p>
                                        </div>
                                         <div class="comment-content">
                                            <p><a href="" class=""><i class=" bi bi-pen"></i></a> <a href=""><i class="bi bi-trash"></i></a></p>
                                        </div>
                                    </div>
                                </div><!-- Comments end -->
                                @endforeach
                            </li><!-- Comments-list li end -->
                        </ul><!-- Comments-list ul end -->
                    </div><!-- Post comment end -->
                </div><!-- Content Col end -->
            </div><!-- Main row end -->

        </div><!-- Conatiner end -->

        <div class="container " id="commentsSection">
            <h4>Add a Comment</h4>
            <form action="{{ route('store.comment') }}" id="addComment" method="post">
                <div class="row">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="col-md-12">
                        @csrf
                        <textarea class="form-control" name="comment" id="" rows="3"></textarea>
                        <p id="validationErrors" class="alert alert-danger d-none mt-2"></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" id="commentBtn">Comment</button>
            </form>
        </div>
        </div>
    </section><!-- Main container end -->
    <script>
        $(document).ready(function() {
            $("#addComment").submit(function(event) {
                event.preventDefault();
                $("#commentBtn").prop("disabled", true);
                let formdata = new FormData(this);
                $.ajax({
                    type: "post",
                    url: "{{ route('store.comment') }}",
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if(response.auth === null){
                           window.location.href="/register";
                        }

                            location.reload();
                    },
                    error: function(response) {
                        // console.log(response);

                        if (response.status === 422) {
                            let errors = response.responseJSON.errors;
                            let errorMessages = '<ul>';
                            $.each(errors, function(key, value) {
                                errorMessages += '<li>' + value[0] +
                                    '</li>';
                            });
                            errorMessages += '</ul>';
                            $('#validationErrors').removeClass('d-none').html(
                                errorMessages);
                        }
                    },
                    complete: function() {
                        $("#commentBtn").prop("disabled", false);
                    }
                })
            })
        })
    </script>
@endsection
