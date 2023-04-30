@extends('../layout/layout')


@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 card  mt-2 bg-light py-4 px-2">
            <h1 class="h3 text-center">Connexion</h1>
            <form action="{{ route('login.store') }}" method="POST" >
                @csrf
                @error('email')
                    <div class="p-1 alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control mt-2" placeholder="E-mail">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Mot de passe">
                <button class="btn btn-success mt-4 w-100">Connexion</button>
            </form>
        </div>
    </div>
</div>


@endSection