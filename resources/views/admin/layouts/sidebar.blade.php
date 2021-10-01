 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">DutaMotor</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">M. Admin</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         {{-- <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div> --}}

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent nav-legacy" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-item menu-open">
                    <a href="#" class="nav-link {{ request()->is('/mobil') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/transaksi/kredit/kredit-baru" class="nav-link {{ request()->is('/transaksi/kredit/kredit-baru') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kredit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/transaksi/cash/beli-baru"
                                class="nav-link {{ request()->is('/transaksi/cash/beli-baru') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Beli Cash</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/transaksi/cash/beli-baru"
                                class="nav-link {{ request()->is('/transaksi/cash/beli-baru') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bayar Cicilan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-header">DATA</li>
                 <li class="nav-item {{ request()->is('mobil/*') || request()->is('mobil') ? 'menu-open' : '' }}">
                     <a href="#" class="nav-link {{ request()->is('mobil/*') || request()->is('mobil') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-car"></i>
                         <p>
                             Mobil
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/mobil" class="nav-link {{ request()->is('mobil') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Mobil</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/mobil/create"
                                 class="nav-link {{ request()->is('mobil/create') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Tambah Mobil</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item {{ request()->is('pembeli/*') || request()->is('pembeli') ? 'menu-open' : '' }}">
                     <a href="#" class="nav-link {{ request()->is('pembeli/*') || request()->is('pembeli') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Pembeli
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/pembeli" class="nav-link {{ request()->is('/pembeli') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data Pembeli</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/pembeli/register-pembeli"
                                 class="nav-link {{ request()->is('/pembeli/register-pembeli') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Register Pembeli</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link {{ request()->is('/mobil') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-wallet"></i>
                         <p>
                             Data Transaksi
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="/transaksi/kredit/kredit-baru" class="nav-link {{ request()->is('/transaksi/kredit/kredit-baru') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kredit</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/transaksi/cash/beli-baru"
                                 class="nav-link {{ request()->is('/transaksi/cash/beli-baru') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Beli Cash</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="/transaksi/cash/beli-baru"
                                 class="nav-link {{ request()->is('/transaksi/cash/beli-baru') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Bayar Cicilan</p>
                             </a>
                         </li>
                     </ul>
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
