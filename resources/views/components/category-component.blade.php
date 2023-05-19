@foreach ($categories as $category)
<div class="col-md-6 mt-3">
    <div class="cart-item shadow-sm">
        <img src="{{ $category->image }}" alt="{{ $category->name}}">
        <div>
            <h4 class="cart-item-title"><a href="{{ route('category', $category->id ) }}">{{ $category->name}}</a> </h4>
            <p class="cart-item-qty">Produits: <strong> {{ $category->products->count() }}</strong></p>
            {{-- <p class="cart-item-qty">Quantité: <strong>1</strong></p> --}}
        </div>
        <a href="{{ route('category', $category->id ) }}" class="btn btn-outline-danger ms-auto fs-5">Voir Produits</a>
    </div>
</div>
@endforeach
{{ $categories->links('vendor.pagination.bootstrap-5')  }}


