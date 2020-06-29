<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem SPBU | Setting Pompa</title>
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
      <a href="../index.php"><b>Dashboard</b> SPBU</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Setting Pompa Dispenser</p>

      <form action="../proses/prosesPompa.php?aksi=tambah" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="ID POMPA" name="idPompa">
          <span class="glyphicon glyphicon-qrcode form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="NOMOR POMPA" name="nomorPompa">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group">
          <label>Kode Produk BBM</label>
          <?php
          require '../register/controllerRegisterBBM.php';
          $modelBBM= new modelBBM();
          $modelBBM -> select();
          $dataBBM = $modelBBM->getData();
          ?>
          <select class="form-control" name="kodeProduk">
            <?php
            foreach ($dataBBM as $key) 
            {
              ?>
              <option><?php echo $key['KODE_PRODUK']?></option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="KAPASITAS POMPA" name="kapasitasPompa">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-8">
            
            <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modal-success2">
            Cek Kode BBM</button>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-success">
            Submit</button>
          </div>
          <!-- /.col -->
        </div>



        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Sukses</h4>
                </div>
                <div class="modal-body">
                  <p>Setting Pompa Dispenser Berhasil&hellip;</p>
                </div>
                <div class="modal-footer">
                  <button type="Submit" class="btn btn-outline">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

        </form>
      </div>

      <div class="modal modal-success fade" id="modal-success2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" align="center">Tabel Data Produk BBM</h4>
              </div>
              <div class="modal-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga/liter</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($dataBBM as $key2) 
                    {
                      ?>
                      <tr>
                        <td><?php echo $key2['KODE_PRODUK']?></td>
                        <td><?php echo $key2['NAMA_PRODUK']?></td>
                        <td><?php echo $key2['HARGA']?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    
                  </tfoot>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal" >Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.form-box -->

        <!-- /.register-box -->

        <!-- jQuery 3 -->
        <script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../asset/plugins/iCheck/icheck.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
          });
        </script>
      </body>
      </html>
