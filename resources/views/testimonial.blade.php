<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-3">
            <h3 class="column-title text-center mt-4">Testimonials</h3>
            <div id="testimonial-slide" class="testimonial-slide">
                @foreach ($testimonials as $testimonial)
                    <div class="item">
                        <div class="quote-item">
                            <span class="quote-text">
                                {!! $testimonial->description !!}
                            </span>
                            <div class="quote-item-footer d-flex align-content-center">
                                <img loading="lazy" class="testimonial-thumb"
                                    src="{{ asset('storage/' . $testimonial->image) }}" alt="testimonial">
                                <div class="quote-item-info">
                                    <h3 class="quote-author">{{ $testimonial->name }}</h3>
                                    <span class="quote-subtext">{{ $testimonial->designation }},
                                        {{ $testimonial->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
