<?php
require '../register/controllerSettingPompa.php';

class prosesPompa
{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{
		$objmodel=new modelPompa();
		if($this->action=="tambah")
		{
			//echo "ini menu tambah";
			$idPompa=$_POST['idPompa'];
			$kdProduk=$_POST['kodeProduk'];
			$noPompa=$_POST['nomorPompa'];
			$kpstPompa=$_POST['kapasitasPompa'];
			 //echo $idPompa;
			 //echo $kdProduk;
			 //echo $noPompa;
			 //echo $kpstPompa;
			$objmodel->insert($idPompa,$kdProduk,$noPompa,$kpstPompa);
			header("location:../view/viewPompa.php");
		}
		else if($this->action=="hapus")
		{
			$id=$_GET['id'];
			$objmodel->delete($id);
			header("location:../view/viewPompa.php");

		}

		else if($this->action=="edit")
		{
			$idPompa=$_POST['idPompa'];
			$noPompa=$_POST['nomorPompa'];
			$kpstPompa=$_POST['kapasitasPompa'];
			$objmodel->update($idPompa,$noPompa,$kpstPompa);
			header("location:../view/viewPompa.php");
		}

	}
}

$objproses=new prosesPompa($_GET['aksi']);
$objproses->proses();
?>