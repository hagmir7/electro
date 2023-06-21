@extends('layout.dash')


@section('content')

<style>
    a{
        text-decoration: none!important;
    }
</style>
<div class="table-responsive  overflow-auto">
    <table id="mytable" class="table table-bordred table-striped">
        <h4>Products ({{ $products->count() }})</h4>
        <div class="d-flex justify-content-between">
            <p><a class="btn btn-outline-success btn-sm" href="{{ route('product.create') }}">+ Créer un produit</a></p>
            <p><button class="btn btn-outline-danger btn-sm" id="btn-delete" onclick="deleteProducts()"><i class="bi bi-trash"></i> Supprimer sélectionnée</button></p>
            <p><form method="GET"> <input type="search" name="search" class="form-control form-control-sm border" placeholder="Search"></form></p>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>Nom du produit</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr id="product-{{ $product->id}}">
                <td><input type="checkbox" class="checkthis" name="product[]" value="{{ $product->id }}"></td>
                <td><a class="text-black underline-none" href="{{ route('product', $product->id) }}">{{ Str::limit($product->name, 40, '...') }}</a></td>
                <td><a class="text-black" href="{{ route('category', $product?->category->id) }}">{{ $product->category->name }}</a></td>
                <td>{{ $product->price }} MAD</td>
                <td>
                    <a href="{{ route('product.update', $product->id) }}" class="btn btn-primary btn-sm btn-xs"><i class="bi bi-pen"></i></a>
                    <a href="{{ route('product.delete', $product->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')" class="btn btn-danger btn-sm btn-xs"> <i class="bi bi-trash"></i> </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="clearfix"></div>
    {{ $products->links('vendor.pagination.bootstrap-5') }}

</div>


@endsection

@section('script')
<script>

    $('#checkall').change(function() {
        $('input[name="product[]"]').prop('checked', $(this).prop('checked'));
    });


    const deleteProducts = (e) => {
        const products = $('input[name="product[]"]:checked');
        const listProducts = products.map(function () {
            return this.value;
        }).get();

        const deleteBtn = document.querySelector('#btn-delete')

        if (confirm('Voulez-vous vraiment supprimer ce produits ?')) {
            deleteBtn.innerHTML = (
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span>  Suppression...</span>'
            )
            $.ajax({
                url: `{{ route('product.delete.multiple') }}`,
                method: "POST",
                data: {
                    product: listProducts
                },
                success: function (response) {
                    listProducts.forEach(element => {
                        document.querySelector('#product-'+element).remove()
                    });
                    deleteBtn.innerHTML = 'Supprimer sélectionnée';
                    Swal.fire({
                        title: 'Succès!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })
                },
                error: function (xhr) {
                    deleteBtn.innerHTML = 'Supprimer sélectionnée'
                    Swal.fire({
                        title: 'Error!',
                        text: xhr.responseJSON.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            });
        }

    }
</script>
@endsection