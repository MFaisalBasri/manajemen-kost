<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar-dark sidebar accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class=""></i>
            </div>
            <div class="sidebar-brand-text mx-3">Dashboard User</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $title == 'Dashboard' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>dashboard-user">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            DATA MASTER
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Data Master</span>
            </a>
            <div id="collapseTwo" class="collapse <?= $title == 'My Profile' ? 'show' : ($title == 'Akun' ? 'show' : ''); ?>
                    " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Master:</h6>
                    <a class="collapse-item <?= $title == 'My Profile' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard-profile">My Profile</a>
                    <a class="collapse-item <?= $title == 'Akun' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>dashboard-akun">Akun</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item <?= $title == 'Data Tagihan' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>tagihan-user">
                <i class="fas fa-fw fa-credit-card"></i>
                <span>Tagihan</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item <?= $title == 'Data Pembayaran' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>pembayaran-user">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Laporan Pembayaran</span></a>
        </li>

        <!-- <li class="nav-item <?= $title == 'Data Laporan' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>laporan-user">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Laporan</span></a>
        </li> -->

        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item <?= $title == 'Data Ajuan' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>data-ajuan">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>Ajuan</span></a>
        </li> -->

        <!-- Nav Item - Pages Collapse Menu -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php $session = session(); ?>
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $session->get('nama') ?></span>
                            <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/undraw_profile.svg') ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('dashboard-profile') ?> ">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url('dashboard-akun') ?>">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>

            </nav>
            <!-- End of Topbar -->