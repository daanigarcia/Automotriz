<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets/img/logo.png',10,8,28); 
	
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
	$this->Cell(60,10,'Reporte Cobranzas',0,0,'C');
	$this->Cell(20,20,'',0,0,'C');
	$this->Cell(190,30,date('d/m/Y'),0,1,'L');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(9,10,'Id', 1,0,'C',0);
	$this->Cell(47,10,'Fecha de pago',1,0,'C',0);
	$this->Cell(45,10,'Tipo de pago', 1,0,'C',0);
	$this->Cell(27,10,'Id orden', 1,0,'C',0);
	$this->Cell(17,10,'Total', 1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'cn.php';
 $consulta = "SELECT * FROM cobranza";
 $resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
//$pdf->setpaper('a4','landscape');

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(9,10, $row['IdCobranza'], 1,0,'C',0);
	$pdf->Cell(47,10, $row['FechaPago'], 1,0,'C',0);
    $pdf->Cell(45,10,  utf8_decode($row['TipodePago']), 1,0,'C',0);
	$pdf->Cell(27,10, $row['IdOrden'], 1,0,'C',0);
	$pdf->Cell(17,10, $row['Total'], 1,1,'C',0);
}

$pdf->Output();
?>