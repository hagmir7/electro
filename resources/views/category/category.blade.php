@extends('layout.layout')


@section('content')
<div class="container mt-3 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-4">
            <div class="card">

            </div>
        </div>
        <div class="col-md-8">
            @foreach ($products as $product)
            <div class="row p-2 bg-white border rounded mt-2 wow fadeInUp" data-wow-delay="0.{{$loop->index + 1}}s">
                <div class="col-md-3 mt-1">
                    <img class="img-fluid img-responsive rounded product-image" alt="{{ $product->name }}" src="{{ $product->images->first()->image }}">
                </div>
                <div class="col-md-6 mt-1">
                    <h5>{{ $product->name }}</h5>
                    <div class="d-flex flex-row">
                        <strong>{{ $product->caty->name }}</strong>
                    </div>
                    <p class="text-justify mb-0">{{ Str::limit($product->description, $limit = 160, $end = '...')}}</p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class=" align-items-center">
                        <h4 class="mr-1 mb-0">{{ $product->price }} MAD</h4> 
                        <del class="strike-text">{{$product->old_price}} MAD</del>
                    </div>
                    <h6 class="text-success">Free shipping</h6>
                    <div class="d-flex flex-column mt-4">
                        <a href="{{ route('product', $product->id ) }}" class="btn btn-primary btn-sm" type="button">Details</a>
                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button>
                    </div>
                </div>
            </div>
            @endforeach
            @if (count($products) < 1)
            <div class="my-4">
                <h3 class="text-center">No Products</h3>
            </div>
            @endif
        </div>
        <br>
        <div class="col-12 mt-2">
            {{ $products->links('vendor.pagination.bootstrap-5') }}
        </div>
        

    </div>
</div>
</div>
@endsection