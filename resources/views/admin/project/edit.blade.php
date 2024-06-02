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
                    <form action="{{ route('project.update',['id' => $projects->id]) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="catagory">Project title</label>
                            <input type="text" value="{{ $projects->project_title }}" name="project_title" class="form-control" id="catagory_title" placeholder="Blog title">
                        </div>
                        
                        <div class="form-group">
                            <label for="catagory">Project Description</label>
                            <textarea id="summernote" name="project_description">{!! $projects->project_description !!}</textarea>
                        </div>
                       
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="email" placeholder=""></br>
                            <img src="{{asset('storage/projects/' .$projects->image) }}" height="200px" width ="200px"alt="">
                        </div>
                        


                        <button type="submit" class="btn btn-primary">Update Project</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
  </div>
@endsection