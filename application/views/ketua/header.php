<!DOCTYPE html>
<html>

<head>
  <title>Dashboard - PERPUSIN</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datatable/datatables.css' ?>">
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/jquery.datatables.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/datatables.js'; ?>"></script>
  <style>
    i {
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-examplenavbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url() . 'ketua'; ?>">
          <img src="<?php echo base_url() . 'assets/logo.jpg' ?>" width="30" height="30" alt="">
        </a>
        <a class="navbar-brand" href="<?php echo base_url() . 'ketua'; ?>">WEBSITE PENGAJUAN PKM</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-examplenavbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url() . 'ketua'; ?>"><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>
          <li class="dropdown">
            <a href="<?php echo base_url() . '#'; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ariaexpanded="false">
              <i class="glyphicon glyphicon-folder-open"></i>Laporan<i class="caret" style="margin-left:10px;"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url() . 'ketua/cetak_laporan_pengajuan' ?>">
                  <i class="glyphicon glyphicon-book"></i>Laporan Data Pengajuan
                </a>
              </li>
              <li>
                <a href="<?php echo base_url() . 'ketua/cetak_laporan_mahasiswa' ?>">
                  <i class="glyphicon glyphicon-user"></i>Laporan Data mahasiswa
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ariaexpanded="false"><?php echo "Halo,<b>" . $this->session->userdata('nama_kep'); ?></b><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url() . 'ketua/logout'; ?>"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">