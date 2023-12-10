@extends('layout.layout')


@section('content')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

                <div class="col-md-5 col-md-pull-2">
                    <div id="product-main-img">
                        @foreach ($product->images as $item)
                            <div class="product-preview" style="right: -460px">
                                <img src="{{ $item->image }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-2 col-md-push-5">
                    <div id="product-imgs">
                        @foreach ($product->images as $item)
                            <div class="product-preview">
                                <img src="{{ $item->image }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>


					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $product->name }}</h2>
							<div>
								<h3 class="product-price">{{ $product->price }} درهم <del class="product-old-price">{{ $product->old_price }} درهم</del></h3>
								<span class="product-available">في المخزن</span>
							</div>
							<p>{{ $product->description }}</p>

             				<ul class="product-links mb-3">
								<li>الصنف: </li>
								<li><a href="{{ route('category', $product->category->id ) }}">{{ $product->category->name }}</a></li>
							</ul>

							<div class="add-to-cart">
								<div class="qty-label">
									الكمية <br>
									<div class="input-number">
										<input  id="qty" type="number" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								@auth
									@if (count(\App\Models\CartDetail::where('product_id', $product->id )->where('cart_id', auth()->user()->cart->id )->get()) > 0)
									<button class="add-to-cart-btn" onclick="addToCart('{{ $product->id }}')"><i class="fa fa-shopping-cart"></i> <span id="add-btn-{{ $product->id }}">إزالة من السلة</span> </button>
									@else
									<button class="add-to-cart-btn" onclick="addToCart('{{ $product->id }}')"><i class="fa fa-shopping-cart"></i> <span id="add-btn-{{ $product->id }}">إضافة للسلة</span> </button>
									@endif
								@else
								<button class="add-to-cart-btn" onclick="return (window.location.href = '{{ route('login') }}') "><i class="fa fa-shopping-cart"></i> <span>إضافة للسلة</span> </button>
								@endauth
							</div>
                            <a class="btn btn-warning fw-bold text-light rounded-pill fs-3 w-100" href="{{ route('product.order', $product->id ) }}"> <span>شراء الأن</span> </a>
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
