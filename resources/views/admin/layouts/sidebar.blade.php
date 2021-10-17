 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/" class="brand-link">
         <img src="{{ asset('img/company-logo-white.svg') }}" style="padding: 4px" alt="AdminLTE Logo"
             class="brand-image">
         <span class="brand-text">dutamotor</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">M. Admin</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent nav-legacy"
                 data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                     <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-header">MASTER</li>
                 <li class="nav-item">
                     <a href="/mobil" class="nav-link {{ request()->is('mobil/*') || request()->is('mobil') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-car"></i>
                         <p>Mobil</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/pembeli" class="nav-link {{ request()->is('pembeli/*') || request()->is('pembeli') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-user"></i>
                         <p>Pembeli</p>
                     </a>
                 </li>
                 <li class="nav-header">TRANSAKSI</li>
                 <li class="nav-item">
                     <a href="/transaksi/cash" class="nav-link {{ request()->is('transaksi/cash') || request()->is('transaksi/cash/*') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-wallet"></i>
                         <p>Beli Cash</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/transaksi/kredit" class="nav-link {{ request()->is('transaksi/kredit') || request()->is('transaksi/kredit/*') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-credit-card"></i>
                         <p>Kredit</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/" class="nav-link {{ request()->is('/transaksi') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-cash-register"></i>
                         <p>Bayar Cicilan</p>
                     </a>
                 </li>
                 <li class="nav-header">UTILITY</li>
                 <li class="nav-item">
                     <a href="/" class="nav-link {{ request()->is('/my-profile') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-user-alt"></i>
                         <p>Profile</p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
