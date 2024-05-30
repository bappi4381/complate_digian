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
                    <form action="{{route('team.update',['id'=> $team->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $team->name }}" id="name" placeholder="Full name">
                        </div>
                        
                        <div class="form-group">
                            <label for="Short description">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $team->email }}" id="email" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label for="Short description">Mobile number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ $team->phone_number }}" id="phone" placeholder="Phone number">
                        </div>
                        <div class="form-group">
                            <label for="Short description">Company designation</label>
                            <input type="text" name="designation" class="form-control" value="{{ $team->designation }}" id="designation" placeholder="Designation">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="email" placeholder="">
                            <img src="{{asset('storage/teams/'.$team->image) }}" height="200px" width ="200px"alt="">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection