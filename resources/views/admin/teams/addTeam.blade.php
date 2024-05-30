@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="text-primary">{{Session::get('status')}}</h4>
            {{Session::get('error')}}
            <div class="card">
                <div class="card-header">
                    <h3>Add Team Member </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full name">
                        </div>
                        
                        <div class="form-group">
                            <label for="Short description">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label for="Short description">Mobile number</label>
                            <input type="text" name="phone_number" class="form-control" id="phone" placeholder="Phone number">
                        </div>
                        <div class="form-group">
                            <label for="Short description">Company designation</label>
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="email" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection