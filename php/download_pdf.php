<?php
require('../vendor/setasign/fpdf/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage('P', 'A4'); 


$pdf->SetFont('Arial','B',16);


$pdf->Cell(0,10,'Ticket info:', 0, 1, 'C');
$pdf->Ln(10); 

$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,iconv('utf-8', 'windows-1257', 'Maršruts: Rīga - Parīze'), 0, 1);
$pdf->Cell(0,10,iconv('utf-8', 'windows-1257', 'Izlidošanas datums: 10. oktobris 2024'), 0, 1);
$pdf->Cell(0,10,iconv('utf-8', 'windows-1257', 'Izlidošanas laiks: 10:30'), 0, 1);
$pdf->Cell(0,10,iconv('utf-8', 'windows-1257', 'Ierašanās datums: 11. oktobris 2024'), 0, 1);
$pdf->Cell(0,10,iconv('utf-8', 'windows-1257', 'Ierašanās laiks: 12:30'), 0, 1);
$pdf->Cell(0,10,iconv('utf-8', 'windows-1257', 'Vieta: F31'), 0, 1);
$pdf->Cell(0,10,iconv('utf-8', 'windows-1257', 'Cena: 120$'), 0, 1);

$pdfContent = $pdf->Output('', 'S');


echo $pdfContent;
exit; 
?>



