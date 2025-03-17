<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('show.homepage') }}"><img id="MDB-logo" class=""
          src="{{ asset('FrontEnd/images/logo1.png') }}" alt="MDB Logo"
          draggable="false" height="30" /></a>
      <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link mx-2" href="{{ route('show.post') }}"><i class="fas fa-plus-circle pe-2"></i>Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#!"><i class="fas fa-bell pe-2"></i>Alerts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="#!"><i class="fas fa-heart pe-2"></i>Trips</a>
          </li>
          @guest
          <li class="nav-item ms-3">
              <a class="btnAll btn btn-rounded fw-bold" href="{{ route('show.login') }}" style="background-color: rgb(248, 231, 143)">Login</a>
            </li>
            <li class="nav-item ms-3">
                <a class="btnAll btn btn-rounded fw-bold" href="{{ route('show.register') }}" style="background-color: rgb(248, 231, 143)">Register</a>
            </li>
            @endguest

            @auth
                <li class="nav-item">
                <span class=" mx-2">I'm {{ Auth::user()->name }}</span>
                </li>

                <li class="nav-item ms-3">
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button class="btnAll btn btn-rounded fw-bold" style="background-color: rgb(248, 231, 143)">Logout</button>
                  </form>
                </li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
