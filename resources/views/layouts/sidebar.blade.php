<!doctype html>
<html lang="en">
  <head>
    @yield('title')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">

      <!-- Sidebar Content -->
      <nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="{{ request()->is('/') || request()->is('ibuhamil/*') ? 'active' : '' }}">
	            <a href="{{ route('dashboard') }}" class="dropdown-toggle">Ibu Hamil</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
	            </ul>
	          </li>
	          <li class="{{ request()->is('bayi') || request()->is('bayi/*') ? 'active' : '' }}">
	              <a href="{{ route('balita') }}">Balita</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Imunisasi</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li class="{{ request()->is('imunisasi') || request()->is('imunisasi/*') ? 'active' : '' }}">
                    <a href="{{ route('imunisasi') }}">Imunisasi</a>
                </li>
                <li class="{{ request()->is('jenisimunisasi') || request()->is('jenisimunisasi/*') ? 'active' : '' }}">
                    <a href="{{ route('jenis_imunisasi') }}">Jenis Imunisasi</a>
                </li>
              </ul>
	          </li>
	          <li class="{{ request()->is('penimbang') || request()->is('penimbang/*') ? 'active' : '' }}">
              <a href="{{ route('timbangan') }}">Timbangan</a>
	          </li>
            <!-- Authentication Links -->
            @if(Auth::user())
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
            @endif
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank">Posyandu SIAPA</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>
	      </div>
    	</nav>
      
      <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <img src="{{ asset('badge_posyandu.png') }}" alt="posyandu logo image" style="width: 60px;">
            <h5 style="font-weight: bold; color: orange" class="ml-1">| List Data</h5>
            <button class="btn btn-primary d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') || request()->is('ibuhamil/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">Ibu Hamil</a>
                </li>
                <li class="nav-item {{ request()->is('bayi') || request()->is('bayi/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('balita') }}">Balita</a>
                </li>
                <li class="nav-item {{ request()->is('penimbang') || request()->is('penimbang/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('timbangan') }}">Timbangan</a>
                </li>
                <li class="nav-item {{ request()->is('imunisasi') || request()->is('imunisasi/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('imunisasi') }}">Imunisasi</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        @include('sweetalert::alert')
        @yield('content')

      </div>

		</div>

    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
  </body>
</html>