<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RADEEF Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="d-flex flex-nowrap " style="height:100vh;">
      <div class="d-flex flex-column flex-shrink-0 100vh p-3 text-bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4">RADEEF Admin</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="/" class="nav-link text-white @if(request()->path() == 'home') active @endif"  aria-current="page">
              Accueil
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard" class="nav-link text-white @if(request()->path() == 'dashboard') active  @endif"  aria-current="page">
              Tableau de bord
            </a>
          </li>
          <li>
            <a href="/client" class="nav-link text-white @if(request()->path() == 'client') active @endif">
              Clients
            </a>
          </li>
          <li>
            <a href="/contact/list" class="nav-link text-white @if(request()->path() == 'contact/list') active @endif">
              Reclamation
            </a>
          </li>
          <li>
            <a href="/agence/list" class="nav-link text-white @if(request()->path() == 'agence/list') active @endif">
              Agence
            </a>
          </li>
          <li>
            <a href="/contrat/e/list" class="nav-link text-white @if(request()->path() == 'contrat/e/list') active @endif">
              Contrat Electresitiare
            </a>
          </li>
  
          <li>
            <a href="/contrat/o/list" class="nav-link text-white @if(request()->path() == 'contrat/o/list') active @endif">
              Contrat Eau
            </a>
          </li>

          <li>
            <a href="{{ route('register')}}" class="nav-link text-white @if(request()->path() == 'user/register') active @endif">
              Ajouter Admin
            </a>
          </li>

          <li>
            <a href="{{ route('user.list')}}" class="nav-link text-white @if(request()->path() == 'user/list') active @endif">
              Liste Admin
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>{{auth()->user()->first_name }} {{auth()->user()->last_name }}</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="{{ route('register') }}">Ajouter Admin</a></li>
            <li><a class="dropdown-item" href="{{ route('user.list') }}">Lists admins</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Deconexion</a></li>
          </ul>
        </div>
      </div>
      <div class="container m-2">
        @yield('content')
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
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