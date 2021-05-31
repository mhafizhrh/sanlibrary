<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$judul?> - SAN Library</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3 -->
  <script src="<?=base_url()?>AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/320b01b5e8.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTable -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- Sweet Alert -->
  <script src="<?=base_url()?>from_npm/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <!-- <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bootstrap-sweetalert-master/dist/sweetalert.css"> -->
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="<?=base_url();?>AdminLTE/bower_components/morris.js/morris.css">
  <script src="<?=base_url()?>AdminLTE/bower_components/morris.js/morris.min.js"></script>
  <!-- <link rel="stylesheet" href="<?=base_url();?>chosen_v1.8.7/docsupport/style.css"> -->
  <!-- <link rel="stylesheet" href="<?=base_url();?>chosen_v1.8.7/docsupport/prism.css"> -->
  <link rel="stylesheet" href="<?=base_url();?>chosen_v1.8.7/chosen.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?=base_url()?>AdminLTE/bower_components/morris.js/morris.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SAN</b> Library</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$nama_lengkap?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url();?>AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$nama_lengkap?>
                  <small>Administator</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url();?>profil" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url();?>keluar" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$nama_lengkap?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active' : null ?>"><a href="<?=base_url();?>dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="treeview <?php echo $this->uri->segment(1) == 'master_data' ? 'active' : null ?>">
          <a href="#">
            <i class="fa fa-list"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(2) == 'data_siswa' ? 'active' : null ?>"><a href="<?=base_url();?>master_data/data_siswa"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'tambah_siswa' ? 'active' : null ?>"><a href="<?=base_url();?>master_data/tambah_siswa"><i class="fa fa-circle-o"></i> Tambah Data Siswa</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'administrator' ? 'active' : null ?>"><a href="<?=base_url();?>master_data/administrator"><i class="fa fa-circle-o"></i> Administrator</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'tambah_administrator' ? 'active' : null ?>"><a href="<?=base_url();?>master_data/tambah_administrator"><i class="fa fa-circle-o"></i> Tambah Administrator</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo $this->uri->segment(1) == 'katalog_buku' ? 'active' : null ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Katalog Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(2) == 'data_buku' ? 'active' : null ?>"><a href="<?=base_url();?>katalog_buku/data_buku"><i class="fa fa-circle-o"></i> Data Buku</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'tambah_buku' ? 'active' : null ?>"><a href="<?=base_url();?>katalog_buku/tambah_buku"><i class="fa fa-circle-o"></i> Tambah Data Buku</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'kategori_buku' ? 'active' : null ?>"><a href="<?=base_url();?>katalog_buku/kategori_buku"><i class="fa fa-circle-o"></i> Kategori Buku</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'tambah_kategori' ? 'active' : null ?>"><a href="<?=base_url();?>katalog_buku/tambah_kategori"><i class="fa fa-circle-o"></i> Tambah Kategori Baru</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo $this->uri->segment(1) == 'data_transaksi' ? 'active' : null ?>">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Data Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo $this->uri->segment(2) == 'peminjaman' ? 'active' : null ?>"><a href="<?=base_url();?>data_transaksi/peminjaman"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'data_peminjaman' ? 'active' : null ?>"><a href="<?=base_url();?>data_transaksi/data_peminjaman"><i class="fa fa-circle-o"></i> Data Peminjaman</a></li>
            <li class="<?php echo $this->uri->segment(2) == 'data_pengembalian' ? 'active' : null ?>"><a href="<?=base_url();?>data_transaksi/data_pengembalian"><i class="fa fa-circle-o"></i> Data Pengembalian</a></li>
          </ul>
        </li>
        <li class="<?php echo $this->uri->segment(1) == 'laporan' ? 'active' : null ?>"><a href="<?=base_url();?>laporan"><i class="fa fa-envelope"></i> <span>Laporan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->