@extends('layout.layout')


@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ $user->avatar }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->first_name }} {{ $user->last_name }}</h5>
              <p class="text-muted mb-1">{{ $user->email }}</p>
              <p class="text-muted mb-4">{{ $user->address }}</p>
              <div class="d-flex justify-content-center mb-2">
                @auth
                    @if (auth()->user()->id == $user->id )
                        <a href="{{ route('user.update', $user->id ) }}" class="btn btn-primary">Modifier</a>
                    @endif
                @endauth
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nom et prénom</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->first_name }} {{ $user->last_name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">E-mail</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Téléphone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->phone }}</p>
                </div>
              </div>
        
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Adresse</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->address }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Biographie</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->bio }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection