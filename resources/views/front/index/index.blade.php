@extends('front.front')

@section('content')

<section class="slider_section ">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($headers as $key => $header)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('storage/header/'.$header->image)}}" alt="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>{{ $header->header_title }}</h1>
                    <p>{{ $header->short_description }}</p>
                    <div class="btn-box">
                      <a href="{{ route('contact') }}" class="btn1">Contact Us</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <ol class="carousel-indicators">
          @foreach ($headers as $key => $header)
          <li data-target="#customCarousel1" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
          @endforeach
        </ol>
      </div>

  </section>
  <!-- end slider section -->
</div>

<!-- service section -->
<section class="service_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        Our Services
      </h2>
      <p>
        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </p>
    </div>
    <div class="row">
        @foreach ($services as $service )
        <div class="col-md-6 col-lg-3">
            <div class="box">
              <div class="img-box">
                <img src="{{asset('storage/service/'.$service->service_image)}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  {{ $service->service_name }}
                </h5>
                <p>
                    {{ \Illuminate\Support\Str::limit($service->short_description, $limit = 35, $end = '...') }}
                </p>
                <a href="">
                  <span>
                    Read More
                  </span>
                  <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
       
        </div>
        @endforeach
    </div>
        <div class="btn-box">
        <a href="{{ route('view.service') }}">
            View More
        </a>
        </div>
  </div>
</section>
<!-- end service section -->

<!-- about section -->

<section class="about_section layout_padding">
  <div class="container  ">
    <div class="row">
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              About Us
            </h2>
          </div>
          <p>
            At Digian, we are driven by a passion for innovation and a commitment to delivering exceptional technological solutions to our clients. With years of experience in the ever-evolving landscape of information technology, we have established ourselves as a trusted partner for businesses seeking to leverage the power of cutting-edge technologies.

            Our journey began with a simple yet ambitious goal: to bridge the gap between complex technical solutions and the real-world needs of our clients. Since our inception, we have stayed true to this vision, continuously pushing the boundaries of what's possible in the realm of IT services.
          </p>
          <a href="{{ route('view.about') }}">
            Read More
          </a>
        </div>
      </div>
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="{{ asset('/') }}front/images/about-img.png" alt="">
        </div>
      </div>

    </div>
  </div>
</section>

<!-- end about section -->

<!-- case section -->

<section class="case_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        Our Case Studies
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="box">
          <div class="img-box">
            <img src="images/case-1.jpg" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Sit amet consectetur adipisicing elit
            </h5>
            <p>
              Alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
            </p>
            <a href="">
              <span>
                Read More
              </span>
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box">
          <div class="img-box">
            <img src="images/case-2.jpg" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Excepturi placeat nihil eos maxime
            </h5>
            <p>
              Alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
            </p>
            <a href="">
              <span>
                Read More
              </span>
              <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end case section -->

<!-- client section -->
<section class="client_section ">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Testimonial
      </h2>
    </div>
  </div>
  <div id="customCarousel2" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <div class="client_info">
                    <div class="client_name">
                      <h5>
                        Morojink
                      </h5>
                      <h6>
                        Customer
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum
                    dolore eu fugia
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <div class="client_info">
                    <div class="client_name">
                      <h5>
                        Morojink
                      </h5>
                      <h6>
                        Customer
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum
                    dolore eu fugia
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="box">
                <div class="img-box">
                  <img src="images/client.jpg" alt="">
                </div>
                <div class="detail-box">
                  <div class="client_info">
                    <div class="client_name">
                      <h5>
                        Morojink
                      </h5>
                      <h6>
                        Customer
                      </h6>
                    </div>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum
                    dolore eu fugia
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ol class="carousel-indicators">
      <li data-target="#customCarousel2" data-slide-to="0" class="active"></li>
      <li data-target="#customCarousel2" data-slide-to="1"></li>
      <li data-target="#customCarousel2" data-slide-to="2"></li>
    </ol>
  </div>
</section>
<!-- end client section -->



<!-- contact section -->

<section class="contact_section layout_padding">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-5 col-lg-4 offset-md-1">
        <div class="form_container">
          <div class="heading_container">
            <h2>
              Request A Call back
            </h2>
          </div>
          <form action="">
            <div>
              <input type="text" placeholder="Full Name " />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone number" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6 col-lg-7 px-0">
        <div class="map_container">
          <div class="map">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection