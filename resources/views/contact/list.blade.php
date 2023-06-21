@extends('layout.dash')


@section('content')
<!-- About Start -->
<div class="container-xxl py-2">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h1 class="display-6">Contacts</h1>
            <p class="text-primary fs-5 mb-4">Tout les nouveau contacts</p>
        </div>
        <div class="row g-4">
            @foreach ($contacts as $contact)
            <div class="col-lg-6 col-md-6 card" data-wow-delay="0.{{ $loop->index + 1 }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="service-item p-3">
                    <h5 class="mb-3">{{ $contact->full_name }}</h5>
                    <p class="m-0 p-0">Email <strong>{{ $contact->email }}.</strong></p>
                    <p>{{ $contact->message }}</p>
                    <p><strong>Le: </strong>{{ $contact->created_at }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- About End -->
@endsection