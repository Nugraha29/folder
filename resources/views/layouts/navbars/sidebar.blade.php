@if(Auth::user()->status == "menunggu")
 
@else
<div class="sidebar" data-color="green" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('Dinas Lingkungan Hidup') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    @can('isAdmin')
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">home</i>
            <p>{{ __('Beranda') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'pelaporan' || $activePage == 'review') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#pelaporan" aria-expanded="false">
          <i class="material-icons">assignment</i>
          <p>{{ __('Pelaporan') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="pelaporan">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'pelaporan' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('pelaporan.index') }}">
                <i class="material-icons">assignment</i>
                <span class="sidebar-normal">{{ __('Data Pelaporan') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'review' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('review.index') }}">
                <i class="material-icons">assignment_turned_in </i>
                <span class="sidebar-normal"> {{ __('Riwayat Pelaporan') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'pengaduan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('pengaduan.index') }}">
          <i class="material-icons">assignment</i>
            <p>{{ __('Data Pengaduan') }}</p>
        </a>
      </li>
    </ul>
    @elsecan('isOperator')
    <ul class="nav">    
      <li class="nav-item{{ $activePage == 'pengguna' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <i class="material-icons">person</i>
            <p>{{ __('Data Pengguna') }}</p>
        </a>
      </li>
    </ul>
    @elsecan('isUser')
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'pengajuan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('pelaporan.menu') }}">
          <i class="material-icons">assignment</i>
            <p>{{ __('Form Pengajuan Pelaporan') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'pelaporan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('pelaporan.index') }}">
          <i class="material-icons">assignment</i>
          <p>{{ __('Data Pelaporan') }} </p>
        </a>
      </li>
    </ul>  
    @endcan
  </div>
</div>
@endif