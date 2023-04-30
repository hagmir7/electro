@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h1 class="display-6">L'agence</h1>
            <p class="text-primary fs-5 mb-5">Tout l'agence de RADEEF a Fes.</p>
        </div>
        <div class="row g-4">
            @foreach ($agences as $agence)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 1 }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="service-item bg-light p-5">
                    <img class="img-fluid mb-4" src="/assets/img/icon-7.png" alt="">
                    <h5 class="mb-3">{{ $agence->name }}</h5>
                    <p class="m-0 p-0">Chef <strong>{{ $agence->chef }}.</strong></p>
                    <p>{{ $agence->address }}</p>
                    <a href="{{ route('agence.show', $agence->id ) }}" >Savoir Plus<i class="fa fa-arrow-right ms-2"></i></a> <br>
                    <a href="{{ route('agence.delete', $agence->id ) }}" onclick='return confirm("Voulez-vous vraiment supprimer l agence ")' class="btn btn-danger btn-sm mt-2 float-end">Supprimer</a>
                   
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- About End -->
@endsection