@extends('front.front')
<body class="sub_page">
@section('content')
</div>

<div class="container mt-5">
    <!-- Blog Post -->
    @if ($project)
    <div class="blog-post">
        <h1 class="mt-4">{{ $project->project_title }}</h1> <!-- Assuming 'project_title' is a field in your Project model -->
        <p class="text-muted">Posted on {{ $project->created_at->format('F j, Y') }}</p> <!-- Assuming 'created_at' is a timestamp field -->
        <img src="{{asset('storage/projects/'.$project->image)}}" alt="Post Image" style="width: 80%; max-height: 450px;">
        
        <p>{!! $project->project_description !!}</p>
    </div>
    @else
        <p>No project found.</p>
    @endif
</div>
@endsection
</body>