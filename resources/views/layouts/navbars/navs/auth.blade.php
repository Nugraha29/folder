@if(Auth::user()->status == "menunggu")
 
@else
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-success">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{ $titlePage }}</a>
  </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form">
      </form>
      <ul class="navbar-nav">
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">notifications</i>
            <span class="notification">2</span>
            <p class="d-lg-none d-md-block">
              {{ __('Some Actions') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">
              <i class="material-icons text-warning">assignment</i>{{ __('Pelaporan CV.Himagrib') }}</a>
            <a class="dropdown-item" href="#">
              <i class="material-icons text-danger">assignment</i>{{ __('Pengaduan Anwar Fauzi') }}</a>
          </div>
        
        </li>
        -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">account_circle</i>
            <p class="d-lg-none d-md-block">
              {{ __('Akun') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">
              <i class="material-icons">person</i>
              @if (auth()->user()->roles == 'User')
                {{ __('Profil Perusahaan') }}
              @else
                {{ __('Profil') }}
              @endif
            </a>
            <a class="dropdown-item" href="{{ route('profile.editpassword') }}">
              <i class="material-icons">build</i>{{ __('Ubah Katasandi') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="material-icons">directions_run</i>
              {{ __('Keluar') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endif
