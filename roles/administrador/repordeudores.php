<?php
session_start();
$usuario= $_SESSION['usuario'];
if ($usuario==""){
	header('Location: ..\..\index.php');
}else{
require('PDF/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('images/marcadeagua.jpg',10,10);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, ''.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(50, 8, '', 0);
$pdf->Cell(90,8,utf8_decode('Reporte de los Cobros a Realizar'),1,1,'C'); 
$pdf->SetFont('Arial', 'B',12);
$pdf->Ln(7);
$pdf->Cell(60, 2, '', 0);
$pdf->Cell(70,10,utf8_decode('Datos de los Usuarios que Deben'),1,1,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(1, 2, '', 0);
$pdf->Cell(35, 20, 'ID Cliente','C');
$pdf->Cell(60, 20, 'Nombres y Apellidos', 0);
$pdf->Cell(30, 20, 'Tienda', 0);
$pdf->Cell(35, 20, 'Monto Deuda', 0);
$pdf->Cell(40, 20, 'Valor Pagado', 0);
$pdf->Ln(23);
include "conectar.php";
$SQL2= mysql_query("SELECT clientes.idcliente, clientes.nombrecliente, tiendas.nombretienda, deudas.valordeuda FROM clientes,tiendas,deudas WHERE tiendas.idtienda=clientes.idtienda and clientes.idcliente=deudas.idcliente and valordeuda>0",$conectar);
while($datoclientes = mysql_fetch_array($SQL2)){
	$pdf->SetFont('Arial');	
	$pdf->Cell(1, 2, '', 0);
	$pdf->Cell(35, 0, $datoclientes['idcliente'], 0);
	$pdf->Cell(58, 0, $datoclientes['nombrecliente'], 0);
	$pdf->Cell(35, 0, $datoclientes['nombretienda'], 0);
	$pdf->Cell(40, 0, $datoclientes['valordeuda'], 0);
	$pdf->Ln(8);
}

$pdf->Output();
}
?>