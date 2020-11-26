<div class="main-sidebar sidebar-style-2">
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
      </div>