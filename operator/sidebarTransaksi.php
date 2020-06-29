<?php session_start();  
?>
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../asset/dist/img/logo.png" class="img-square" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>Manage Data SPBU</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../operator/viewTransaksiOP.php"><i class="fa fa-shopping-cart"></i> DATA TRANSAKSI</a></li>
          </ul>
        </li>
        <li class="active treeview">
        <a href="#">
        <i class="fa fa-plus-circle"></i> <span>Tambah Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../register/tambahTransaksi.php"><i class="fa fa-user-plus"></i> Tambah Transaksi</a></li>
          </ul>
        </li>
        <li class="active treeview">
        <a href="#">
        <i class="fa fa-plus-circle"></i> <span>Akun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../login/logout.php"><i class="fa  fa-book"></i> LOGOUT</a></li>
          </ul>
        </li>
        
    </section>
    <!-- /.sidebar -->