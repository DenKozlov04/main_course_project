<?php

    require('../vendor/setasign/fpdf/fpdf.php');
    require('../vendor/tecnickcom/tcpdf/tcpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage('P', 'A4');

    $pdf->SetFont('Helvetica', 'B', 25);
    $pdf->SetXY(10, 10);
    $pdf->Cell(0, 10, 'BOARDING PASS', 0, 1, 'L');

    $pdf->Ln(5);

    $pdf->SetFont('Helvetica', 'B', 40);
    $pdf->SetXY(150, 10);
    $pdf->Cell(0, 10, 'AVIA', 0, 1, 'R');

    $pdf->SetFont('Helvetica', 'B', 14);
    $currentY = $pdf->GetY();
    $pdf->SetY($currentY + 10);
    $pdf->Cell(0, 8, 'TICKET CODE: 53532625', 0, 1);

    $pdf->SetFont('Helvetica', '', 14);
    $pdf->Ln(3);
    $pdf->Cell(0, 8, 'FLIGHT DATA', 0, 1);

    $lineY = $pdf->GetY();
    $pdf->SetLineWidth(0.5);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Line(10, $lineY + 2, 200, $lineY + 2);

    $pdf->Ln(10);

    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(45, 8, 'Passenger Name:', 0);
    $pdf->Cell(45, 8, 'Passport Number:', 0);
    $pdf->Cell(45, 8, 'Seats:', 0);
    $pdf->Cell(45, 8, 'Class:', 0, 1);

    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(45, 8, 'John Doe', 0);
    $pdf->Cell(45, 8, 'ABC123456', 0);
    $pdf->Cell(45, 8, 'A12', 0);
    $pdf->Cell(45, 8, 'Silver', 0, 1);

    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(45, 8, 'Children Name:', 0);
    $pdf->Cell(45, 8, 'Passport Number:', 0);
    $pdf->Cell(45, 8, 'Seats:', 0, 1);

    $pdf->SetFont('Helvetica', '', 12);
    $pdf->Cell(45, 8, 'None', 0);
    $pdf->Cell(45, 8, 'None', 0);
    $pdf->Cell(45, 8, 'None', 0, 1);

    $infoY = $pdf->GetY();

    $pdf->Cell(0, 15, 'ROUTE INFORMATION', 0, 1);

    $infoY = $pdf->GetY();
    $infoY += 1;

    $pdf->Line(10, $infoY, 200, $infoY);

    $pdf->SetFont('Helvetica', 'B', 14);
    $pdf->SetXY(10, $infoY + 2);

    $pdfContent = $pdf->Output('', 'S');

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="ticket.pdf"');
    echo $pdfContent;
    exit;


?>