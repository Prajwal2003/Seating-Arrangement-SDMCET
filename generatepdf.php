<?php
echo"fefr";
include "conn.php";
session_start();
echo"fefr";
require('/Applications/XAMPP/xamppfiles/htdocs/take2/need/fpdf186/fpdf.php');
echo"fefr";
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B','20');

$pdf->Cell(71,10,'',0,0);
$pdf->Cell(59,5,'Seat Alloment',0,0);
$pdf->Cell(59,10,'',0,1);

$pdf->Output();

?>