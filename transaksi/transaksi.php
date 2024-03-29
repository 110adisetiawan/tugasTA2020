<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem SPBU | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SPBU</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistem</b>SPBU</span>
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


    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include ("sidebarTransaksi.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Database
        <small>Transaksi SPBU</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <div class="box-footer">
                <form action="../transaksi/cetakpdf.php">
                  <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i> Export data Ke PDF
                  </button>
                </form>
                </div>
                <thead>
                <tr>
                  <th>ID TRANSAKSI</th>
                  <th>ID Operator</th>
                  <th>NAMA Operator</th>
                  <th>NOMOR SELANG</th>
                  <th>Jenis BBM</th>
                  <th>TGL TRANSAKSI</th>
                  <th>Total Liter</th>
                  <th>Total Bayar</th>
                  <th>Plat Nomor</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    require '../register/controllerTransaksi.php';

                    $modelTx=new modelTransaksi();
                    $modelTx -> select();
                    $dataTx = $modelTx->getData();
                    foreach ($dataTx as $key) 
                    {
                      ?>
                      <tr>
                        <td><?php echo $key['ID_TRX']?></td>
                        <td><?php echo $key['ID_OPERATOR']?></td>
                        <td><?php echo $key['NAMA_OPERATOR_06937']?></td>
                        <td><?php echo $key['NOMOR_POMPA']?></td>
                        <td><?php echo $key['NAMA_PRODUK']?></td>
                        <td><?php echo $key['WAKTU']?></td>
                        <td><?php echo $key['TOTAL_LITER']?></td>
                        <td><?php echo $key['TOTAL_BAYAR']?></td>
                        <td><?php echo $key['NO_PLAT']?></td>
                        <td>
                          <a class="btn btn-social-icon" title="view"><i class="fa fa-play" data-toggle="modal" href="#mymodal<?php echo $key['ID_TRX'] ?>" ></i></a>
                          <a class="btn btn-social-icon" title="hapus" href="../proses/prosesTransaksi.php?aksi=hapus&id=<?php echo $key['ID_TRX'] ?>"><i class="fa fa-bitbucket"></i></a>
                          <a class="btn btn-social-icon" title="cetak" href="../transaksi/cetak.php?aksi=cetak&id=<?php echo $key['ID_TRX'] ?>"><i class="fa fa-print"></i></a>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

      
 <?php
    foreach ($dataTx as $key) 
    {
      ?>
      <div class="modal fade" id="mymodal<?php echo $key['ID_TRX'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="centre">TRANSAKSI</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
                
                  <div class="box-body">
                   <div class="form-group">
                  <label for="text">ID TRANSAKSI</label>
                  <input type="input" disabled="false" class="form-control" name="idOP"  value="<?php echo $key['ID_OPERATOR']?>" >
                  <label for="text">Nama OPERATOR</label>
                  <input type="input" disabled="false" class="form-control" name="namaOP"  value="<?php echo $key['NAMA_OPERATOR_06937']?>">
                  <label for="text">Nomor Pompa</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['NOMOR_POMPA']?>">
                  <label for="text">Jenis BBM</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['NAMA_PRODUK']?>">
                  <label for="text">Tanggal Transaksi</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['WAKTU']?>">
                  <label for="text">Total Liter</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['TOTAL_LITER']?>">
                  <label for="text">Total Bayar</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['TOTAL_BAYAR']?>">
                  <label for="text">Plat Nomor</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['NO_PLAT']?>">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-dismiss="modal" >CLOSE</button>
                </div>
                    <!-- /.box-body -->
                  </div>

                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </div>
        </div>
        <!-- /.modal -->
        <?php 
      }
      ?> 
        <!-- /.modal -->
<?php
    foreach ($dataTx as $key) 
    {
      ?>
      <div class="modal fade" id="printmodal<?php echo $key['ID_TRX'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="centre">CETAK NOTA</h4>
              </div>
              <div class="modal-body">
                <!-- form start -->
                
                  <div class="box-body">
                   <div class="form-group">
                  <label for="text">ID TRANSAKSI</label>
                  <input type="input" disabled="false" class="form-control" name="idOP"  value="<?php echo $key['ID_OPERATOR']?>" >
                  <label for="text">Nama OPERATOR</label>
                  <input type="input" disabled="false" class="form-control" name="namaOP"  value="<?php echo $key['NAMA_OPERATOR_06937']?>">
                  <label for="text">Nomor Pompa</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['NOMOR_POMPA']?>">
                  <label for="text">Jenis BBM</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['NAMA_PRODUK']?>">
                  <label for="text">Tanggal Transaksi</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['WAKTU']?>">
                  <label for="text">Total Liter</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['TOTAL_LITER']?>">
                  <label for="text">Total Bayar</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['TOTAL_BAYAR']?>">
                  <label for="text">Plat Nomor</label>
                  <input type="input" disabled="false" class="form-control" name="alamatOP"  value="<?php echo $key['NO_PLAT']?>">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-dismiss="modal" >CLOSE</button>
                </div>
                    <!-- /.box-body -->
                  </div>

                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
          </div>
        </div>
        <!-- /.modal -->
        <?php 
      }
      ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>



  



<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
      //Date picker
  $('#datepicker').datepicker({
     autoclose: true
   })
  })


</script>
</body>
</html>
