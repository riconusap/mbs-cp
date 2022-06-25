<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand px-2">
        <a href="{{route('dashboard')}}">Mauza Berkah Sejahtera</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('dashboard')}}">MBS</a>
      </div>
        <ul class="sidebar-menu">
          <li class="{{$menu == 'dashboard' ? 'active' : ''}}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Data</li>
          <li class="{{$menu == 'data-project' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-project') }}"><i class="fas fa-table"></i> <span>Data Project</span></a></li>
          <li class="{{$menu == 'data-client' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-client') }}"><i class="fas fa-address-book"></i> <span>Client</span></a></li>
          <li class="{{$menu == 'data-pegawai' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-pegawai') }}"><i class="fas fa-users"></i> <span>Pegawai</span></a></li>
          <li class="menu-header">Setting</li>
          <li class="{{$menu == 'data-tentang-perusahaan' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-tentang-perusahaan') }}"><i class="fas fa-building"></i><span>Tentang Perusahaan</span></a></li>
        </ul>
    </aside>
  </div>