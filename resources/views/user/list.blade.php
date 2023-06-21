@extends('layout.dash')


@section('content')
<div class="container my-5">
    <div class="row">
        <div class="table-responsive  overflow-auto">
            <table id="mytable" class="table table-bordred table-striped">
                <h4>Liste des utilisateurs ({{ $users->count() }})</h4>
                <div class="d-flex justify-content-between">
                    <p><a class="btn btn-outline-success" href="{{ route('register') }}">+ Créer un utilisateur</a></p>
                </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom et prénom</th>
                        <th>E-mail</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('user.delete', $user->id) }}" onclick="return confirm('Voulez-vous vraiment supprimer le utilisateur ?')" class="btn btn-danger"> <i class="bi bi-trash"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
            {{ $users->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection