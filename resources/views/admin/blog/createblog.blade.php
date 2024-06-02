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
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="catagory">Blog title</label>
                            <input type="text" name="title" class="form-control" id="catagory_title" placeholder="Blog title">
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
                            <textarea class="form-control" name="short_description" id="message" rows="3" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="catagory">Blog Description</label>
                            <textarea id="summernote" name="description"></textarea>
                        </div>
                       
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file"  name="image" class="form-control" id="email" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="created_by_name">Created by name</label>
                            <input type="text" value="{{ Auth::user()->name }}" name="created_by_name" class="form-control" id="email" placeholder="">
                        </div>

                        <button type="submit" class="btn btn-primary">Create Blog</button>
                    </form>
                </div>
              </div>
        </div>
        <div class="col-3 ">
            <div class="card">
                <div class="card-header">Blog Catagory</div>
                <div class="card-body">
                    <form action="{{ route('blog.catagory') }}" method="POST">
                        @csrf
                         <div class="form-group">
                            <label for="catagory">Blog Catagory Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Blog Catagory Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Catagory</button>
                    </form>
                </div>
              </div>
            <div class="py-5">
              <div class="card">
                <div class="card-header">Blog Catagory</div>
                <div class="card-body">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Catagory</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($catagories as $catagory )
                        <tr>
                            <td>{{ $catagory->name }}</td>
                            <td><a href="{{ route('catagory.remove',['id'=> $catagory->id])}}" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
              </div>
            </div>
        </div>

    </div>
  </div>
@endsection