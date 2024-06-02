@extends('admin.admin')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-9 ">
            <h4 class="text-primary">{{Session::get('status')}}</h4>
            <h4 class="text-danger">{{Session::get('error')}}</h4>
            
            <div class="card">
                <div class="card-header">Blog</div>
                <div class="card-body">
                    <form action="{{ route('test.update',['id'=>$tests->id]) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="catagory">Full Name</label>
                            <input type="text" name="name" value="{{ $tests->name }}" class="form-control" id="catagory_title" placeholder="Full Name">
                        </div>
                        
                        <div class="form-group">
                            <label for="catagory">Testmonial</label>
                            <textarea id="summernote" name="short_description">{!! $tests->short_description !!}</textarea>
                        </div>
                       
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="email" placeholder=""></br></br>
                            <img src="{{asset('storage/testes/' .$tests->image) }}" height="200px" width ="200px"alt="">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Testmonial</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
  </div>
@endsection