<?php
// memanggil library FPDF
require_once('libs/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF

$awal = $_POST['tglawal'];
$akhir = $_POST['tglakhir'];

$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SETTLEMENT TRANSAKSI BBM',0,1,'C');
$pdf->SetFont('Arial','B',12);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'TANGGAL',1,0);
$pdf->Cell(40,6,'NAMA OPERATOR',1,0);
$pdf->Cell(35,6,'PRODUK BBM',1,0);
$pdf->Cell(35,6,'TOTAL LITER',1,0);
$pdf->Cell(35,6,'TOTAL BAYAR',1,0);
$pdf->Cell(30,6,'PLAT NOMOR',1,1);

$pdf->SetFont('Arial','',10);

require '../register/controllerTransaksi.php';

$modelTx=new modelTransaksi();
$modelTx -> settlement($awal,$akhir);
$dataTx = $modelTx->getSettlement();
foreach ($dataTx as $key) 
                    {
    $pdf->Cell(20,6,$key['WAKTU'],1,0);
	$pdf->Cell(40,6,$key['NAMA_OPERATOR_06937'],1,0);
	$pdf->Cell(35,6,$key['NAMA_PRODUK'],1,0);
	$pdf->Cell(35,6,$key['TOTAL_LITER'],1,0);
	$pdf->Cell(35,6,$key['TOTAL_BAYAR'],1,0);
	$pdf->Cell(30,6,$key['NO_PLAT'],1,1); 
}

$pdf->Output();
	

?>