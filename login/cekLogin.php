<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
require '../register/controllerRegisterOP.php';
$modelOP=new modelOP();
$modelOP -> select();
$dataLogin = $modelOP->getData();
$id = $_POST['ID'];


foreach ($dataLogin as $key){

	
	// cek jika user login sebagai admin
	if($key['ID_OPERATOR']=="$id"){
		if($key['LEVEL_USER']=="admin"){
		// buat session login dan username
			$_SESSION['ID'] = $id;
			$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
			header("location:../index.php");
		}

		else if($key['LEVEL_USER']=="operator"){
		// buat session login dan username
			$_SESSION['ID'] = $id;
			$_SESSION['nama'] = $key['NAMA_OPERATOR_06937'];
			$_SESSION['level'] = "operator";
			//echo $_SESSION['nama'];
		// alihkan ke halaman dashboard pegawai
			header("location:../operator/index.php");

	// cek jika user login sebagai pengurus
		}

	// cek jika user login sebagai pegawai
	}


}
if($_SESSION['level']==""){
		// buat session login dan username
		header("location:redirectLogin.php");
}
?>