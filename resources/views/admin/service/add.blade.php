@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h4 class="text-primary">{{Session::get('status')}}</h4>
            {{Session::get('error')}}
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Add Services </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="service_name" class="form-control" id="name" placeholder="Service title">
                        </div>
                        
                        <div class="form-group">
                            <label for="Short description">About</label>
                            <textarea class="form-control" name="short_description" id="message" rows="3" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Service Image</label>
                            <input type="file"  name="service_image" class="form-control" id="email" placeholder="Enter Image">
                        </div>
                        
                        <textarea id="summernote" name="description"></textarea>
                        
                        <div class="form-group py-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> 
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



