<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <p>Nama</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Aplikasi Minimarket</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{ (request()->is('categories','||','product',)) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('categories','||','product',)) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/categories')}}" class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/product')}}" class="nav-link {{ (request()->is('product')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('/report')}}" class="nav-link {{ (request()->is('report')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>