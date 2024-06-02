@extends('admin.admin')
@section('content')
<div class="container">
    <div class="row justify-center">
        <div class="col-9 ">
            <h4 class="text-primary">{{Session::get('status')}}</h4>
            <h4 class="text-danger">{{Session::get('error')}}</h4>
            
            <div class="card">
                <div class="card-header">Blog</div>
                <div class="card-body">
                    <form action="{{ route('blog.update',['id'=>$blog->id]) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="catagory">Blog title</label>
                            <input type="text"value="{{ $blog->title}}" name="title" class="form-control" id="catagory_title" placeholder="Blog title">
                        </div>
                        
                        <div class="form-group">
                            <label for="catagory">Blog Catagory Name</label>
                            <select class="form-control" name="category_id" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @foreach ($catagories as $catagory )

                                 <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
                               
                                @endforeach
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="Short description">Blog short description</label>
                            <textarea class="form-control"  name="short_description" id="message" rows="3" placeholder="Description">{{ $blog->short_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="catagory">Blog Description</label>
                            <textarea id="summernote" name="description">{!! $blog->description !!}</textarea>
                        </div>
                       
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="email" placeholder="">
                        </div>
                        <img src="{{asset('storage/blogs/'.$blog->image) }}" height="200px" width ="200px"alt="">
                        <div class="form-group">
                            <label for="created_by_name">Created by name</label>
                            <input type="text" value="{{ Auth::user()->name }}" name="created_by_name" class="form-control" id="email" placeholder="" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection