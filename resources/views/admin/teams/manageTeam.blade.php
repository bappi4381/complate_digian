@extends('admin.admin')
@section('content')
 <div class="container">
    <div class="row">
        @foreach ($teams as $team )
        <div class="col-md-3 mx-2">           
            <div class="card" style="width: 18rem;">
                <div class="  ml-5 mt-2 ">
                    <img src="{{asset('storage/teams/'.$team->image) }}" class="rounded-circle" alt="..." width="200" height="200">
                </div>
                
                <div class="card-body justify-content-center">
                  <h5 class="card-title">{{ $team -> name }}</h5>
                  <p>Designation:{{ $team -> designation }}</p>
                  <p>Email:  {{ $team -> email }}</p>
                  <p>Mobile: {{ $team -> phone_number }}</p>
                  <a href="{{ route('team.edit',['id'=>$team->id]) }}" class="btn btn-primary">Update</a>
                  <a href="{{ route('team.remove',['id'=>$team->id]) }}" class="btn btn-danger">Remove</a>
                </div>
            </div>      
        </div>
        @endforeach
        
    </div>
 </div>
@endsection