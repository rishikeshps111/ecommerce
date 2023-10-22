 @extends('adminpage')
 @section('session')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Product Tables</h1>
                    @if ($message = Session::get('success'))
                        <p class="alert alert-info">{{ $message }}</p>
            
                     @endif
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $products->firstItem() + $loop->index }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td class="align-middle">
                                                <img src="{{ asset('storage/images/'.$product->image) }}" alt=""
                                                    style="width: 50px;"></td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <a href="{{ route('editproduct',$product->id) }}"><button
                                                        class="btn btn-primary">Edit</button></a>
                                                <a href="{{ route('deleteproduct',$product->id) }}"><button
                                                        class="btn btn-danger">Delete</button></a>

                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $products->links() }}
                            </ul>
                        </div>
                    </div>



                    <!-- /.card -->
                </div>









            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection