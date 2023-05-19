@extends('layout.layout')


@section('content')
<div class="container mt-3 mb-5">
    <div class="row">
        <h1 class="h2 mt-3">{{ $category->name }} ({{ count($products)}})</h1>
    </div>
    <div class="row">
        <!-- product -->
        @foreach ($products as $product)
        <div class="col-md-3 col-xs-6">
            <div class="product">
                <a href="{{ route('product', $product->id ) }}">
                    <div class="product-img">
                        <img src="{{ $product->images->first()->image }}" alt="{{ $product->name }}">
                    </div>
                </a>
                <div class="product-body">
                    <p class="product-category">{{ $product->category->name }}</p>
                    <h3 class="product-name"><a href="{{ route('product', $product->id ) }}">{{ $product->name }}</a></h3>
                    <h4 class="product-price">{{ $product->price }} MAD<del class="product-old-price"> {{ $product->old_price }} MAD</del></h4>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="">
                        @auth
                        @if (count(\App\Models\CartDetail::where('product_id', $product->id )->where('cart_id', auth()->user()->cart->id )->get()) > 0)
                            <button onclick="addToCart({{ $product->id }})" class="btn-primary btn btn-sm">  <span id="add-btn-{{ $product->id }}">Retirer du panier</span></button>										
                        @else
                            <button onclick="addToCart({{ $product->id }})" class="btn-primary btn btn-sm"> <span id="add-btn-{{ $product->id }}"><i class="fa fa-shopping-cart"></i>  Ajouter au panier</span></button>			
                        @endif
                        @else
                            <a href="{{ route('login') }}" class="btn-primary btn btn-sm"><i class="fa fa-shopping-cart"></i>  Ajouter au panier</span></a>										
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if($products->count() == 0)
            <div class="col-12">
                <h3 class="h1 fs-2 text-center my-5">Aucun produit</h3>
            </div>
        @endif
    </div>
</div>
@endsection