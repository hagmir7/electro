@extends('layout.layout')


@section('content')


<div class="container-sm">
    

   <div class="row justify-content-center">

    <div class="col-md-6">
        <h1 class="mt-3">Panier de produits</h1>
        @foreach ($carts as $item)
        <div class="cart-item">
            <img src="{{ $item->product->images->first()->image }}" alt="Product 1">
            <div>
                <h4 class="cart-item-title"><a href="{{ route('product', $item->product->id ) }}">{{ $item->product->name }}</a> </h4>
                <p class="cart-item-qty">Total: <strong>{{ $item->total }}</strong></p>
                <p class="cart-item-qty">Quantité: <strong>{{ $item->quantity }}</strong></p>
            </div>
            <a href="{{ route('cart.delete', $item->id ) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer le produit')" class="btn btn-danger cart-item-remove-btn">Suppermer</a>
        </div>
        @endforeach

        @if ($carts->count() > 0)
            <div class="border rounded p-3">
                <p class="cart-item-qty h3">Produits: <strong>{{ $carts->count() }}</strong></p>
                <p class="cart-item-qty h3">Total: <strong>{{ auth()->user()->cart->getTotal() }}</strong></p>
            </div>
            <a href="{{ route('order.create') }}" class="btn btn-primary my-3 w-100">Envoyer la commande maintenant</a>
        @else
        <div class="my-5">
            <h4 class="py-5 text-center">No Produits</h4>
        </div>
        @endif
    </div>
   </div>
</div>
@endsection