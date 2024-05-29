@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="text-primary">{{Session::get('status')}}</h4>
            {{Session::get('error')}}
            <div class="card">
                <div class="card-header">
                    <h3> Header Information Edit </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('header.update',['id' => $headers->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="header_title" value="{{ $headers->header_title}}" class="form-control" id="name" placeholder="Header title">
                        </div>
                        
                        <div class="form-group">
                            <label for="Short description">Message</label>
                            <textarea class="form-control" name="short_description" id="message" rows="3" placeholder="Description">{{ $headers->short_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Header Image</label>
                            <input type="file"  name="image" class="form-control" id="email" placeholder="Enter Image">
                            <img src="{{asset('storage/header/'.$headers->image) }}" height="200px" width ="200px"alt="">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection