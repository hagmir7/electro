<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Electro</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/style.css">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- laravel csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body class="bg-light">
    <nav class="sidebar ">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>
                <a href="{{ route('dashboard') }}" style="text-decoration: none;">
                    <div class="text logo-text">
                        <span class="name">Electro Admin</span>
                    </div>
            </div>
            </a>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('dashboard') }}">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text"> Tableau de bord</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route("product.list.admin") }}">
                            <i class='bx bx-list-plus icon'></i>
                            <span class="text nav-text">Produits</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route("category.list.admin") }}">
                            <i class='bx bx-category icon'></i>
                            <span class="text nav-text">Categories</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('order.list') }}">
                            <i class='bx bx-cart icon'></i>
                            <span class="text nav-text">commande</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('user.list') }}">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('contact.list') }}">
                            <i class='bx bx-chat icon'></i>
                            <span class="text nav-text">Contacts</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="{{ route('logout') }}">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Se déconnecter</span>
                    </a>
                </li>

            </div>
        </div>

    </nav>

    <section class="home">
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            @yield('content')
        </div>
    </section>

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="/dash-assets/js/jquery.min.js"></script>
    <script src="/dash-assets/js/popper.js"></script>
    <script src="/dash-assets/js/bootstrap.min.js"></script>
    <script src="/dash-assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

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


    <script>
        $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    </script>


    @yield('script')

</body>

</html>