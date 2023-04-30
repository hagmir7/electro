@extends('layout.dash')

@section('content')
<div class="row">
    <div>
        <a class="btn btn-success mb-2" href="{{ route("client.create") }}">+ Nouvelle Client</a>
    </div>
    <div class="col-md-12 card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Nom complet</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{ $client->id }}</th>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->ville }}</td>
                    <td>{{ $client->phone }} </td>
                    <td>
                        <a href="" class="btn btn-sm btn-info text-white">Voir</a>
                        <a href="{{ route('client.delete', $client->id )}}" onclick="return confirm('Voulez-vous vraiment supprimer le client')" class="btn btn-sm btn-danger">Supprimer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection