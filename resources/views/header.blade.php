<div class="col-lg-9 header-right">
    <ul class="top-info-box">
        <li>
            <div class="info-box">
                <div class="info-box-content">
                    <p class="info-box-title">Call Us</p>
                    <p class="info-box-subtitle">{{ $contact }}</p>
                </div>
            </div>
        </li>
        <li>
            <div class="info-box">
                <div class="info-box-content">
                    <p class="info-box-title">Email Us</p>
                    <p class="info-box-subtitle">{{ $email }}com</p>
                </div>
            </div>
        </li>

        @if (auth()->user() && auth()->user()->role == 'Admin')

        <li class="header-get-a-quote">
            <a class="btn btn-primary" href="{{ route('admin.logout') }}">Logout</a>
        </li>

        @elseif (auth()->user() && auth()->user()->role == 'User')
        <li class="header-get-a-quote">
            <a class="btn btn-primary" href="{{ route('user.logout') }}">Logout</a>
        </li>

        @else
        <li class="header-get-a-quote">
            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        </li>
        @endif
    </ul><!-- Ul end -->
</div>
