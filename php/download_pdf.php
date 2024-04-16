<?php
require('../vendor/setasign/fpdf/fpdf.php');

// Создаем новый PDF документ
$pdf = new FPDF();
$pdf->AddPage('P', 'A4');

// Устанавливаем шрифт Helvetica размером 16 для заголовка
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Ticket Info', 0, 1, 'C'); // Центрируем текст

$pdf->Ln(10); // Добавляем отступ

// Устанавливаем шрифт Helvetica размером 12 для основного текста
$pdf->SetFont('Helvetica', '', 12);

// Выводим информацию о билете на английском языке
$pdf->Cell(0, 10, 'Route: Riga - Paris', 0, 1);
$pdf->Cell(0, 10, 'Departure Date: October 10, 2024', 0, 1);
$pdf->Cell(0, 10, 'Departure Time: 10:30', 0, 1);
$pdf->Cell(0, 10, 'Arrival Date: October 11, 2024', 0, 1);
$pdf->Cell(0, 10, 'Arrival Time: 12:30', 0, 1);
$pdf->Cell(0, 10, 'Seat: F31', 0, 1);
$pdf->Cell(0, 10, 'Price: $120', 0, 1);

// Получаем содержимое PDF в виде строки
$pdfContent = $pdf->Output('', 'S');

// Отправляем содержимое PDF как ответ на запрос

echo $pdfContent;
exit;
?>

