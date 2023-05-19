@extends('layout.layout')


@section('content')

<style>
    a{
        text-decoration: none!important;
    }
</style>
<div class="container my-4">
    <div class="row">
        <div class="table-responsive  overflow-auto">
            <table id="mytable" class="table table-bordred table-striped">
                <h4>Des produits ({{ $products->count() }})</h4>
                <div class="d-flex justify-content-between">
                    <p><a class="btn btn-outline-success fs-4 btn-sm" href="{{ route('product.create') }}">+ Créer un produit</a></p>
                    <p></p>
                </div>
                <thead>
        
                    <tr>
                        <th>Nom du produit</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><a class="text-black underline-none" href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 40, '...') }}</a></td>
                        <td><a class="text-black" href="{{ route('category', $product?->category->id) }}">{{ $product->category->name }}</a></td>
                        <td>{{ $product->price }} MAD</td>
                        <td>
                            <a href="{{ route('product.update', $product->id) }}" class="btn fs-4 btn-info btn-sm btn-xs text-white"><i class="bi bi-pen"></i></a>
                            <a href="{{ route('product.delete', $product->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer le produit ?')" class="btn  btn-danger btn-sm btn-xs fs-4"> <i class="bi bi-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
        
            <div class="clearfix"></div>
            {{ $products->links('vendor.pagination.bootstrap-5') }}
        
        </div>
    </div>
</div>
@endsection