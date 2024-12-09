<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 footer-widget footer-about">
                    <h3 class="widget-title">About Us</h3>
                    <img loading="lazy" width="200px" class="footer-logo" src="{{ asset('storage/' . $logo) }}"
                        alt="Constra">
                    <p>{!! $description !!}</p>
                    <div class="footer-social">
                        <ul>
                            <li><a href="{{ $facebook }}" aria-label="Facebook" target="blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $twitter }}" target="blank" aria-label="Twitter"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="{{ $instagram }}" target="blank" aria-label="Instagram"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $github }}" aria-label="Github" target="blank"><i
                                        class="fab fa-github"></i></a></li>
                        </ul>
                    </div><!-- Footer social end -->
                </div><!-- Col end -->

                <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                    <h3 class="widget-title">Working Hours</h3>
                    <div class="working-hours">
                        {!! $work_description !!}
                        <br>
                        @foreach ($workdesc as $work)
                            @php
                                $workArray = json_decode($work->days);
                            @endphp
                            <br> {{ implode(',', $workArray ?? '') }}<span
                                class="text-right">{{ $work->starting_time ?? '' }} -
                                {{ $work->ending_time ?? '' }}</span>
                        @endforeach
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

</footer>


<!-- initialize jQuery Library -->
{{-- <script src="{{ asset('front/plugins/jQuery/jquery.min.js') }}"></script> --}}
<!-- Bootstrap jQuery -->
<script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- Slick Carousel -->
<script src="{{ asset('front/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('front/plugins/slick/slick-animation.min.js') }}"></script>
<!-- Color box -->
<script src="{{ asset('front/plugins/colorbox/jquery.colorbox.js') }}"></script>
<!-- shuffle -->
<script src="{{ asset('front/plugins/shuffle/shuffle.min.js') }}" defer></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>
<!-- Google Map API Key-->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script> --}}
<!-- Google Map Plugin-->
{{-- <script src="plugins/google-map/map.js" defer></script> --}}

<!-- Template custom -->
<script src="{{ asset('front/js/script.js') }}"></script>

