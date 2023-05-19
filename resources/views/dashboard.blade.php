@extends('layout.layout')



@section('content')
<div class="row justify-content-center py-5">
    <div class="row rounded dash col-md-9 text-white mt-2 p-3" style="background-color: #37517e;">
        <div class="col-md-3 col-6">
            <div>
                <p class="p-0 mt-2 m-0">Commandes d'aujourd'hui</p>
                <h2 class="text-white">{{ $today }}</h2>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div>
                <p class="p-0 mt-2 m-0">Commandes d'hier</p>
                <h2 class="text-white">{{ $yesterday }}</h2>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div>
                <p class="p-0 mt-2 m-0">Les 7 derniers jours</p>
                <h2 class="text-white">{{ $last7Days }}</h2>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div>
                <p class="p-0 mt-2 m-0">Ce mois-ci</p>
                <h2 class="text-white">{{ $thisMonth }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="row gap-2 justify-content-center mb-5">
    <div class="col-md-3 card p-3">
        <h5><a href="{{ route('user.list') }}">Utilisateurs</a></h5>
        <h4><i class="bi bi-person"></i> {{ $users->count() }}</h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5><a href="{{ route('contact.list') }}">Contacts</a></h5>
        <h4><i class="bi bi-chat-left-dots"></i> {{ $contacts->count() }}</h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5><a href="{{ route('order.list') }}">Commandes</a></h5>
        <h4><i class="bi bi-basket3"></i> {{ $orders->count() }}</h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5><a href="{{ route('product.list.admin') }}">Des produits</a></h5>
        <h4><i class="bi bi-box2"></i> {{ $products->count() }}<h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5><a href="{{ route('category.list.admin') }}">Catégories</a></h5>
        <h4><i class="bi bi-tags"></i> {{ $categories->count() }}</h4>
    </div>

    <div class="col-md-3 card p-3">
        <h5><a href="{{ route('brand.list') }}">Marques</a></h5>
        <h4><i class="bi bi-bookmark-check"></i> {{ $brands->count() }}</h4>
    </div>
</div>


@endsection