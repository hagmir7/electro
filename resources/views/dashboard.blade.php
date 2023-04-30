@extends('layout.dash')



@section('content')

<div class="row gap-2 justify-content-center">
    <h3>La tableau de bord</h3>
    <div class="col-md-3 card p-3">
        <h5>Clients</h5>
        <h4>{{$clients}}</h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5>Contacts</h5>
        <h4>{{$contacts}}</h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5>Agneces</h5>
        <h4>{{$agences}}</h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5>Contart Electresitiare</h5>
        <h4>{{ $electresitiare }}</h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5>Contrat Eau</h5>
        <h4> {{ $eau}} </h4>
    </div>
    <div class="col-md-3 card p-3">
        <h5>Admins</h5>
        <h4>{{ $admins }}</h4>
    </div>
</div>

@endsection