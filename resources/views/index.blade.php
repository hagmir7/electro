@extends('layout.layout')


@section('content')
<div class="container-fluid hero-header bg-light p-0 m-0">
    <div class="container pt-3 p-0">
        <div class="row g-3 ">
            <div id="carouselExampleSlidesOnly" class="carousel slide col-md-8 card p-0 overflow-hidden" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/assets/img/Clothing.png" class="d-block w-100" alt="Clothing">
                  </div>
                  <div class="carousel-item">
                    <img src="/assets/img/Electronic.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="/assets/img/Fitness.png" class="d-block w-100" alt="...">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class=" h-100">
                    <div class="list-group">
                        @foreach ($categories as $category)
                        <a href="{{ route("category", $category->id ) }}" type="button" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                        @endforeach
                      </div>
                </div>
              </div>
        </div>
    </div>
</div>


<div class="container p-0">
    <div class="d-flex justify-content-between">
        <div><h5 class="mt-3 mb-0">Electronics and Gadgets</h5></div>
        <div class="mt-3"><a href="/category/2">See More <i class="bi bi-arrow-right"></i></a></div>
    </div>
    <div class="row py-2">
        @foreach ($electronics as $product)
        <div class="col-sm-3 mb-3">
            <div class="thumb-wrapper wow fadeInUp" data-wow-delay="0.{{$loop->index + 1}}s">
                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                <a href="{{ route('product', $product->id ) }}">
                    <div class="img-box">
                        <img src="{{ $product->images->first()->image }}" class="img-fluid" alt="Speaker">
                    </div>
                </a>
                <div class="thumb-content">
                    <h6>{{ Str::limit($product->name, $limit = 25, $end = '...') }}</h6>
                    <p class="item-price"><del>{{ $product->old_price }} MAD</del> <strong>{{ $product->price }} MAD</strong></p>
                    <a href="#" class="btn btn-outline-primary rounded-pill">Add to Cart</a>
                </div>						
            </div>
        </div> 
        @endforeach
    </div>
</div>


<div class="container p-0">
   

    <div class="d-flex justify-content-between">
        <div><h5 class="mt-3 mb-0">Clothing and Fashion </h5></div>
        <div class="mt-3"><a href="/category/1">See More <i class="bi bi-arrow-right"></i></a></div>
    </div>
    <div class="row">
        @foreach ($clothing as $product)
        <div class="col-md-3">
            <div class="thumb-wrapper text-start p-0 overflow-hidden" >
                <div class="image-container">
                    <a href="{{ route('product', $product->id )}}">
                        <img src="{{ $product->images->first()->image }}" class="img-fluid border-bottom"> 
                    </a>
                </div>
                <div class="product-detail-container p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('product', $product->id )}}">
                        <h6 class="dress-name">{{ Str::limit($product->name, $limit = 40, $end = '...') }}</h6>
                    </a>
                    </div>
                    <div class="d-flex flex-column">
                        <strong class="text-primary">{{$product->old_price}} MAD</strong>
                        {{-- <del class="old-price text-right fs-6">{{ $product->old_price}} MAD</del> --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection