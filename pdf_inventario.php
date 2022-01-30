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
    $this->Cell(150,10,'Reporte del inventario',0,0,'C');
	$this->Cell(40,10,date('d/m/Y'),0,1,'L');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(9,10,'Id', 1,0,'C',0);
	$this->Cell(64,10, utf8_decode('Artículo'),1,0,'C',0);
	$this->Cell(65,10, utf8_decode('Descripción'), 1,0,'C',0);
	$this->Cell(28,10, utf8_decode('Marca'), 1,0,'C',0);
	$this->Cell(30,10,'Proveedor', 1,0,'C',0);
	$this->Cell(22,10,'Costo', 1,0,'C',0);
	$this->Cell(35,10,'Precio lista', 1,0,'C',0);
	$this->Cell(30,10,'Cantidad', 1,1,'C',0);
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
 $consulta = "SELECT * FROM inventario";
 $resultado = $mysqli->query($consulta);

$pdf = new PDF('L', 'mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
//$pdf->setpaper('a4','landscape');

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(9,10, $row['IdInventario'], 1,0,'C',0);
    $pdf->Cell(64,10, utf8_decode($row['Articulo']), 1,0,'C',0);
	$pdf->Cell(65,10, utf8_decode($row['Descripcion']), 1,0,'C',0);
    $pdf->Cell(28,10, utf8_decode($row['Marca']), 1,0,'C',0);
    $pdf->Cell(30,10, utf8_decode($row['IdProovedor']), 1,0,'C',0);
	$pdf->Cell(22,10, $row['Costo'], 1,0,'C',0);
	$pdf->Cell(35,10, utf8_decode($row['Precio']), 1,0,'C',0);
	$pdf->Cell(30,10, utf8_decode($row['Cantidad']), 1,1,'C',0);
}

$pdf->Output();
?>