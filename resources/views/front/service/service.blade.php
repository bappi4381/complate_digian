@extends('front.front')
<body class="sub_page">
@section('content')
</div>
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
                <a href="{{ route('service.show', $service->id) }}">
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
    </div>
  </section>

@endsection
</body>