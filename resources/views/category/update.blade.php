@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container my-5">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-8 mt-2">
                <h1 class="h3">Modifer catégorie</h1>
                @if ($errors->any())

                @foreach ($errors->all() as $error)
                <div class="alert alert-danger p-2 mb-1">{{ $error }}</div>
                @endforeach

                @endif
                <form action="{{ route('category.update.store', $category->id ) }}" method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <label for="name">Nom de catégorie</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control mb-2 fs-4" placeholder="Catégorie...">
                    @error('name') <span class="text-danger">{{$message}}</span> <br>@enderror
                    <label for="images">Images</label>
                    <input type="file" accept="image/*" class="form-control mb-2 fs-4" name="image">
                    @error('images') <span class="text-danger">{{$message}}</span> <br>@enderror
                    <img src="{{ $category->image }}" class="my-2" width="60px" alt="{{ $category->name }}">

                    <button class="btn btn-primary w-100">Modifer catégorie</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection