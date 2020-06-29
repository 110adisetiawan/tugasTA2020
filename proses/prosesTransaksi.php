<?php
require '../register/controllerTransaksi.php';

class prosesTransaksi
{
	private $action;
	

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{
		$objmodel=new modelTransaksi();
		if($this->action=="tambah")
		{
			//echo "ini menu tambah";
			$idTrx=$_POST['idtrx'];
			$idOp=$_POST['idOp'];
			$idPompa=$_POST['idPompa'];
			$tgl=$_POST['tgl'];
			$liter=$_POST['liter'];
			$bayar=$_POST['bayar'];
			$plat=$_POST['plat'];
			 echo $idOp;
			 echo $idPompa;
			$objmodel->insert($idTrx,$idOp,$idPompa,$tgl,$liter,$bayar,$plat);
			header("location:../operator/viewTransaksiOP.php");
		}
		else if($this->action=="hapus")
		{
			$id=$_GET['id'];
			$objmodel->delete($id);
			header("location:../operator/viewTransaksiOP.php");

		}

	}
}

$objproses=new prosesTransaksi($_GET['aksi']);
$objproses->proses();
?>