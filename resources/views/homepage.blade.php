
@extends('main')

@section('session')

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            
           


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    
                    @foreach ($products as $product)
                        
                    
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{ asset('storage/images/'.$product->image) }}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{ $product->price }}</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="{{ route('detail',$product->id) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
    
            <!-- Shop Product End -->
        </div>
    </div>
    <div class="col-12 pb-1">
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center mb-3">
            {{ $products->links() }}
          </ul>
        </nav>
    </div>
    <!-- Shop End -->

    @endsection