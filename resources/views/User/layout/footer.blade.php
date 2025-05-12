<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 footer-widget footer-about">
                    <h3 class="widget-title">About Us</h3>
                    <img loading="lazy" class="footer-logo" src="{{ asset('storage/' . $logo) }}"
                        alt="Constra">
                    <p>{{ $footer_description }}</p>
                    <div class="footer-social">
                        <ul>
                            <li><a href="{{ $facebook }}" aria-label="Facebook"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li>
                                <a href="{{ $twitter }}" aria-label="Twitter"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="{{ $instagram }}" aria-label="Instagram"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $github }}" aria-label="Github"><i
                                        class="fab fa-github"></i></a></li>
                        </ul>
                    </div><!-- Footer social end -->
                </div><!-- Col end -->

                <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                    <h3 class="widget-title">Working Hours</h3>
                    <div class="working-hours">
                        {!! $work_description !!}
                        <br>
                        <ul>
                            @foreach ($workdesc as $work)
                                @php
                                    $workArray = json_decode($work->days);
                                    $startTime = \Carbon\Carbon::createFromFormat(
                                        'H:i:s',
                                        $work->starting_time,
                                    )->format('g:i A');
                                    $endTime = \Carbon\Carbon::createFromFormat(
                                        'H:i:s',
                                        $work->ending_time,
                                    )->format('g:i A');
                                @endphp

                                @if (!empty($workArray))
                                    @foreach ($workArray as $day)
                                        <li>
                                            {{ $day }}
                                            <span class="text-right">{{ $startTime }} -
                                                {{ $endTime }}</span>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>



                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="copyright-info text-center">
                        <span>Copyright &copy;
                            {{ date('Y') }}, Designed &amp; Developed by <a
                                href="https://jayprakashchaudhary.com.np/">Jay Prakash Chaudhary</a>
                        </span>
                    </div>
                </div>

            </div><!-- Row end -->

            <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                <button class="btn btn-primary" title="Back to Top">
                    <i class="fa fa-angle-double-up"></i>
                </button>
            </div>

        </div><!-- Container end -->
    </div><!-- Copyright end -->
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
