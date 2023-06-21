@extends('layout.dash')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container my-5">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-8 mt-2 my-5">
                <h1 class="h3">Modifier la marque</h1>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger p-2 mb-1">{{ $error }}</div>
                @endforeach

                @endif
                <form action="{{ route('brand.update.store', $brand->id ) }}" method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <label for="name">Nom de Marque</label>
                    <input type="text" name="name" value="{{$brand->name}}" class="form-control mb-2 fs-4" placeholder="Marque...">
                    @error('name') <span class="text-danger">{{$message}}</span> <br>@enderror
                    <label for="images">Image</label>
                    <input type="file" accept="image/*" class="form-control mb-2 fs-4" name="image">
                    <img src="{{ $brand->image }}" class="my-2" width="60px" alt="{{ $brand->name }}">

                    @error('images') <span class="text-danger">{{$message}}</span> <br>@enderror
                    <button class="btn btn-primary w-100">Modifier la marque</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection