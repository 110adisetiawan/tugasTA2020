<?php
require '../register/controllerRegisterOP.php';

class prosesOP
{
	private $action;

	function __construct($act)
	{
		$this->action = $act;
	}

	function proses()
	{
		$objmodel=new modelOP();
		if($this->action=="tambah")
		{
			$id=$_POST['id'];
			$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
			$level=$_POST['level'];
			$objmodel->insert($id,$nama,$alamat,$level);
			header("location:../view/viewRegistrasiOP.php");
		}
		else if($this->action=="hapus")
		{
			$id=$_GET['id'];
			echo $id;
			$objmodel->delete($id);
			header("location:../view/viewRegistrasiOP.php");

		}

		else if($this->action=="edit")
		{
			$idOP=$_POST['idOP'];
			$nmOP=$_POST['namaOP'];
			$almtOP=$_POST['alamatOP'];
			$objmodel->update($idOP,$nmOP,$almtOP);
			header("location:../view/viewRegistrasiOP.php");
		}

	}
}

$objproses=new prosesOP($_GET['aksi']);
$objproses->proses();
?>