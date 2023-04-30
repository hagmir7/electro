@extends('layout.layout')


@section('content')
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">RADEEF | و.م.ت.م.ك.ف </h1>
                    <p class="animated slideInDown h3">REGIE AUTONOME INTERCOMMUNALE DE DISTRIBUTION D’EAU ET D’ELECTRICITE DE FES.</p>
                    <a href="/agence" class="btn btn-primary py-3 px-4 animated slideInDown"> Agence en Ligne </a>
                    <a href="/contact" class="btn btn-primary py-3 px-4 animated slideInDown"> Espace Client </a>
                    <a href="/user/login" class="btn btn-primary py-3 px-4 animated slideInDown"> Espace Admin </a>
                </div>
                <div class="col-lg-6 animated fadeIn d-flex justify-content-center">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s; width: 70%; border-radius: 2rem" src="/assets/img/hero-1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded" src="/assets/img/14.png" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-100">
                            <h1 class="display-6">PRÉSENTATION</h1>
                            <p class="mb-4">
                                La Régie Autonome intercommunale de Distribution d'Eau et d'Electricité de la wilaya de Fès (RADEEF) est un établissement public à caractère industriel et commercial, doté de la personnalité morale et de l’autonomie financière, placé sous la tutelle du Ministère de l’Intérieur.
                            </p>
                            <p class="mb-4">
                                La RADEEF a été créée par délibération du conseil municipal de la ville de Fès en date du 30 avril et 29 août 1969 en vertu du Dahir n° 1.59.315 du 23 Juin 1960 relatif à l’Organisation communale, et ce après l’expiration du contrat de concession dont bénéficiait la Compagnie Fassie d’Electricité (CFE) au titre de la distribution de l’énergie électrique.
                            </p>

                            <p class="mb-4">
                                Par arrêté du 25 Décembre 1969, le Ministre de l’Intérieur a approuvé la délibération du conseil communal de la ville de Fès en date du 29 Août 1969 concernant la création de la RADEEF, fixant la dotation initiale établissant son règlement intérieur ainsi que son cahier des charges.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
@endsection