@extends('main')

@section('session')

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                   @foreach ($items as $item )
                       
                   
                    <tr>
                        <td class="align-middle"><img src="{{ asset('storage/images/'.$item->product->image) }}" alt="" style="width: 50px;"></td>
                        <td class="align-middle">Rs.{{ $item->product->price}}</td>
                        <td class="align-middle">{{ $item->count }}</td>

                        
                        <td class="align-middle">Rs.{{ $item->product->price *  $item->count}}</td>
                        <td class="align-middle"><a href="{{ route('delete_cart',$item->order_id )}}"><button class="btn btn-sm btn-primary"><i class="fa fa-times" ></i></button></a></td>
                    </tr>
                    @endforeach 
                    
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection