<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simven</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/skins/_all-skins.min.css">
  <!-- Datatable -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css"/>
  <script src="<?php echo base_url()?>assets/js/jquery-2.2.3.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
  <!-- timepicker -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.css"/>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css"/>
  <script src="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <!-- Date Picker -->
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Sistem Inventaris</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" data-toggle="tooltip" data-placement="buttom"role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="messages-menu">
            <a href="<?php echo base_url('Peminjaman'); ?>">
              <i class="glyphicon glyphicon-sort"></i>
            </a>
          </li>
          <li class="messages-menu">
            <a href="<?php echo base_url('Laporan'); ?>">
              <i class="glyphicon glyphicon-print"></i>
            </a>
          </li>
          <!-- <li class="messages-menu"> 
            <a href="#">
              <i class="glyphicon glyphicon-globe"></i>
            </a>
          </li>
          -->

          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="glyphicon glyphicon-globe"></i>
               <span class="label label-warning"><?php echo $data1->hitung; ?></span>
            </a>
              
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda memiliki <?php echo $data1->hitung; ?> pemberitahuan </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <?php foreach ($notif as $r) { ?>
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url('Pengembalian');?>">
                      <i class="glyphicon glyphicon-bullhorn"></i> <?php echo $r['nama']; ?> Tenggat Waktu <?php echo $r['lama_pinjam']; ?>
                    </a>
                  </li>
                </ul>
                <?php } ?>
              </li>
              <li class="footer"><a href="#">Lihat selengkapnya</a></li>
            </ul>
          </li>

          
          <!-- Messages: style can be found in dropdown.less-->
            <li><a href=<?php echo site_url('auth/logout'); ?>>Logout</a></li>
          <!-- User Account: style can be found in dropdown.less -->
        
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/administrator.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><h4><?php echo $this->session->userdata('username'); ?></h4></p>
        </div>
      </div>

      <!-- search form -->
      <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="glyphicon glyphicon-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-th-list"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Gedung'); ?>"><i class="fa fa-circle-o"></i>Data Gedung</a></li>
            <li><a href="<?php echo base_url('Pemasok'); ?>"><i class="fa fa-circle-o"></i>Data Pemasok</a></li>
            <li><a href="<?php echo base_url('Ruang'); ?>"><i class="fa fa-circle-o"></i>Data Ruang</a></li>
            <li><a href="<?php echo base_url('User'); ?>"><i class="fa fa-circle-o"></i>Data User</a></li>
            <li><a href="<?php echo base_url('Barang'); ?>"><i class="fa fa-circle-o"></i>Data Barang</a></li>
          </ul>
        </li>
      <li>
        <a href="<?php echo base_url('Pengadaan'); ?>">
          <i class="glyphicon glyphicon-th"></i> <span>Pengadaan Barang</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('Penempatan'); ?>">
          <i class="glyphicon glyphicon-bed"></i> <span>Penempatan Barang</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('Pengambilan'); ?>">
          <i class="glyphicon glyphicon-check"></i> <span>Data Pengambilan</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('Peminjaman'); ?>">
          <i class="glyphicon glyphicon-sort"></i> <span>Data Peminjaman</span>
        </a>
      </li>
      <li>
        <!-- <a href="<?php echo base_url('Pengembalian'); ?>"> -->
          <a href="#">
          <i class="glyphicon glyphicon-repeat"></i> <span>Data Pengembalian</span>
        </a>
      </li>
      <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-th-list"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('LapInventaris'); ?>"><i class="fa fa-circle-o"></i>Laporan Inventaris</a></li>
            <li><a href="<?php echo base_url('LapPemakaian'); ?>"><i class="fa fa-circle-o"></i>Laporan Pemakaian</a></li>
            <li><a href="<?php echo base_url('LapPeminjaman'); ?>"><i class="fa fa-circle-o"></i>Laporan Peminjaman</a></li>
          </ul>
        </li>
    </ul>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
    </section>
    <!-- /.sidebar -->
  </aside>