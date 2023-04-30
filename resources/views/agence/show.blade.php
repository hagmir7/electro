@extends('layout.layout')


@section('content')
<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h1 class="display-6">{{ $agence->name }}</h1>
            <p class="text-primary fs-5 mb-5">{{ $agence->address }}</p>
        </div>
        <div class="row g-4 d-flex justify-content-center">
            <div class="col-md-7 p-0">
                <h5>Téléphone : <strong>{{ $agence->phone }}</strong></h5>
                <h5>Chef : <strong>{{ $agence->chef }}</strong></h5>
            </div>
            <div class="col-md-7 p-0 wow fadeInUp card" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                {!! $agence->location !!}
            </div>
      
        </div>
    </div>
</div>
<!-- About End -->
@endsection