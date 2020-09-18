<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?php echo base_url('asset/img/e-kantin-logo-2.png') ?>" style="width: 100%;">
        </div>
        <div class="sidebar-brand-text mx-3">Waiter</div>
    </a>
    <!-- end  Sidebar - Brand-->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'waiter_dash' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('ekantin_waiter/waiter_dash') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- end Nav Item - Dashboard -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - pemesanan -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'waiter_order' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('ekantin_waiter/waiter_order') ?>">
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