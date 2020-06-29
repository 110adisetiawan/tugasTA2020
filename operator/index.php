

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
</head>
<body>
<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location: ../login/index.php");
} else if ($_SESSION['level']!="operator") {
  header("location: ../login/redirectAdmin.php");
}

?>

	<div class="middle">
		<h1>HI <?php echo $_SESSION['nama']?></h1>
		<a class="btn" href="../register/tambahTransaksi.php">
			<i class="fas fa-gas-pump"></i>
		</a>
		<a class="btn" href="viewTransaksiOP.php">
			<i class="fas fa-file-invoice-dollar"></i>
		</a>
		<a class="btn" href="../login/logout.php">
			<i class="fas fa-sign-out-alt" href="../login/logout.php"></i>
		</a>
	</div>
</body>
</html>