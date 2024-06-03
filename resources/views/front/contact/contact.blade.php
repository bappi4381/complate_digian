@extends('front.front')
<body class="sub_page">
@section('content')
</div>
<section class="contact_section layout_padding ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-lg-4 offset-md-1">
                <div class="form_container">
                    <div class="heading_container">
                         <h2>Request A Call back</h2>
                    </div>
                    <form action="{{ route('home.contact') }}" method="post" >
                            @csrf
                        <div>
                            <input type="text" name="name"placeholder="Full Name" />
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email" />
                        </div>
                        <div>
                            <input type="text" name="phone_number" placeholder="Phone number" />
                        </div>
                        <div>
                            <input type="text" name="message" class="message-box" placeholder="Message" />
                        </div>
                        <div class="d-flex ">
                            <button type="submit">
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
</body>