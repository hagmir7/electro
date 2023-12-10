<!DOCTYPE html>
<html lang="ar" dir="rtl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Nador Store - HTML Ecommerce Template</title>

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
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
					<ul class="main-nav nav navbar-nav d-block float-start">
						<li class="active"><a href="/">الصفحة الرئسية</a></li>
						<li><a href="{{ route('category.list') }}">الأصناف</a></li>
						<li><a href="{{ route('brand.list') }}">ماركات</a></li>
						<li><a href="/contact">تواصل معنا</a></li>
						<li><a href="/about">معلومات عنا</a></li>
						@auth
							<li><a href="{{ route('logout') }}">خروج</a></li>
							@if (auth()->user()->role == "Admin")
								<li><a href="/dashboard">لوحة التحكم</a></li>
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
								<h3 class="footer-title">التصنيفات</h3>
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
								<h3 class="footer-title">معلمات</h3>
								<ul class="footer-links">
									<li><a href="/">الرئسية</a></li>
									<li><a href="{{ route('category.list') }}">أصناف</a></li>
									<li><a href="{{ route('brand.list') }}">ماركات</a></li>
									<li><a href="/contact">تواصل معنا</a></a></li>
									<li><a href="/about">من نحن</a></li>
									@auth
									<li><a href="{{ route('logout') }}">Deconnexion</a></li>
									@endauth

								</ul>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">من نحن</h3>
								<p>
                                    نحن شركة تجزئة رائدة متخصصة في أجهزة الكمبيوتر المحمولة والهواتف والكاميرات والأجهزة الإلكترونية الأخرى. مع مجموعة كبيرة من المنتجات عالية الجودة من العلامات التجارية الموثوقة.
                                </p>
								<ul class="footer-links">
									<li><a href="#!"><i class="fa fa-map-marker me-3"></i>وسط المدينة, الناظور , المغرب</a></li>
                                    <li class="text-end" dir="auto"><a href="tel:+212534342565"><i class="fa fa-phone"></i>+212 534342565</a></li>
                                    <li class="text-end" dir="auto"><a href="mailto:contact@nador.store"><i class="fa fa-envelope-o"></i>contact@nador.store</a></li>
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
