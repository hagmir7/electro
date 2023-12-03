@extends('layout.layout')

@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-6">
                <!-- Billing Details -->
               <form method="POST" action="{{ route('product.order.store', $product->id) }}">
                @csrf
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">ADRESSE DE FACTURATION</h3>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <input class="input" value="{{ auth()?->user()?->first_name }}" type="text" required name="first_name" placeholder="Prénom">
                    </div>
                    <div class="form-group">
                        <input class="input" value="{{ auth()?->user()?->last_name }}" type="text" required name="last_name" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <input class="input" value="{{ auth()?->user()?->email }}" type="email" required name="email" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" required name="address" placeholder="Adresse">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" required name="city" placeholder="Ville">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" required name="country" placeholder="Pays">
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <input class="input" value="{{ auth()?->user()?->phone }}" type="tel" required name="phone" placeholder="Téléphone">
                    </div>

                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            J'ai lu et j'accepte les <a href="#">termes et conditions</a>
                        </label>
                    </div>
                    <button class="btn mt-3 btn-primary">Envoyer une demande</button>
                </div>
               </form>
            </div>

            <!-- Order Details -->
            <div class="col-md-6">
                <div class="order-details">
                    <div class="section-title text-center">
                        <h3 class="title">VOTRE COMMANDE</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUIT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            <div class="order-col">
                                <div>1x {{ $product->name }} </div>
                                <div>{{ $product->price }} MAD</div>
                            </div>
                        </div>
                        <div class="order-col">
                            <div>Expédition</div>
                            <div><strong>GRATUIT</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">{{ $product->price }} MAD</strong></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
