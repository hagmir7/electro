@extends('layout.layout')


@section('content')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						
						{{-- Categories --}}
						<div class="aside">
							<h3 class="aside-title">Catégories</h3>
							<div class="checkbox-filter">
								@foreach ($categories as $category)
								<div class="input-checkbox">
									<span>
										<a href="{{ route('category', $category->id ) }}">{{ $category->name }}</a>
									</span>
								</div>
								@endforeach
							</div>
						</div>
	

						{{-- Brands --}}
						<div class="aside">
							<h3 class="aside-title">Marques</h3>
							<div class="checkbox-filter">
								@foreach ($brands as $brand)
								<div class="input-checkbox">
									<span>
										<a href="{{ route('brand', $brand->id ) }}">{{ $brand->name }} ({{ $brand->products->count() }})</a>
									</span>
								</div>
								@endforeach
							</div>
						</div>
					</div>

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="clearfix">
							<div class="store-sort">
							</div>
					</div>

						{{-- Products --}}
						<div class="row">
							<!-- product -->
							@foreach ($products as $product)
							<div class="col-md-4 col-xs-6">
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
										<div>
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
						</div>

						{{ $products->links('vendor.pagination.bootstrap-5')  }}
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection



