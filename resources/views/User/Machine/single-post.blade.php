@extends('User.layout.main')
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
                                    <li class="breadcrumb-item"><a href="{{ route('first.index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('post') }}">Post</a></li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('single.post', $post->id) }}">{{ $post->title }}</a></li>
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
                        <div class="post-media post-image d-flex">
                            @foreach ($post->postImages as $image)
                                <div class="banner-carousel-item"
                                    style="background-image:url({{ asset('storage/' . $image->image) }});
                                       background-size: cover; 
                                       background-position: center; 
                                       height: 400px; 
                                       width: 100%;">
                                </div>
                                @endforeach
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta ">
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
                                <p>{!! $post->description !!}</p>

                                <p>Kucididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud

                                <blockquote>
                                    <p>{!! $post->createdBy->notes !!}<cite>-
                                            {{ $post->createdBy->full_name }}</cite></p>

                                </blockquote>
                            </div>

                        </div><!-- post-body end -->
                    </div><!-- post content end -->

                    <!-- Post comment start -->
                    <div id="comments" class="comments-area">
                        <h3 class="comments-heading">{{ $post->comments->count() }} Comments</h3>

                        <ul class="comments-list">

                            <li>
                                @foreach ($comments as $comment)
                                    <div class="comment">
                                        @if ($comment->user->image != null)
                                            <img loading="lazy" class="comment-avatar mx-auto"
                                                alt="author"src="{{ asset('storage/' . $comment->user->image) }}">
                                        @else
                                            <img loading="lazy" class="comment-avatar"
                                                alt="author"src="{{ asset('defaultImage/defaultimage.webp') }}">
                                        @endif
                                        <div class="comment-body">
                                            {{-- <div class="meta-data">
                                                <span class="comment-author mr-3">{{ $comment->user->full_name }}</span>
                                                <span class="comment-date float-right">{{ $comment->created_at }}</span>
                                            </div> --}}
                                            <div class="comment-content">
                                                <p>{{ $comment->content }}
                                                </p>
                                            </div>
                                            <div class="comment-content">
                                                <p>
                                                    <a type="button" class="btnEditPost" data-id="{{ $comment->id }}">
                                                        <i class="bi bi-pen"></i>
                                                    </a>
                                                    <a type="button" class="btnDeletePost" data-id="{{ $comment->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </p>
                                                <form id="updatePostForm">
                                                    <div class="fetchEditComment">

                                                    </div>
                                                </form>
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
                        <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                        <input type="hidden" name="commentable_type"
                            value="{{ isset($post) ? 'App\\Models\\Post' : '' }}">
                        <textarea class="form-control" name="content" id="" rows="3"></textarea>
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
            // Add Comment
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
                        if (response.auth === null) {
                            window.location.href = "/register";
                        } else {
                            location.reload();
                        }

                    },
                    error: function(response) {
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
                });
            })

            $(document).on("click", ".btnEditPost", function() {
                let id = $(this).data('id');
                let clickedElement = this;


                $.ajax({
                    type: "get",
                    url: "/comment/post/edit/" + id,
                    success: function(response) {
                        console.log(response);

                        $(clickedElement).closest(".comment-content").find(".fetchEditComment")
                            .html(`
                <div class="input-group">
                    @csrf
                    <span class="input-group-text">Edit Comment</span>
                    <input type="text" name="comment" class="form-control" value="${response.message.content}">
                    <button type="submit" class="btn btn-success btn-small">update</button>
                </div>
            `);
                    },
                    error: function(xhr) {
                        console.log("Error:", xhr);
                    }
                });

                // Update Form
                $(document).off('submit').on("submit", "#updatePostForm", function(event) {
                    event.preventDefault();
                    let formdata = new FormData(this);
                    $.ajax({
                        type: "post",
                        url: "/comment/post/update/" + id,
                        data: formdata,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            location.reload();
                            // console.log(response);

                        },
                        error: function(xhr) {
                            console.log(xhr);
                        }
                    })
                })
            });

            // Delete Comment
            $(document).on("click", ".btnDeletePost", function() {
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    type: "get",
                    url: "/comment/post/delete/" + id,
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    },
                })

            });
        });
    </script>
@endsection
