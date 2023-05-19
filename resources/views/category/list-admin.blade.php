@extends('layout.layout')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive col-md-8 my-3 overflow-auto">


            <table id="mytable" class="table table-bordred table-striped">
                <h4>Categories ({{ $categories->count() }})</h4>
                <div class="d-flex justify-content-between">
                    <p><a class="btn btn-outline-success fs-4 btn-sm" href="{{ route('category.create') }}">+ Créer une catégorie</a></p>
                    <p></p>
                </div>
                <thead>
        
                    <tr>
                        <th>Nom de catégorie</th>
                        <th>Des produits</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td><a class="text-black underline-none" href="{{ route('category', $category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->products->count() }}</td>
                        <td>
                            <a href="{{ route('category.update', $category->id) }}" class="btn btn-info text-white btn-sm btn-xs fs-4"><i class="bi bi-pen"></i></a>
                            <a href="{{ route('category.delete', $category->id) }}" onclick="return confirm('Are you sur you want to delete category?')" class="btn btn-danger fs-4 btn-sm btn-xs"> <i class="bi bi-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
        
            <div class="clearfix"></div>
            {{ $categories->links('vendor.pagination.bootstrap-5') }}
        
        </div>
    </div>
</div>

@endsection