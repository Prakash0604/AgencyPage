
@extends('User.layout.main')
@section('content')
<!--/ Header end -->
<div id="banner-area" class="banner-area" style="background-image:url({{ asset('front/images/banner/banner1.jpg') }})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ route('first.index') }}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('contact-us') }}">Contact Us</a></li>
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

    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Reaching our Office</h2>
        <h3 class="section-sub-title">Find Our Location</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fas fa-map-marker-alt mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Visit Our Office</h4>
            <p>{{ $address }}</p>
          </div>
        </div>
      </div><!-- Col 1 end -->


      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-envelope mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Email Us</h4>
            <p>{{ $email }}</p>
          </div>
        </div>
      </div><!-- Col 2 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Call Us</h4>
            <p>{{ $contact }}</p>
          </div>
          
        </div>
      </div><!-- Col 3 end -->

    </div><!-- 1st row end -->

    <div class="gap-60"></div>

    <div class="gap-40"></div>

    <div class="row">
      <div class="col-md-12">
        <h3 class="column-title">We love to hear</h3>
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <strong>{{ session()->get('message') }}</strong>
        </div>
        @endif
        <form method="post">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Name <span class="text-danger">*</span></label>
                <input class="form-control form-control-name" name="name" id="name" placeholder="" value="{{ old('name') }}" type="text">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email<span class="text-danger">*</span></label>
                <input class="form-control form-control-email" name="email" id="email" placeholder="" value="{{ old('email') }}" type="email"
                  >
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Subject<span class="text-danger">*</span></label>
                <input class="form-control form-control-subject" name="subject" id="subject" value="{{ old('subject') }}" placeholder="">
                @error('subject')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Message<span class="text-danger">*</span></label>
            <textarea class="form-control form-control-message" name="message" id="message" placeholder="" rows="10"
              >{{ old('message') }}</textarea>
              @error('message')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="text-right"><br>
            <button class="btn btn-primary solid blank" type="submit">Send Message</button>
          </div>
        </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection
