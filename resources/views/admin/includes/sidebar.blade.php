<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand px-2">
        <a href="{{route('dashboard')}}">{{strtoupper($tp->nama_perusahaan)}}</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('dashboard')}}">{{strtoupper($tp->inisial_perusahaan)}}</a>
      </div>
        <ul class="sidebar-menu">
          <li class="{{$menu == 'dashboard' ? 'active' : ''}}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Data</li>
          {{-- <li class="{{$menu == 'data-project' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-project') }}"><i class="fas fa-table"></i> <span>Data Project</span></a></li> --}}
          {{-- <li class="{{$menu == 'data-client' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-client') }}"><i class="fas fa-address-book"></i> <span>Client</span></a></li> --}}
          <li class="{{$menu == 'data-pegawai' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-pegawai') }}"><i class="fas fa-users"></i> <span>Pegawai</span></a></li>
          <li class="{{$menu == 'data-artikel' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-artikel') }}"><i class="fas fa-newspaper"></i> <span>Artikel</span></a></li>
          <li class="{{$menu == 'data-tentang-perusahaan' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-tentang-perusahaan') }}"><i class="fas fa-building"></i><span>Tentang Perusahaan</span></a></li>
          <li class="menu-header">Setting Pages</li>
          <li class="{{$menu == 'data-expertise' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-expertise') }}"><i class="fas fa-briefcase"></i><span>Our Expertise Content</span></a></li>
          <li class="menu-header">Data Master</li>
          <li class="{{$menu == 'data-jabatan' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-jabatan') }}"><i class="fas fa-briefcase"></i><span>Master Jabatan</span></a></li>
          <li class="{{$menu == 'data-kategori' ? 'active' : ''}}"><a class="nav-link" href="{{ route('data-kategori') }}"><i class="fas fa-newspaper"></i><span>Master Kategori Artikel</span></a></li>
          <li class="{{$menu == 'register' ? 'active' : ''}}"><a class="nav-link" href="{{ route('users') }}"><i class="fas fa-user"></i><span>Master User</span></a></li>
        </ul>
    </aside>
  </div>