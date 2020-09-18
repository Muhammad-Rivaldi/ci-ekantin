<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url('asset/img/e-kantin-logo-2.png') ?>" style="width: 100%;">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <!-- end  Sidebar - Brand-->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'admin_dash' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('ekantin_controller/admin_dash') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- end Nav Item - Dashboard -->

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - menu -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'admin_menu' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('ekantin_controller/admin_menu') ?>">
            <i class="fas fa-utensils"></i>
            <span>menu</span></a>
    </li>
    <!-- end Nav Item - menu -->

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'admin_users' ? 'active': '' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>pengguna</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"> Components:</h6>
                <a class="collapse-item" href="<?php echo site_url('ekantin_controller/admin_users') ?>">users</a>
                <a class="collapse-item" href="<?php echo site_url('ekantin_controller/admin_levels') ?>">level</a>
            </div>
        </div>
    </li>
    <!-- end Nav Item - Pages Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - transaksi -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'admin_tran' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('ekantin_controller/admin_tran') ?>">
            <i class="fas fa-file-invoice"></i>
            <span>transaksi</span></a>
    </li>
    <!-- end Nav Item - transaksi -->

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - pemesanan -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'admin_order' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('ekantin_controller/admin_order') ?>">
            <i class="fas fa-info-circle"></i>
            <span>pemesanan</span></a>
    </li>
    <!-- end Nav Item - pemesanan -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>