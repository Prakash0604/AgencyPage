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
                            <li><a href="{{ $facebook }}" aria-label="Facebook"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $twitter }}" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="{{ $instagram }}" aria-label="Instagram"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $github }}" aria-label="Github"><i class="fab fa-github"></i></a></li>
                        </ul>
                    </div><!-- Footer social end -->
                </div><!-- Col end -->

                <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                    <h3 class="widget-title">Working Hours</h3>
                    <div class="working-hours">
                        {!! $work_description !!}
                        <br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
                        <br> Saturday: <span class="text-right">12:00 - 15:00</span>
                        <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright-info">
                        <span>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, Designed &amp; Developed by <a href="https://themefisher.com">Jay
                                Prakash Chaudhary</a>
                        </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="footer-menu text-center text-md-right">
                        <ul class="list-unstyled">
                            <li><a href="about.html">About</a></li>
                            <li><a href="news-left-sidebar.html">Blog</a></li>
                        </ul>
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
<script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}" defer></script>
<!-- Slick Carousel -->
<script src="{{ asset('front/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('front/plugins/slick/slick-animation.min.js') }}"></script>
<!-- Color box -->
<script src="{{ asset('front/plugins/colorbox/jquery.colorbox.js') }}"></script>
<!-- shuffle -->
<script src="{{ asset('front/plugins/shuffle/shuffle.min.js') }}" defer></script>


<!-- Google Map API Key-->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script> --}}
<!-- Google Map Plugin-->
<script src="plugins/google-map/map.js" defer></script>

<!-- Template custom -->
<script src="{{ asset('front/js/script.js') }}"></script>
