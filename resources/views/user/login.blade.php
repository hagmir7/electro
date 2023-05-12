@extends('../layout/layout')


@section('content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5 card my-4 py-4 px-2">
            <h1 class="h3 text-center">Login User</h1>
            <form action="{{ route('login.store') }}" method="POST" >
                @csrf
                @error('email')
                    <div class="p-1 alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control mt-2" placeholder="Email">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Password">
                <button class="btn btn-primary mt-4 w-100">Login</button>
                <a href="{{ route('register') }}" class="btn btn-outline-primary mt-4 w-100">Create new account</a>
            </form>
        </div>
    </div>
</div>


@endSection