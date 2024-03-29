<?php
require '../register/controllerTransaksi.php';
$modelTrx= new modelTransaksi();
$modelTrx -> select();
$modelTrx -> setTrxbaru();

session_start();

if($_SESSION['level']==""){
  header("location: ../login/index.php");
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
      <p class="login-box-msg">EXPORT DATA KE PDF</p>

      <form action="settlement.php?aksi=tambah" method="post">
        <label>Date Awal:</label>

        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="datepicker" name="tglawal" >
        </div>
        <label>Date Akhir:</label>

        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right" id="datepicker2" name="tglakhir" >
        </div>

        <label></label>
        <div class="row">
          
          <!-- /.col -->

          <div class="col-xs-4">
            <button type="Submit" class="btn btn-success">
              Submit</button>
            </div>
            <!-- /.col -->
          </div>

          
        </div>
        <!-- /.form-box -->
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
            $('#datepicker2').datepicker({
              autoclose: true
            })

          });

        </script>
      </body>
      </html>
