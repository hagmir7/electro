@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
<!-- Product Description Section -->
<div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-4 ">
        <!-- Image Slideshow -->
        <div id="carouselExampleIndicators" class="carousel slide border" data-bs-ride="carousel">
          <div class="carousel-indicators">
            @foreach ($product->images as $image)
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $loop->index + 1 }}"></button>
            @endforeach
          </div>
          <div class="carousel-inner">
            @foreach ($product->images as $image)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ $image->image }}" id="zoom_04" class="d-block w-100" alt="{{ $product->name }}">
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="filter:drop-shadow(8px 1px 1px black)"></span>
          </button>
          <button class="carousel-control-next"  type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" style="filter:drop-shadow(8px 1px 1px black)" aria-hidden="true"></span>
          </button>
        </div>
      </div>
      <div class="col-lg-6">
        <!-- Product Details -->
        <h1 class="fw-bold h3">{{ $product->name }}</h1>
        <h2 class="text-primary fw-bold">{{ $product->price }} MAD</h2>
        @if ($product->old_price)
          <del class="text-muted">{{ $product->old_price }} MAD</del>
        @endif

        @if ($product->colors)
        <h6 class="mb-2">Colors</h6>
        <div class="d-flex flex-wrop">
            @foreach ($product->colors as $color)
                <div class="py-3 me-1 rounded px-3 border" style="background-color: {{ $color->code}}"></div>
            @endforeach
        </div>
        <br>
        @endif

        @if ($product->sizes)
        <h6 class="mb-2">Sizes</h6>
        <div class="d-flex flex-wrap">
            @foreach ($product->sizes as $size)
            <div class="py-2 me-1 rounded px-3 border mb-1">{{ $size->size}}</div>
            @endforeach
        </div>
        @endif

        <p class="lead fs-6 my-4">{{ $product->description }}</p>
        <div class="mt-2">
            <button class="btn btn-primary w-100">Pay Now</button>
            <button class="btn btn-warning mt-2 w-100" data-bs-toggle="modal" data-bs-target="#addToCart">Add to cart</button>
          </div>
      </div>

    </div>
  </div>
  

</div>

  
  <!-- Add to cart modal -->
  <div class="modal" id="addToCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addToCartLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addToCartLabel">Add To Cart</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-check">
        @if ($product->colors)
            <h6 class="mb-2">Select colors</h6>
            <div class="d-flex flex-wrop">
                @foreach ($product->colors as $color)
                <div>
                    <div class="py-3 me-1 rounded px-3 border" style="background-color: {{ $color->code}}">  </div>
                    <input type="checkbox" name="colors[]" class="form-check-input" value="{{ $color->id }}" id="color-{{ $color->id }}">
                    <label class="form-check-label mt-1 w-100 me-1 text-center p-1" for="color-{{ $color->id }}"></label>
                </div>
                @endforeach
            </div>
            <br>
        @endif

        @if ($product->sizes)
        <h6 class="mb-2">Select sizes</h6>
        <div class="d-flex flex-wrap">
            @foreach ($product->sizes as $size)
            <div class="py-2 me-1 rounded px-2 border mb-1">{{ $size->size}}</div>
            @endforeach
        </div>
        @endif
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add to cart</button>
        </div>
      </div>
    </div>
  </div>
<!-- About End -->
@endsection