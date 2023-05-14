@extends('layout.dash')


@section('content')

<style>
    a{
        text-decoration: none!important;
    }
</style>
<div class="table-responsive  overflow-auto">


    <table id="mytable" class="table table-bordred table-striped">
        <h4>Categories ({{ $categories->count() }})</h4>
        <div class="d-flex justify-content-between">
            <p><a class="btn btn-outline-success btn-sm" href="{{ route('category.create') }}">+ Create category</a></p>
            <p><input type="search" class="form-control form-control-sm border" placeholder="Search"></p>
        </div>
        <thead>

            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>Category Name</th>
                <th>Products</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td><input type="checkbox" class="checkthis"></td>
                <td><a class="text-black underline-none" href="{{ route('category', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->products->count() }}</td>
                <td>
                    <a href="{{ route('category.update', $category->id) }}" class="btn btn-primary btn-sm btn-xs"><i class="bi bi-pen"></i></a>
                    <a href="{{ route('category.delete', $category->id) }}" onclick="return confirm('Are you sur you want to delete category?')" class="btn btn-danger btn-sm btn-xs"> <i class="bi bi-trash"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>
    {{ $categories->links('vendor.pagination.bootstrap-5') }}

</div>
@endsection