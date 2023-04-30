@extends('layout.dash')

@section('content')
<div class="row">
    <div>
        <a class="btn btn-success mb-2" href="{{ route("agence.create") }}">+ Nouvelle Agence</a>
    </div>
    <div class="col-md-12 card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Chef</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agences as $agence)
                <tr>
                    <th scope="row">{{ $agence->id }}</th>
                    <td>{{ $agence->name }}</td>
                    <td>{{ $agence->chef }}</td>
                    <td>{{ $agence->phone }} </td>
                    <td>
                        <a href="{{ route('agence.show', $agence->id )}}" class="btn btn-sm btn-info text-white">Voir</a>
                        <a href="{{ route('agence.delete', $agence->id )}}" onclick="return confirm('Voulez-vous vraiment supprimer le agence')" class="btn btn-sm btn-danger">Supprimer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection