@extends('layout.layout')


@section('content')


<div class="container">
    <!-- row -->
    <h1 class="mt-3">Liste des Marques</h1>
    <div class="row">
        @foreach ($brands as $brand)
        <div class="col-md-6 mt-3">
            <div class="cart-item shadow-sm">
                <img src="{{ $brand->image }}" alt="{{ $brand->name}}">
                <div>
                    <h4 class="cart-item-title"><a href="{{ route('brand', $brand->id ) }}">{{ $brand->name}}</a> </h4>
                    <p class="cart-item-qty">Produits: <strong> {{ $brand->products->count() }}</strong></p>
                    {{-- <p class="cart-item-qty">Quantité: <strong>1</strong></p> --}}
                </div>
                <a href="{{ route('brand', $brand->id ) }}" class="btn btn-outline-danger ms-auto fs-5">Voir Produits</a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /row -->
</div>

@endsection