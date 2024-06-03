@extends('front.front')
<body class="sub_page">
@section('content')
</div>
<div class="container">
    <div class="text-uppercase justify-center py-5">
        <h2 class="text-center">
          About Us
        </h2>
      </div>
    <div class="row">
        <div class="col-md-6">
            <div class="detail-box py-5">
                
                <p class="pt-5">
                    At Digian, we are driven by a passion for innovation and a commitment to delivering exceptional technological solutions to our clients. With years of experience in the ever-evolving landscape of information technology, we have established ourselves as a trusted partner for businesses seeking to leverage the power of cutting-edge technologies.
                    </br>Our journey began with a simple yet ambitious goal: to bridge the gap between complex technical solutions and the real-world needs of our clients. Since our inception, we have stayed true to this vision, continuously pushing the boundaries of what's possible in the realm of IT services.
                    What sets us apart is our unwavering dedication to client satisfaction. We believe that every project, regardless of its size or scope, deserves our full attention and expertise. By taking the time to understand our clients' unique challenges and objectives, we develop tailored solutions that not only meet but exceed their expectations.

                    </br>Our team comprises some of the brightest minds in the industry, each bringing a wealth of experience and expertise to the table. From software development and cybersecurity to cloud computing and data analytics, we have the skills and knowledge needed to tackle even the most complex IT challenges.
                </p>
                
              </div>  
        </div>
        <div class="col-md-6 ">
            <div class="img-box">
                <img src="{{ asset('/') }}front/images/about-img.png" alt="">
              </div>
        </div>
    </div>
    <div class="text-uppercase justify-center py-5">
        <h2 class="text-center">
          Teams member
        </h2>
      </div>
    <div class="row justify-content-center py-5">
        @foreach ($teams as $team )
        <div class="col-md-6 col-lg-3 mx-2">           
            <div class="card" style="width: 18rem;">
                <div class="  ml-5 mt-2 ">
                    <img src="{{asset('storage/teams/'.$team->image) }}" class="rounded-circle" alt="..." width="200" height="200">
                </div>
                
                <div class="card-body justify-content-center">
                  <h5 class="card-title">{{ $team -> name }}</h5>
                  <p>Designation:{{ $team -> designation }}</p>
                  <p>Email:  {{ $team -> email }}</p>
                  <p>Mobile: {{ $team -> phone_number }}</p>
                </div>
            </div>      
        </div>
        @endforeach
        
    </div>

</div> 

@endsection