@extends('admin.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage All Header Information</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Header Information</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>About</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($services as $service )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $service->service_name }}</td>
                        <td>{{ $service->short_description }}</td>
                        <td>{!! $service->description !!}</td>
                        <td><img src="{{asset('storage/service/'.$service->service_image) }}"width ="70px"alt=""></td>
                        <td>
                            <a href="{{ route('service.edit',['id'=>$service->id]) }}" class="btn btn-info btn-circle">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-circle">
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