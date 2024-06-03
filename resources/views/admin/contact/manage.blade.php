@extends('admin.admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage All Contact</h1>
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Contact</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Massage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($contacts as $contact )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone_number }}</td>
                        <td>{{ $contact->message}}</td>
                        <td>
                            <a href="{{ route('contact.remove',['id'=>$contact->id]) }}" class="btn btn-danger btn-circle">
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