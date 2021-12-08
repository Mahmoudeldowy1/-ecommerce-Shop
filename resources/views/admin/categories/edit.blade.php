@extends('master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>

                    <form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name_ar">Arabic Name</label>
                                <input type="text" class="form-control @error('name_ar') is-invalid @enderror" name="name_ar" value="{{$category->name_ar}}" required>
                                @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_ar">Arabic Description</label>
                                <input type="text" class="form-control @error('description_ar') is-invalid @enderror" name="description_ar" value="{{$category->description_ar}}" required>
                                @error('description_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name_en">English Name</label>
                                <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en" value="{{$category->name_en}}" equired>
                                @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_en">English Description</label>
                                <input type="text" class="form-control @error('description_en') is-invalid @enderror" name="description_en" value="{{$category->description_en}}" required>
                                @error('description_en')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image" value="{{$category->image}}">
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
