@extends('layout/dash')


@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-6 mt-3 card p-2 mt-2">
        <h1 class="h3 text-center">Nouveau Admin</h1>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger p-2"> {{ $error }} </div>
        @endforeach
        <form action="{{ route('store_user') }}" method="POST" >
            @csrf
            <input type="text" name="first_name" id="first_name" class="form-control mt-2" placeholder="Prénom">
            <input type="text" name="last_name" id="last_name" class="form-control mt-2" placeholder="Nom de famille">
            <input type="email" name="email" id="email" class="form-control mt-2" placeholder="E-mail">
            <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Mot de passe">
            <input type="password" name="password_1" id="password_1" class="form-control mt-2" placeholder="Confirmez le mot de passe">
            <button class="btn btn-success mt-4 w-100">Créer</button>
        </form>
    
    </div>
</div>


@endSection