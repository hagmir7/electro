@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-10" data-wow-delay="0.1s">
                <h1 class="h3">Modifier le produit</h1>
                @if ($errors->any())

                @foreach ($errors->all() as $error)
                <div class="alert alert-danger p-2 mb-1">{{ $error }}</div>
                @endforeach

                @endif
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nom du produit</label>
                            <input type="text" name="name" class="form-control fs-4 mb-2" >
                            @error('name') <span class="text-danger">{{$message}}</span> <br>@enderror

                            <label for="price">Prix</label>
                            <input type="text" name="price" class="form-control fs-4 mb-2" >
                            @error('price') <span class="text-danger">{{$message}}</span> <br>@enderror

                            <label for="old_price">Ancien prix</label>
                            <input type="number" name="old_price" class="form-control fs-4 mb-2">
                            @error('old_price') <span class="text-danger">{{$message}}</span> <br>@enderror

                            <label for="stock">Quantité en dépôt</label>
                            <input type="number" name="stock" class="form-control fs-4 mb-2">
                            @error('stock') <span class="text-danger">{{$message}}</span> <br>@enderror

                            <label for="name">Catégorie</label>
                            <select name="category_id" class="form-select mb-2 fs-4">
                                <option value="">Choisir une catégorie</option>
                                @foreach ($category as $caty)
                                    <option value="{{ $caty->id }}">{{ $caty->name }}</option>
                                @endforeach
                            </select>
                            @error('category') <span class="text-danger">{{$message}}</span> <br>@enderror


                            <label for="name">Marque</label>
                            <select name="brand_id" class="form-select mb-2 fs-4">
                                <option value="">SChoisir une Marque</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('marque') <span class="text-danger">{{$message}}</span> <br>@enderror
                        </div>
                        <div class="col-md-6">
                            
                            <label for="images">Images</label>
                            <input type="file" accept="image/*" class="form-control fs-4 mb-2" name="images[]" multiple>
                            @error('images') <span class="text-danger">{{$message}}</span> <br>@enderror
                            <label for="description">Description</label>
                            <textarea name="description" cols="30" rows="6"class="form-control fs-4 mb-2"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="body">Grand Description </label>
                            <textarea name="body" cols="30" rows="8"class="form-control fs-4 mb-2"></textarea>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center"><button class="btn btn-primary mt-2 col-md-6">Modifier le produit</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection