@extends('layout.layout')


@section('content')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">

							@foreach ($product->images as $item)
              <div class="product-preview">
								<img src="{{ $item->image }}" alt="">
							</div>
              @endforeach

						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
              @foreach ($product->images as $item)
              <div class="product-preview">
								<img src="{{ $item->image}}" alt="">
							</div>
              @endforeach

						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $product->name }}</h2>
							<div>
								<h3 class="product-price">{{ $product->price }} MAD <del class="product-old-price">{{ $product->old_price }} MAD</del></h3>
								<span class="product-available">EN STOCK</span>
							</div>
							<p>{{ $product->description }}</p>

             				<ul class="product-links mb-3">
								<li>Catégorie:</li>
								<li><a href="{{ route('category', $product->category->id ) }}">{{ $product->category->name }}</a></li>
							</ul>

							<div class="add-to-cart">
								<div class="qty-label">
									Quantité <br>
									<div class="input-number">
										<input  id="qty" type="number" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								@auth
									@if (count(\App\Models\CartDetail::where('product_id', $product->id )->where('cart_id', auth()->user()->cart->id )->get()) > 0)
									<button class="add-to-cart-btn" onclick="addToCart('{{ $product->id }}')"><i class="fa fa-shopping-cart"></i> <span id="add-btn-{{ $product->id }}">Retirer du panier</span> </button>
									@else
									<button class="add-to-cart-btn" onclick="addToCart('{{ $product->id }}')"><i class="fa fa-shopping-cart"></i> <span id="add-btn-{{ $product->id }}">Ajouter au panier</span> </button>
									@endif	
								@else
								<button class="add-to-cart-btn" onclick="return (window.location.href = '{{ route('login') }}') "><i class="fa fa-shopping-cart"></i> <span>Ajouter au panier</span> </button>
								@endauth
							
							</div>
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12 mt-5">
            <h3>Description</h3>
            <!-- tab1  -->
              <div id="tab1" class="">
                <div class="row">
                  <div class="col-md-12">
                    <p>{{ $product->body }}</p>
                  </div>
                </div>
              </div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


@endsection