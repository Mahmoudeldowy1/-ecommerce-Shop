@extends('master')

@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">

                        @if(session('product-deleted-message'))
                            <div class="alert alert-danger">{{session('product-deleted-message')}}</div>
                        @elseif(session('product-created-message'))
                            <div class="alert alert-success">{{session('product-created-message')}}</div>
                        @elseif(session('product-updated-message'))
                            <div class="alert alert-success">{{session('product-updated-message')}}</div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable For Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>English Name</th>
                                        <th>Arabic Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Expiration Date</th>
                                        <th>Created At</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name_ar}}</td>
                                            <td>{{$product->name_en}}</td>
                                            <td>{{$product->category->name_ar}}</td>
                                            <td>{{$product->price}}</td>
                                            <td><img src="{{asset('images/products/' . $product->image)}}" width="70px" height="70px" alt=""></td>
                                            <td>{{$product->expiration_date}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="{{route('products.edit', $product->id)}}"><button class="btn btn-block btn-secondary">Edit</button></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{route('products.destroy', $product->id)}}" method="post" enctype="multipart/form-data">
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
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Expiration Date</th>
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
