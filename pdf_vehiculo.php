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
    $this->Cell(150,10,'Reporte Vehiculos',0,0,'C');
	$this->Cell(40,10,date('d/m/Y'),0,1,'L');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(9,10,'Id', 1,0,'C',0);
	$this->Cell(45,10, utf8_decode('Descripción'), 1,0,'C',0);
	$this->Cell(25,10,'Modelo', 1,0,'C',0);
	$this->Cell(25,10,'Placa', 1,0,'C',0);
	$this->Cell(25,10,'Marca', 1,0,'C',0);
	$this->Cell(25,10,'Color', 1,0,'C',0);
	$this->Cell(15,10,utf8_decode('Año'), 1,0,'C',0);
	$this->Cell(18,10,'Km', 1,0,'C',0);
	$this->Cell(45,10,'Combustible', 1,0,'C',0);
	$this->Cell(35,10,'IdCliente', 1,1,'C',0);
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
 $consulta = "SELECT * FROM vehiculo";
 $resultado = $mysqli->query($consulta);

$pdf = new PDF('L', 'mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(9,10, $row['IdClienteVehiculo'], 1,0,'C',0);
	$pdf->Cell(45,10, utf8_decode($row['DescripcionVehiculo']), 1,0,'C',0);
    $pdf->Cell(25,10, utf8_decode($row['Modelo']), 1,0,'C',0);
	$pdf->Cell(25,10,  utf8_decode($row['Placa']), 1,0,'C',0);
	$pdf->Cell(25,10,  utf8_decode($row['Marca']), 1,0,'C',0);
	$pdf->Cell(25,10,  utf8_decode($row['Color']), 1,0,'C',0);
	$pdf->Cell(15,10, $row['Allo'], 1,0,'C',0);
	$pdf->Cell(18,10, $row['KiloMetros'], 1,0,'C',0);
	$pdf->Cell(45,10,  utf8_decode($row['Combustible']), 1,0,'C',0);
	$pdf->Cell(35,10, $row['IdCliente'], 1,1,'C',0);
}

$pdf->Output();
?>