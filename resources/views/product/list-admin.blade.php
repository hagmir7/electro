@extends('layout.dash')


@section('content')

<style>
    a{
        text-decoration: none!important;
    }
</style>
<div class="table-responsive  overflow-auto">
    <table id="mytable" class="table table-bordred table-striped">
        <h4>Products ({{ $products->count() }})</h4>
        <div class="d-flex justify-content-between">
            <p><a class="btn btn-outline-success btn-sm" href="{{ route('product.create') }}">+ Create Product</a></p>
            <p><input type="search" class="form-control form-control-sm border" placeholder="Search"></p>
        </div>
        <thead>

            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td><input type="checkbox" class="checkthis"></td>
                <td><a class="text-black underline-none" href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 40, '...') }}</a></td>
                <td><a class="text-black" href="{{ route('category', $product?->caty->id) }}">{{ $product->caty->name }}</a></td>
                <td>{{ $product->price }} MAD</td>
                <td>
                    <a href="{{ route('product.update', $product->id) }}" class="btn btn-primary btn-sm btn-xs"><i class="bi bi-pen"></i></a>
                    <a href="{{ route('product.delete', $product->id) }}" onclick="return confirm('Are you sur you want to delete Product?')" class="btn btn-danger btn-sm btn-xs"> <i class="bi bi-trash"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>
    {{ $products->links('vendor.pagination.bootstrap-5') }}

</div>
@endsection