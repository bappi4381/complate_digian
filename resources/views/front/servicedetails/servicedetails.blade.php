@extends('front.front')
<body class="sub_page">
@section('content')
</div>
<div class="container mt-5">
@if ($service)
    <div class="text-center text-uppercase  text-warning">
        <h2 class="font-weight-bold">
            {{ $service->service_name  }}
        </h2>
    </div>
   <div class="row">
    <div class="col-6 mt-5">
        <h4 class="pt-5">{{  $service->short_description  }}</h4>
        <p class="text-muted">Posted on {{ $service->created_at->format('F j, Y') }}</p> 
    </div>
    <div class="col-6">
        <img src="{{ asset('storage/service/'.$service->service_image) }}" alt="Post Image" style="width: 300px; max-height: 300px;">
    </div>
   </div>
   
   <div class="row my-5">
    <div class="text-center text-uppercase  text-warning">
        <h2 class="font-weight-bold" >
         Our Key Module
        </h2>
    </div>
    <div class="col-12 my-4">
        {!!  $service->description  !!}
    </div>
   </div>
@else
    <p>No project found.</p>
@endif
</div>
@endsection
</body>