@extends('main')

@section('session')
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/images/'.$product->image) }}" alt="Image">
                        </div>

                    </div>

                </div>
            </div>



            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $product->name }}</h3>

                <h3 class="font-weight-semi-bold mb-4">Rs.{{ $product->price }}</h3>
                <p class="mb-4">{{ $product->description }}</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form action="{{ route('cart_submit') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" value="xs" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" value="s" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" value="m" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" value="l" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" value="xl" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            @if ($errors->has('size'))
                                <span class="text-danger">{{ $errors->first('size') }}</span><br>
                            @endif
                        </div>


                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-1" value="black" name="color">
                        <label class="custom-control-label" for="color-1">Black</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-2" value="white" name="color">
                        <label class="custom-control-label" for="color-2">White</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-3" value="red" name="color">
                        <label class="custom-control-label" for="color-3">Red</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-4" value="blue" name="color">
                        <label class="custom-control-label" for="color-4">Blue</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-5" value="green" name="color">
                        <label class="custom-control-label" for="color-5">Green</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        @if ($errors->has('color'))
                            <span class="text-danger">{{ $errors->first('color') }}</span><br>
                        @endif
                    </div>

                </div>
                <div class="d-flex mb-5">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Count</p>

                    <div class="custom-control custom-radio custom-control-inline">
                        <select type="text" class="form-select" aria-label="Default select example" name="count">
                            <option selected>No of items</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        @if ($errors->has('count'))
                            <span class="text-danger">{{ $errors->first('count') }}</span><br>
                        @endif
                    </div>


                </div>
                <div class="d-flex align-items-center mb-4 pt-2">

                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                        Cart</button>
                </div>
                </form>

            </div>
        </div>

    </div>
    <!-- Shop Detail End -->
@endsection
