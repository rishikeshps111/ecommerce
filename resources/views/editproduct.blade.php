@extends('adminpage')
@section('session')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Product Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('edit_submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Product Name" name='name' value="{{ $product->name }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span><br>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Description</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Enter Description" name='description'
                                            value="{{ $product->description }}"></input>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span><br>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Select Image</label><br>
                                        <input type="file" id="img" name="image" value="{{ $product->image }}">
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span><br>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Product Price " name='price' value="{{ $product->price }}">
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span><br>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
