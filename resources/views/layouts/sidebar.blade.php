<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Dinas Lingkungan Hidup
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      @can('isAdmin')
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['home']) }}">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Pelaporan</li>
      <li class="nav-item {{ active_class(['pelaporan', 'tanggapan']) }}">
        <a class="nav-link" data-toggle="collapse" href="#pelaporan" role="button" aria-expanded="{{ is_active_route(['pelaporan/*']) }}" aria-controls="pelaporan">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Pelaporan</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['pelaporan/*']) }}" id="pelaporan">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/pelaporan') }}" class="nav-link {{ active_class(['pelaporan']) }}">Data Pelaporan</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/tanggapan') }}" class="nav-link {{ active_class(['tanggapan']) }}">Riwayat Pelaporan</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">Pengaduan</li>
      <li class="nav-item {{ active_class(['pengaduan']) }}">
        <a href="{{ url('/pengaduan') }}" class="nav-link">
          <i class="link-icon" data-feather="file-text"></i>
          <span class="link-title">Pengaduan</span>
        </a>
      </li>
      @elsecan('isUser')
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['home']) }}">
        <a href="{{ url('/home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Pelaporan</li>
      <li class="nav-item {{ active_class(['pelaporan']) }}">
        <a class="nav-link" data-toggle="collapse" href="#pelaporan" role="button" aria-expanded="{{ is_active_route(['pelaporan/*']) }}" aria-controls="pelaporan">
          <i class="link-icon" data-feather="book"></i>
          <span class="link-title">Pelaporan</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['pelaporan/*']) }}" id="pelaporan">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/pelaporan/menu') }}" class="nav-link {{ active_class(['pelaporan/menu']) }}">Form Pengajuan Pelaporan</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/pelaporan') }}" class="nav-link {{ active_class(['pelaporan']) }}">Data Pelaporan</a>
            </li>
          </ul>
        </div>
      </li>
      @elsecan ('isOperator')
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['user']) }}">
        <a href="{{ url('/user') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Data Pengguna</span>
        </a>
      </li>
      @endcan
      
    </ul>
  </div>
</nav>