@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-6" data-wow-delay="0.1s">
                <h1 class="h3">Créer une nouvelle agence</h1>
                <form action="{{ route('agence.store') }}" method="POST">
                    @csrf
                    <label for="name">Nom Agence</label>
                    <input type="text" name="name" class="form-control mb-2">
                    @error('name') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="chef">Chaf Agence</label>
                    <input type="text" name="chef" class="form-control mb-2">
                    @error('chef') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">Telephone</label>
                    <input type="tel" name="phone" class="form-control mb-2">
                    @error('phone') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">Emplacement</label>
                    <input type="text" name="location" class="form-control mb-2">
                    @error('location') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">Addrese</label>
                    <input type="text" name="address" class="form-control mb-3">
                    @error('address') <span class="text-danger">{{$message}}</span> <br>@enderror
                    <button class="btn btn-primary w-100">Créer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection