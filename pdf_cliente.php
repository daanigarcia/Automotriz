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
    $this->Cell(150,10,'Reporte Clientes',0,0,'C');
	$this->Cell(40,10,date('d/m/Y'),0,1,'L');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(9,10,'Id', 1,0,'C',0);
	$this->Cell(63,10,'Nombre', 1,0,'C',0);
	$this->Cell(95,10, utf8_decode('Dirección'), 1,0,'C',0);
	$this->Cell(30,10,'RFC', 1,0,'C',0);
	$this->Cell(30,10,'Celular', 1,0,'C',0);
	$this->Cell(55,10,'Correo', 1,1,'C',0);
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
 $consulta = "SELECT * FROM cliente";
 $resultado = $mysqli->query($consulta);

$pdf = new PDF('L', 'mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
//$pdf->setpaper('a4','landscape');

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(9,10, $row['IdCliente'], 1,0,'C',0);
	$pdf->Cell(63,10, utf8_decode($row['Nombre']), 1,0,'C',0);
    $pdf->Cell(95,10, utf8_decode($row['Direccion']), 1,0,'C',0);
	$pdf->Cell(30,10,  utf8_decode($row['RFC']), 1,0,'C',0);
	$pdf->Cell(30,10, $row['Celular'], 1,0,'C',0);
	$pdf->Cell(55,10,  utf8_decode($row['Correo']), 1,1,'C',0);
}

$pdf->Output();
?>