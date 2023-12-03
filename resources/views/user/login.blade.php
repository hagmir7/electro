@extends('../layout/layout')


@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 card my-4 py-4 px-2">
            <h1 class="h2 text-center">Connexion</h1>
            <form action="{{ route('login.store') }}?next={{ request()->query('next') }}" method="POST" >
                @csrf
                @error('email')
                    <div class="p-1 alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control fs-3 mt-2" placeholder="E-mail">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control fs-3 mt-2" placeholder="Mot de passe">
                <button class="btn btn-primary mt-4 w-100">Connexion</button>
                <a href="{{ route('register') }}" class="btn btn-outline-primary mt-4 fs-4 w-100">Créer un nouveau compte</a>
            </form>
        </div>
    </div>
</div>


@endSection
