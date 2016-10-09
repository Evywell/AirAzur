<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . "fpdf" . DIRECTORY_SEPARATOR . "fpdf.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, "Test PDF");
$pdf->Image("../images/pdf.png", 10, 30, 25, 24);
$pdf->Ln();
$pdf->Cell(40, 10, "C'est du texte en dessous");

$pdf->Output();