@foreach ($categories as $category)
<div class="col-6 col-lg-2 p-1 mt-2">
    <div class="card border-0 shadow-sm rounded">
        <div class="image-content">
            <img src="{{ $category->image }}" width="100%" class="cover" alt="{{ $category->name }}">
        </div>
        <div class="p-2 border-top">
            <h6>{{ $category->name }}</h6>
            <a href="{{ route("category", $category->id) }}" class="btn btn-outline-primary rounded-pill w-100">View Products</a>
        </div>
    </div>
</div>
@endforeach
<div class="col-12">
    {{ $categories->links('vendor.pagination.bootstrap-5')  }}
    @if (empty($categories))
    <h3 class="text-center py-5">No Category</h3>
    @endif
</div>