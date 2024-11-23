<div class="banner-carousel banner-carousel-1 mb-0">

@foreach ($homeslides as $slide)

    <div class="banner-carousel-item"
        style="background-image:url({{ asset('storage/'.$slide->image) }})">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 text-center">
                        <h3 class="slide-sub-title" data-animation-in="slideInRight">{{ $slide->title }}
                        </h3>
                        <p>{!! $slide->shortdesc !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
