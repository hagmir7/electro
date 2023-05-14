<!doctype html>
<html lang="en">
  <head>
  	<title>Mery Shop Dashobard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link rel="stylesheet" href="/dash-assets/css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="bi bi-list"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="{{ route('dashboard') }}" class="logo">Mery Shop </a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a class="p-2" href="{{ route('dashboard') }}"> Dashboard</a>
          </li>
          <li>
              <a class="p-2" href="{{ route("product.list.admin") }}"> Products</a>
          </li>
          <li>
            <a class="p-2" href="{{ route("category.list.admin") }}"> Categories</a>
          </li>
          <li>
            <a class="p-2" href=""> Orders</a>
          </li>

          <li>
            <a class="p-2" href=""> Tables</a>
          </li>
          <li>
            <a class="p-2" href=""> Servers</a>
          </li>
          <li>
            <a class="p-2" href="{{ route('user.list') }}"> Users</a>
          </li>
          <li>
            <a class="p-2" href="{{ route('contact.list') }}"> Contacts</a>
          </li>
          <li>
            <a class="p-2" href="{{ route('logout') }}"> Logout</a>
          </li>
        </ul>
    	</nav>
      

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        @yield('content')
        

		</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="/dash-assets/js/jquery.min.js"></script>
    <script src="/dash-assets/js/popper.js"></script>
    <script src="/dash-assets/js/bootstrap.min.js"></script>
    <script src="/dash-assets/js/main.js"></script>

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

