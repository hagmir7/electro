@extends('layout.dash')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-6" data-wow-delay="0.1s">
                <h1 class="h3">Créer une nouvelle Contrat</h1>
                @foreach ($errors->all() as $error)
                    <div class="p-2 alert alert-danger">{{ $error }}</div>
                @endforeach
                <form action="{{ route('contrat.e.store') }}" method="POST">
                    @csrf
                    <label for="ref">Numero Contrat</label>
                    <input type="text" name="ref" class="form-control mb-2">
                    @error('ref') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="tournee">Tournee Client</label>
                    <input type="text" name="tournee" class="form-control mb-2">
                    @error('tournee') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">Tarif</label>
                    <select name="tarif" class="form-select mb-2">
                        <option value="Domistik">Domistik</option>
                        <option value="Insttruliel">Insttruliel</option>
                    </select>
                    @error('tarif') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">Client</label>
                    <select name="client" class="form-select mb-2">
                        <option value="">Selectioner Client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{$client->name}}</option>
                        @endforeach
                    </select>
                      @error('client') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <button class="btn btn-primary w-100">Créer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection