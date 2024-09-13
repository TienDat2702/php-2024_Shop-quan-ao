<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('Backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('Backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @php
              $segment1 = request()->segment(1); // segment là từ chữ sau '/'
              $segment2 = request()->segment(2); // segment là từ chữ sau '/'
          @endphp
          @foreach (config('module.module') as $key => $val)
            <li class="nav-item {{ ($segment1 == $val['name']) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ ($segment1 == $val['name']) ? 'active' : '' }}">
                <i class="{{ $val['icon'] }}"></i>
                <p>
                  {{ $val['title'] }}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              @if (isset($val['supModule']))
                <ul class="nav nav-treeview">
                  @foreach ($val['supModule'] as $module)
                    <li class="nav-item">
                      <a href=" {{ route($module['route']) }}"class="nav-link 
                      {{ ($segment2 == $module['name'] && $segment1 == $val['name']) ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $module['title'] }}</p>
                      </a>
                    </li>
                  @endforeach
                </ul>
              @endif
              
          </li>
          @endforeach
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>