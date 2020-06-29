<?php
require '../register/controllerRegisterBBM.php';

class prosesBBM
{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{
		$objmodel=new modelBBM();
		if($this->action=="tambah")
		{
			$kode=$_POST['kode'];
			$nama=$_POST['nama'];
			$harga=$_POST['harga'];
			$objmodel->insert($kode,$nama,$harga);
			header("location:../view/viewProdukBBM.php");
		}
		else if($this->action=="hapus")
		{
			$kode=$_GET['kode'];
			echo $kode;
			$objmodel->delete($kode);
			header("location:../view/viewProdukBBM.php");

		}

		else if($this->action=="edit")
		{
			$kdBBM=$_POST['kodebbm'];
			$nmBBM=$_POST['namabbm'];
			$hrgBBM=$_POST['hargabbm'];
			$objmodel->update($kdBBM,$nmBBM,$hrgBBM);
			header("location:../view/viewProdukBBM.php");
		}

	}
}

$objproses=new prosesBBM($_GET['aksi']);
$objproses->proses();
?>