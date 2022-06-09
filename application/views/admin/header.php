<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Klasterisasi Menentukan Tingkat Risiko Penyebaran COVID-19</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(#5f0a87, #a4508b);">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('Admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Klasterisasi Penyebaran COVID-19</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master Data
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin/kelola_kelurahan') ?>">
          <i class="fas fa-fw fa-map-marker-alt"></i>
          <span>Data Kelurahan</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin/kelola_covid') ?>">
          <i class="fas fa-fw fa-map-marker-alt"></i>
          <span>Data Covid-19</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin/kelola_covid_filter') ?>">
          <i class="fas fa-fw fa-map-marker-alt"></i>
          <span>Filter Data Covid-19</span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin/kelola_lokasi') ?>">
          <i class="fas fa-fw fa-map-marker-alt"></i>
          <span>Data Lokasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin/kelola_jagung') ?>">
          <i class="fas fa-fw fa-leaf"></i>
          <span>Data Tanaman</span></a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Klaster') ?>">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Data Pengelompokan</span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin/kelola_user') ?>">
          <i class="fas fa-fw fa-users-cog"></i>
          <span>Data User</span></a>
      </li> -->


      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Admin/kelola_admin') ?>">
          <i class="fas fa-fw fa-user-shield"></i>
          <span>Data Admin</span></a>
      </li>

   


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo $nama; ?>
                </span>
                <img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">