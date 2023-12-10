<div class="col-lg-4 col-md-6 col-6 col-sm-6 col-xs-12">
    <div class="product">
        <a href="{{ route('product', $id ) }}">
            <div class="product-img">
                <img src="{{ $image }}" alt="{{ $name }}">
            </div>
        </a>
        <div class="product-body">
            <p class="product-category">{{ $category }}</p>
            <h3 class="product-name"><a href="{{ route('product', $id ) }}">{{ $name }}</a></h3>
            <h4 class="product-price">{{ $price }} درهم<del class="product-old-price"> {{ $old_price }} درهم</del></h4>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div>
                @auth
                    @if (count(\App\Models\CartDetail::where('product_id', $id )->where('cart_id', auth()->user()->cart->id )->get()) > 0)
                    <button onclick="addToCart({{ $id }})" class="btn-primary btn btn-sm">  <span id="add-btn-{{ $id }}">Retirer du panier</span></button>
                    @else
                    <button onclick="addToCart({{ $id }})" class="btn-primary btn btn-sm"> <span id="add-btn-{{ $id }}"><i class="fa fa-shopping-cart"></i>  أضف للسلة</span></button>
                    @endif
                @else
                <a href="{{ route('login') }}" class="btn-primary btn btn-sm"><i class="fa fa-shopping-cart"></i>  أضف للسلة</span></a>
                @endauth
            </div>
        </div>
    </div>
</div>
