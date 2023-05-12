<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mery Shop - Free Cryptocurrency Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</head>



<style>
    .card iframe{width: 100%};
    
</style>


<body class="bg-light">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5 border-bottom">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="/assets/img/icon-1.png" alt=""
                    style="width: 45px;"></h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/product/list" class="nav-item nav-link">Products</a>
                <a href="/category/list" class="nav-item nav-link">Categories</a>
                <a href="/contact" class="nav-item nav-link">Contact Us</a>
            </div>
            @auth
            <div class="d-flex">
                <a class="btn btn-square rounded-circle me-1" href="https://www.twitter.com/meryshop" target="_blank"><i class="fab fa-bag"></i></a>
                <a class="btn btn-square rounded-circle me-1" href="https://www.facebook.com/meryshop" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle me-1" href="https://www.youtube.com/meryshop" target="_blank"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-square rounded-circle me-1" href="https://www.instagram.com/meryshop" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            @endauth

            @unless (Auth::check())
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a href="{{ route('register') }}" class="btn btn-primary mx-1">Register</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary mx-1">Login</a>
            </div> 
            @endunless

        </div>
    </nav>
    <!-- Navbar End -->



    @yield('content')



    <!-- Footer Start -->
    <div class="container-fluid bg-light footer mt-5 pt-5 wow fadeIn animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6">
                    <h1 class="text-primary mb-4"><img class="img-fluid me-2" src="img/icon-1.png" alt="" style="width: 45px;">MeryShop</h1>
                    <span>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum
                        et lorem et sit.</span>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-4">Offers News</h5>
                    <p>Clita erat ipsum et lorem et sit, sed stet lorem sit clita.</p>
                    <div class="position-relative">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, Fes, Morocco</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+212 4968544</p>
                    <p><i class="fa fa-envelope me-3"></i>contact@meryshp.store</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Our Categories</h5>
                    <a class="btn btn-link" href="">Currency Wallet</a>
                    <a class="btn btn-link" href="">Currency Transaction</a>
                    <a class="btn btn-link" href="">Bitcoin Investment</a>
                    <a class="btn btn-link" href="">Token Sale</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="/about">About Us</a>
                    <a class="btn btn-link" href="/contact">Contact Us</a>
                    <a class="btn btn-link" href="/servicess">Our Services</a>
                    <a class="btn btn-link" href="tearms">Terms &amp; Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Follow Us</h5>
                    <div class="d-flex">
                        <a class="btn btn-square rounded-circle me-1" href="https://www.twitter.com/meryshop" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href="https://www.facebook.com/meryshop" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href="https://www.youtube.com/meryshop" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href="https://www.instagram.com/meryshop" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        © <a href="/">MeryShop</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/lib/wow/wow.min.js"></script>
    <script src="/assets/lib/easing/easing.min.js"></script>
    <script src="/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/assets/lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="/assets/js/main.js"></script>


    @if(session()->has('message'))
    <script>
        Swal.fire({
            title: 'Succès!',
            text: '{{ session()->get('message') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    </script>
    @endif

</body>

</html>