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
    $this->Cell(150,10,'Reporte de empleados',0,0,'C');
	$this->Cell(40,10,date('d/m/Y'),0,1,'L');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(9,10,'Id', 1,0,'C',0);
	$this->Cell(55,10, utf8_decode('Nombre'),1,0,'C',0);
	$this->Cell(34,10, utf8_decode('Fecha Nac'), 1,0,'C',0);
	$this->Cell(38,10, utf8_decode('Estado civil'), 1,0,'C',0);
	$this->Cell(43,10, utf8_decode('CURP'), 1,0,'C',0);
	$this->Cell(27,10,'Telefono', 1,0,'C',0);
	$this->Cell(53,10, utf8_decode('Correo'), 1,1,'C',0);
	$this->Cell(90,10, utf8_decode('Domicilio'), 1,0,'C',0);
	$this->Cell(20,10,'C.P.', 1,0,'C',0);
	$this->Cell(25,10,'Puesto', 1,0,'C',0);
	$this->Cell(25,10,'Sueldo', 1,0,'C',0);
	$this->Cell(25,10,'Activo', 1,1,'C',0);
	
	$this->Cell(25,10,'', 0,1,'C',0);
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
 $consulta = "SELECT * FROM empleado";
 $resultado = $mysqli->query($consulta);

$pdf = new PDF('L', 'mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
//$pdf->setpaper('a4','landscape');

while($row = $resultado->fetch_assoc()){
	$pdf->Cell(9,10, $row['IdEmpleado'], 1,0,'C',0);
    $pdf->Cell(55,10, utf8_decode($row['Nombre']), 1,0,'C',0);
	$pdf->Cell(34,10, utf8_decode($row['Fecha_Nacimiento']), 1,0,'C',0);
    $pdf->Cell(38,10, utf8_decode($row['Estado_Civil']), 1,0,'C',0);
    $pdf->Cell(43,10, utf8_decode($row['CURP']), 1,0,'C',0);
	$pdf->Cell(27,10, $row['Telefono_1'], 1,0,'C',0);
	$pdf->Cell(53,10, utf8_decode($row['Correo']), 1,1,'C',0);
	$pdf->Cell(90,10, utf8_decode($row['Domicilio']), 1,0,'C',0);
	$pdf->Cell(20,10, utf8_decode($row['Codigo_Postal']), 1,0,'C',0);
	$pdf->Cell(25,10, utf8_decode($row['Puesto']), 1,0,'C',0);
	$pdf->Cell(25,10, utf8_decode($row['Sueldo']), 1,0,'C',0);
	$pdf->Cell(25,10, utf8_decode($row['Activo']), 1,1,'C',0);
	
	$pdf->Cell(25,10,'', 0,1,'C',0);
	
}

$pdf->Output();
?>