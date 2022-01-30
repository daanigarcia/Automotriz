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
    $this->Cell(150,10,'Reporte Ordenes',0,0,'C');
	$this->Cell(40,10,date('d/m/Y'),0,1,'L');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(9,10,'Id', 1,0,'C',0);
	$this->Cell(47,10,'Observaciones',1,0,'C',0);
	$this->Cell(37,10,'Id Vehiculo', 1,0,'C',0);
	$this->Cell(39,10,'Id Empleado', 1,0,'C',0);
	$this->Cell(36,10,'Id Trabajo', 1,0,'C',0);
	$this->Cell(51,10,'Fecha propuesta', 1,0,'C',0);
	$this->Cell(48,10,'Fecha entrega', 1,0,'C',0);
	$this->Cell(15,10,utf8_decode('Total'), 1,1,'C',0);
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
 $consulta = "SELECT * FROM orden";
 $resultado = $mysqli->query($consulta);

$pdf = new PDF('L', 'mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
//$pdf->setpaper('a4','landscape');

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(9,10, $row['IdOrden'], 1,0,'C',0);
	$pdf->Cell(47,10, utf8_decode($row['Observaciones']), 1,0,'C',0);
    $pdf->Cell(37,10, utf8_decode($row['IdClienteVehiculo']), 1,0,'C',0);
	$pdf->Cell(39,10, $row['IdEmpleado'], 1,0,'C',0);
	$pdf->Cell(36,10, $row['IdTipoTrabajo'], 1,0,'C',0);
	$pdf->Cell(51,10, $row['Fechapropuesta'], 1,0,'C',0);
	$pdf->Cell(48,10, $row['FechaEntrega'], 1,0,'C',0);
	$pdf->Cell(15,10, $row['Total'], 1,1,'C',0);
}

$pdf->Output();
?>