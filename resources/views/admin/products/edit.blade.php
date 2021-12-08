@extends('master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>

                    <form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name_ar">Arabic Name</label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{$product->name_ar}}" required>
                                @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name_en">English Name</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{$product->name_en}}" required>
                                @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                            <div class="form-group">
                                <label for="price">Price Of Product</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$product->price}}" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Expiration Date</label>
                                <input type="date" class="form-control @error('expiration_date') is-invalid @enderror" name="expiration_date" value="{{$product->expiration_date}}" required>
                                @error('expiration_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" value="{{$product->image}}" >
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
        <!-- /.content-header -->

    </div>



@endsection
