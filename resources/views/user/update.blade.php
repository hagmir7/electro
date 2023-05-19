@extends('layout.layout')


@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 mt-3 card p-2 my-3">
            <h1 class="h3 text-center">Modifier votre profil</h1>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger p-2"> {{ $error }} </div>
            @endforeach
            <div class="text-center">
                <img src="{{ $user->avatar }}" width="60px" height="60px" class="rounded-pill cover border" alt="{{ $user->first_name }}">
            </div>
            <form action="{{ route('user.update.store', $user->id ) }}" method="POST" enctype="multipart/form-data" >
                @method("PUT")
                @csrf
                <label for="" class="mt-3">Image de profil</label>
                <input type="file" accept="image/*" name="avatar" class="form-control fs-4">
                <input type="text" name="first_name" value="{{ $user->first_name }}" id="first_name" class="form-control mt-2 fs-4" placeholder="Prenom">
                <input type="text" name="last_name" value="{{ $user->last_name }}" id="last_name" class="form-control mt-2 fs-4" placeholder="Nom">
                <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control mt-2 fs-4" placeholder="E-mail">
                <input type="tel" name="phone" value="{{ $user->phone }}" id="phone" class="form-control mt-2 fs-4" placeholder="Telephone">
                <input type="text" name="address" value="{{ $user->address }}" id="address" class="form-control mt-2 fs-4" placeholder="Adresse">
                <textarea name="bio" id="" cols="30" rows="5" class="form-control mt-2 fs-4" placeholder="Votre biographie">{{ $user->bio }}</textarea>
                <button class="btn btn-primary mt-4 w-100">Modifier</button>
            </form>
        </div>
    </div>
</div>


@endSection