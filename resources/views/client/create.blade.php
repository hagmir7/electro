@extends('layout.dash')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center d-flex justify-content-center">
            <div class="col-lg-6" data-wow-delay="0.1s">
                <h1 class="h3">Créer une nouvelle Client</h1>
                @foreach ($errors->all() as $error)
                    <div class="p-2 alert alert-danger">{{ $error }}</div>
                @endforeach
                <form action="{{ route('client.store') }}" method="POST">
                    @csrf
                    <label for="name">Nom Client</label>
                    <input type="text" name="name" class="form-control mb-2">
                    @error('name') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="cin">CIN Client</label>
                    <input type="text" name="cin" class="form-control mb-2">
                    @error('cin') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="address">Adress</label>
                    <input type="text" name="address" class="form-control mb-2">
                    @error('address') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="name">Ville</label>
                    <select name="ville" class="form-select mb-2">
                        <option value="">Sélectionner la ville</option>
                        <option value="Casablanca">Casablanca</option>
                        <option value="Rabat">Rabat</option>
                        <option value="Marrakech">Marrakech</option>
                        <option value="Fès">Fès</option>
                        <option value="Tanger">Tanger</option>
                        <option value="Agadir">Agadir</option>
                        <option value="Meknès">Meknès</option>
                        <option value="Oujda">Oujda</option>
                        <option value="Kénitra">Kénitra</option>
                        <option value="Tétouan">Tétouan</option>
                        <option value="Safi">Safi</option>
                        <option value="Mohammédia">Mohammédia</option>
                        <option value="Khémisset">Khémisset</option>
                        <option value="Béni Mellal">Béni Mellal</option>
                        <option value="El Jadida">El Jadida</option>
                        <option value="Taza">Taza</option>
                        <option value="Nador">Nador</option>
                        <option value="Settat">Settat</option>
                        <option value="Berrechid">Berrechid</option>
                        <option value="Taourirt">Taourirt</option>
                    </select>
                      @error('ville') <span class="text-danger">{{$message}}</span> <br>@enderror

                    <label for="phone">Telephone</label>
                    <input type="tel" name="phone" class="form-control mb-2">
                    @error('phone') <span class="text-danger mb-2">{{$message}}</span> <br>@enderror
                    <button class="btn btn-primary w-100">Créer</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection