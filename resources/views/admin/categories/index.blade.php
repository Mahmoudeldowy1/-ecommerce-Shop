@extends('master')

@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">

                        @if(session('category-deleted-message'))
                            <div class="alert alert-danger">{{session('category-deleted-message')}}</div>
                        @elseif(session('category-created-message'))
                            <div class="alert alert-success">{{session('category-created-message')}}</div>
                        @elseif(session('category-updated-message'))
                            <div class="alert alert-success">{{session('category-updated-message')}}</div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable For Categories</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>English Name</th>
                                        <th>Arabic Name</th>
                                        <th>English Description</th>
                                        <th>Arabic Description</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name_ar}}</td>
                                            <td>{{$category->name_en}}</td>
                                            <td>{{$category->description_ar}}</td>
                                            <td>{{$category->description_en}}</td>
                                            <td><img src="{{asset('images/categories/' . $category->image)}}" width="70px" height="70px" alt=""></td>
                                            <td>{{$category->created_at}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('categories.edit', $category->id)}}"><button class="btn btn-block btn-secondary">Edit</button></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{route('categories.destroy', $category->id)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn  btn-danger">Delete</button>
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
                                        <th>English Name</th>
                                        <th>Arabic Name</th>
                                        <th>English Description</th>
                                        <th>Arabic Description</th>
                                        <th>Image</th>
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
