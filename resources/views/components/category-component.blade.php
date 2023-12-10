@foreach ($categories as $category)


<div class="col-md-6 mt-3">
    <div class="cart-item shadow-sm">
        <img src="{{ $category->image }}" alt="{{ $category->name}}">
        <div class="px-3">
            <h4 class="cart-item-title"><a href="{{ route('category', $category->id ) }}">{{ $category->name}}</a> </h4>
            <p class="cart-item-qty m-0">منتجات : <strong> {{ $category->products->count() }}</strong></p>
        </div>
        <a href="{{ route('category', $category->id ) }}" class="btn btn-outline-danger ms-auto fs-5">عرض المنتجات</a>
    </div>
</div>
@endforeach
{{ $categories->links('vendor.pagination.bootstrap-5')  }}


