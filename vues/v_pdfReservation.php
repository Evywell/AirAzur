<?php
function creerPDFReservation($reservation){
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . "fpdf" . DIRECTORY_SEPARATOR . "fpdf.php";

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(40, 30, "Informations concernant la reservation " . $reservation['numero']);
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Image("images/banner.jpg", 10, 40, 100, 50);
    $pdf->Ln(60);
    $pdf->Cell(40, 10, "Air ALLIANCE");
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, $reservation['nom'] . ' ' . $reservation['prenom']);
    $pdf->Ln();
    $pdf->Cell(40, 10, 'Nombre de places : ' . $reservation['nbplaces']);

    $pdf->Output();
}