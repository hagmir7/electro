<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="/assets/css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="/assets/css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="/assets/css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="/assets/css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="/assets/css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

 		<link type="text/css" rel="stylesheet" href="/assets/css/style.css"/>
		 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

		 <meta name="csrf-token" content="{{ csrf_token() }}">



    </head>
	<body>
		<x-header />

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav d-block">
						<li class="active"><a href="/">Accueil</a></li>
						<li><a href="{{ route('category.list') }}">Catégories</a></li>
						<li><a href="{{ route('brand.list') }}">Marques</a></li>
						<li><a href="/contact">Contactez-nous</a></li>
						<li><a href="/about">À propos de nous</a></li>
						@auth
							<li><a href="{{ route('logout') }}">Deconnexion</a></li>
							@if (auth()->user()->role == "Admin")
								<li><a href="/dashboard">Tableau de bord</a></li>
							@endif
						@endauth
					</ul>
				</div>
			</div>
		</nav>


        @yield('content')
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Catégories</h3>
								<ul class="footer-links">
									@foreach ($categories as $category)
									<li><a href="{{ route('category', $category->id ) }}">{{ $category->name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">INFORMATION</h3>
								<ul class="footer-links">
									<li><a href="/">Accueil</a></li>
									<li><a href="{{ route('category.list') }}">Catégories</a></li>
									<li><a href="{{ route('brand.list') }}">Marques</a></li>
									<li><a href="/contact">Contactez-nous</a></li>
									<li><a href="/about">À propos de nous</a></li>
									@auth
									<li><a href="{{ route('logout') }}">Deconnexion</a></li>
									@endauth
									
								</ul>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">À propos de nous</h3>
								<p>Nous sommes un détaillant majeur spécialisé dans les ordinateurs portables, les téléphones, les appareils photo et autres dispositifs électroniques. Avec une vaste sélection de produits de haute qualité provenant de marques de confiance.</p>
								<ul class="footer-links">
									<li><a href="#!"><i class="fa fa-map-marker"></i>Center Ville, Fes, Maroc</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+212 534342565</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>contact@elctro.com</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>

			
		</footer>

		<!-- jQuery Plugins -->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/slick.min.js"></script>
		<script src="/assets/js/nouislider.min.js"></script>
		<script src="/assets/js/jquery.zoom.min.js"></script>
		<script src="/assets/js/main.js"></script>


		<script>

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		
			  function addToCart(product){
				document.getElementById(`add-btn-${product}`).innerHTML = '<div class="spinner-border" role="status"></div>';
				const qty = document.getElementById('qty');
				const cart = document.getElementById('cart-items');
				  $.ajax({
					url: `{{ route('cart.create') }}`,
					method: "POST",
					data: {
						qty: qty ? qty.value : 1 ,
						product: product
					},
					success: function(response) {
						document.getElementById(`add-btn-${product}`).innerHTML = response.btn;
						cart.innerText = response.items
					},
					error: function(xhr) {
					  console.log(xhr);
					}
				});
			  }
			</script>
	</body>
</html>
