<div class="main-sidebar sidebar-style-2">
      @if (Auth::user()->role->nama === 'admin')
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin') }}"><span>ADMIN</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown {{(request()->is('admin')) ? 'active' : ""}}">
              <a href="{{ route('admin') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{(request()->is('admin/user*')) ? 'active' : ""}}">
              <a href="{{ route('user.index') }}" class="nav-link"><i data-feather="users"></i><span>Kelola Users</span></a>
            </li>
            <li class="dropdown {{(request()->is('admin/jadwal*')) ? 'active' : ""}}">
              <a href="{{ route('jadwal.index') }}" class="nav-link"><i class="fa fa-calendar-alt"></i><span>Jadwal Praktek</span></a>
            </li>
            {{-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Widgets</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
              </ul>
            </li> --}}
           
         
          </ul>
       </aside>
       @elseif(Auth::user()->role->nama === 'resepsionis')
         <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('resepsionis') }}"><span>RESEPSIONIS</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown {{(request()->is('resepsionis')) ? 'active' : ""}}">
              <a href="{{ route('resepsionis') }}" class="nav-link "><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{(request()->is('resepsionis/pasien*')) ? 'active' : ""}}">
              <a href="{{ route('pasien.index') }}" class="nav-link "><i class="fas fa-users"></i><span>Pasien</span></a>
            </li>
            <li class="dropdown {{(request()->is('resepsionis/registrasi/pelayanan*')) ? 'active' : ""}}">
              <a href="{{ route('pelayanan.index') }}" class="nav-link "><i class="fas fa-hand-holding-heart"></i><span>Registrasi Pelayanan</span></a>
            </li>
            <li class="dropdown {{(request()->is('resepsionis/pembayaran*')) ? 'active' : ""}}">
              <a href="{{ route('pembayaran.antrian') }}" class="nav-link "><i class="fas fa-money-bill"></i><span>Pembayaran</span></a>
            </li>
            <li class="dropdown {{(request()->is('resepsionis/transaksi*')) ? 'active' : ""}}">
              <a href="{{ route('pembayaran.antrian') }}" class="nav-link "><i class="fas fa-check"></i><span>Transaksi Selesai</span></a>
            </li>
          
            {{-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Widgets</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
              </ul>
            </li> --}}
           
         
          </ul>
       </aside>
      @elseif(Auth::user()->role->nama === 'dokter' || Auth::user()->role->nama === 'bidan')
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('dokter') }}"><span>DOKTER/BIDAN</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown {{(request()->is('dokter')) ? 'active' : ""}}">
              <a href="{{ route('dokter') }}" class="nav-link "><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{(request()->is('dokter/antrian*')) ? 'active' : ""}}">
              <a href="{{ route('periksa-pasien') }}" class="nav-link "><i class="fas fa-users"></i><span>Periksa Pasien</span></a>
            </li>
            <li class="dropdown {{(request()->is('dokte')) ? 'active' : ""}}">
              <a href="{{ route('periksa-pasien') }}" class="nav-link "><i class="fas fa-file-medical-alt"></i><span>Data Rekam Medis</span></a>
            </li>
          
            {{-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Widgets</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
              </ul>
            </li> --}}
           
         
          </ul>
       </aside>
       @elseif(Auth::user()->role->nama === 'apoteker')
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin') }}"><span>APOTEKER</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown {{(request()->is('apoteker')) ? 'active' : ""}}">
              <a href="{{ route('apoteker') }}" class="nav-link "><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{(request()->is('apoteker/permintaan-resep*')) ? 'active' : ""}} ">
              <a href="{{ route('permintaan-resep') }}" class="nav-link  "><i class="fas fa-file-medical-alt"></i><span>Permintaan Resep</span></a>
            </li>
            <li class="dropdown {{(request()->is('apoteker/data-obat*')) ? 'active' : ""}}">
              <a href="{{ route('data-obat.index') }}" class="nav-link "><i class="fas fa-medkit"></i><span>Kelola Data Obat</span></a>
            </li>
            <li class="dropdown {{(request()->is('apoteker/obat/kategori*')) ? 'active' : ""}}">
              <a href="{{ route('kategori.index') }}" class="nav-link "><i class="fas fa-th-large"></i><span>Kategori Obat</span></a>
            </li>
            {{-- <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Widgets</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
              </ul>
            </li> --}}
           
         
          </ul>
       </aside>

   
      @endif
</div>