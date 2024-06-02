@extends('admin.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage All Blogs Information</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Blog Tables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Blog Catagory</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($blogs as $blog )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->category->name }}</td>
                        <td>{{ $blog->short_description }}</td>
                        <td><img src="{{asset('storage/blogs/'.$blog->image) }}"width ="70px"alt=""></td>
                        <td>
                            <a href="{{ route('blog.edit',['id' => $blog->id]) }}" class="btn btn-info btn-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ route('blog.remove',['id' => $blog->id]) }}" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>  
                    @endforeach
                     
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection