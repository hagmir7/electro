@extends('layout.layout')


@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-5 mt-3 card p-2 mt-2">
        <h1 class="h3 text-center">Register New User</h1>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger p-2"> {{ $error }} </div>
        @endforeach
        <form action="{{ route('store_user') }}" method="POST" >
            @csrf
            <input type="text" name="first_name" id="first_name" class="form-control mt-2" placeholder="First Name">
            <input type="text" name="last_name" id="last_name" class="form-control mt-2" placeholder="Last Name">
            <input type="email" name="email" id="email" class="form-control mt-2" placeholder="Email">
            <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Password">
            <input type="password" name="password_1" id="password_1" class="form-control mt-2" placeholder="Confirme Password">
            <button class="btn btn-primary mt-4 w-100">Register</button>
        </form>
        <a class="my-2" href="{{ route('login') }}">I alredy have an account?</a>
    </div>
</div>


@endSection