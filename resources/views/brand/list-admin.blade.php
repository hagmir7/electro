@extends('layout.dash')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive col-md-8 my-3 overflow-auto">


            <table id="mytable" class="table table-bordred table-striped">
                <h4>Marques ({{ $brands->count() }})</h4>
                <div class="d-flex justify-content-between">
                    <p><a class="btn btn-outline-success btn-sm" href="{{ route('brand.create') }}">+ Créer une marque</a></p>
                    <p></p>
                </div>
                <thead>
                    <tr>
                        <th>Nom de Marque</th>
                        <th>Des produits</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <td><a class="text-black underline-none" href="{{ route('brand', $brand->id) }}">{{ $brand->name }}</a></td>
                        <td>{{ $brand->products->count() }}</td>
                        <td>
                            <a href="{{ route('brand.update', $brand->id) }}" class="btn btn-info text-white btn-sm btn-xs"><i class="bi bi-pen"></i></a>
                            <a href="{{ route('brand.delete', $brand->id) }}" onclick="return confirm('Are you sur you want to delete brand?')" class="btn btn-danger btn-sm btn-xs"> <i class="bi bi-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
        
            <div class="clearfix"></div>
            {{ $brands->links('vendor.pagination.bootstrap-5') }}
        
        </div>
    </div>
</div>

@endsection