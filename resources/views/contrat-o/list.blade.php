@extends('layout.dash')

@section('content')
<div class="row">
    <div>
        <a class="btn btn-success mb-2" href="{{ route("contrat.o.create") }}">+ Nouvelle Contrat Eau</a>
    </div>
    <div class="col-md-12 card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Numero</th>
                    <th scope="col">Tournee</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Client</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contrats as $contrat)
                <tr>
                    <th scope="row">{{ $contrat->id }}</th>
                    <td>{{ $contrat->tournee }}</td>
                    <td>{{ $contrat->tarif }}</td>
                    <td>{{ $contrat->client->name }} </td>
                    <td>
                        {{-- <a href="" class="btn btn-sm btn-info text-white">Voir</a> --}}
                        <a href="{{ route('contrat.o.delete', $contrat->id )}}" onclick="return confirm('Voulez-vous vraiment supprimer le contrat')" class="btn btn-sm btn-danger">Supprimer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection