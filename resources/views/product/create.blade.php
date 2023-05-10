@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-6" data-wow-delay="0.1s">
                <h1 class="h3">Create New Product</h1>
                @if ($errors->any())

                @foreach ($errors->all() as $error)
                <div class="alert alert-danger p-2 mb-1">{{ $error }}</div>
                @endforeach

                @endif
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{@old('name')}}" class="form-control mb-2" placeholder="Product name...">
                    @error('name') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{@old('price')}}" class="form-control mb-2" placeholder="Product price">
                    @error('price') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="old_price">Old Price</label>
                    <input type="number" name="old_price" value="{{@old('old_price')}}" class="form-control mb-2">
                    @error('old_price') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="stock">Quantity in Stock</label>
                    <input type="number" name="stock" value="{{@old('stock')}}" class="form-control mb-2">
                    @error('stock') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">Category</label>
                    <select name="category" class="form-select mb-2">
                        <option value="">Select Category</option>
                        @foreach ($category as $caty)
                        <option value="{{ $caty->id }}">{{ $caty->name }}</option>
                        @endforeach
                    </select>
                    @error('category') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="images">Images</label>
                    <input type="file" accept="image/*" class="form-control mb-2" name="images[]" multiple>
                    @error('images') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="color">Select Colors</label>
                    <select name="color[]" class="form-select mb-2" multiple>
                        @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @error('color') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="size[]">Select Sizes</label>
                    <select name="size" class="form-select mb-2" multiple>
                        @foreach ($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                        @endforeach
                    </select>
                    @error('size') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="description">Description</label>
                    <textarea name="description" cols="30" rows="6" class="form-control mb-2">{{ old('description') }}</textarea>

                    <button class="btn btn-primary w-100">Create Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection