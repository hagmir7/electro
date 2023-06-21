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
            <p><a class="btn btn-outline-success btn-sm" href="{{ route('category.create') }}">+ Créer un Catégorie</a></p>
            <p><button class="btn btn-outline-danger btn-sm" id="btn-delete" onclick="deleteCategories()"><i class="bi bi-trash"></i> Supprimer sélectionnée</button></p>
            <p><form method="GET"> <input type="search" name="search" class="form-control form-control-sm border" placeholder="Search"></form></p>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" id="checkall"></th>
                <th>Nom de catégorie</th>
                <th>Des produits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr id="category-{{ $category->id }}">
                <td><input type="checkbox" class="checkthis" name="category[]" value="{{ $category->id }}"></td>
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

@section('script')
<script>

    $('#checkall').change(function() {
        $('input[name="category[]"]').prop('checked', $(this).prop('checked'));
    });


    const deleteCategories = (e) => {
        const categories = $('input[name="category[]"]:checked');
        const listcategories = categories.map(function () {
            return this.value;
        }).get();

        const deleteBtn = document.querySelector('#btn-delete')

        if (confirm('Voulez-vous vraiment supprimer ce produits ?')) {
            deleteBtn.innerHTML = (
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span>  Suppression...</span>'
            )
            $.ajax({
                url: `{{ route('category.delete.multiple') }}`,
                method: "POST",
                data: {
                    category: listcategories
                },
                success: function (response) {
                    listcategories.forEach(element => {
                        document.querySelector('#category-'+element).remove()
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