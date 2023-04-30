@extends('layout.dash')

@section('content')
<div class="row">
    <div>
        <a class="btn btn-success mb-2" href="{{ route("register") }}">+ Nouvelle Admin</a>
    </div>
    <div class="col-md-12 card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Pernom</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->first_name }} </td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }} </td>
                    <td>
                        <a href="{{ route('user.delete', $user->id )}}" onclick="return confirm('Voulez-vous vraiment supprimer le user')" class="btn btn-sm btn-danger">Supprimer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection