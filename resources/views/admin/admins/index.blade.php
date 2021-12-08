@extends('master')

@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">

                        @if(session('admin-deleted-message'))
                            <div class="alert alert-danger">{{session('admin-deleted-message')}}</div>
                        @elseif(session('admin-created-message'))
                            <div class="alert alert-success">{{session('admin-created-message')}}</div>
                        @elseif(session('admin-updated-message'))
                            <div class="alert alert-success">{{session('admin-updated-message')}}</div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable For Admins</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->id}}</td>
                                            <td>{{$admin->first_name}}</td>
                                            <td>{{$admin->last_name}}</td>
                                            <td>{{$admin->username}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>{{$admin->created_at}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('admins.edit', $admin->id)}}"><button class="btn btn-block btn-secondary">Edit</button></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{route('admins.destroy', $admin->id)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-block btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Options</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.content-header -->

    </div>


@endsection
