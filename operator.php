<html>
<head>
	<title>Halaman admin - www.malasngoding.com</title>
</head>
<body>
	<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login/index.php?pesan=gagal");
	}
 
	?>
	<h1>Halaman Operator</h1>
 
	<p>Halo ID : <b><?php echo $_SESSION['ID']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="login/logout.php">LOGOUT</a>
 
	<br/>
	<br/>
 
	
</body>
</html>