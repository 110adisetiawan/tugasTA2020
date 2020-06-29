<?php
require '../register/controllerTransaksi.php';
$modelTrx= new modelTransaksi();
$modelTrx -> select();
$modelTrx -> setTrxbaru();

session_start();

if($_SESSION['level']==""){
  header("location: ../login/index.php");
} else if ($_SESSION['level']!="operator") {
  header("location: ../login/redirectAdmin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem SPBU | Tambah Transaksi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../asset/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../operator/index.php"><b>Dashboard</b> OPERATOR</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Tambah Transaksi</p>

      <form action="../proses/prosesTransaksi.php?aksi=tambah" method="post">
        <label>ID TRX</label>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="idtrx" value="<?php echo $modelTrx->getTrxBaru(); ?>">
          <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
        </div>
        <label>ID Operator</label>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" value="<?php echo $_SESSION['ID']; ?>" name="idOp">
          <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
        </div>
        <div class="form-group">
          <label>ID POMPA</label>
          <?php
          require '../register/controllerSettingPompa.php';
          $modelPompa= new modelPompa();
          $modelPompa -> select();
          $dataPompa = $modelPompa->getData();
          ?>
          <select class="form-control" name="idPompa">
            <?php
            foreach ($dataPompa as $key) 
            {
              ?>
              <option><?php echo $key['ID_POMPA']?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Date:</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="datepicker" name="tgl" >
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Total Liter" name="liter">
          <span class="glyphicon glyphicon-scale form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Total Bayar" name="bayar">
          <span class="glyphicon glyphicon-euro form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="No Plat" name="plat">
          <span class="glyphicon glyphicon-road form-control-feedback"></span>
        </div>
        <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                      Option one is this and that&mdash;be sure to include why it's great
                    </label>
                  </div>
        </div>
        
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-success">
              Submit
            </div>
            <!-- /.col -->
          </div>

          <div class="modal modal-success fade" id="modal-success">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Success Modal</h4>
                  </div>
                  <div class="modal-body">
                    <p>Akun <b>BERHASIL</b> Ditambahkan Ke Database&hellip;</p>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-outline">Oke</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>


          </form>
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.register-box -->

      <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline center">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <!-- jQuery 3 -->
        <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../asset/plugins/iCheck/icheck.min.js"></script>
        <script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
            //Date picker
            $('#datepicker').datepicker({
              autoclose: true
            })
          });
        </script>
      </body>
      </html>
