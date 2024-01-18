<?php
// config.php
// НАСТРОЙКА INI ФАЙЛОВ
return [
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_ssl' => 'tls',
    'smtp_username' => '********2@gmail.com',
    'smtp_password' => '**** **** **** ****',/// ПАРОЛЬ ПРИЛОЖЕНИЯ
    'from_email' => '********2@gmail.com',
];
/////тип переменные
// $txtData .= "MAKSASANAS VEIDS PAR STUDIJAM  " . $_POST["Itm_8_00_24"] . "\r\n";
// $htmData .= "<tr><td width="25%" bgcolor="#EEEEEE"><b>MAKSASANAS VEIDS PAR STUDIJAM:</b></td><td bgcolor="#EEEEEE">" . $_POST["Itm_8_00_24"] . "</td></tr>";
// $csvData .= $_POST["Itm_8_00_24"] . ";";

// // @header("Location: ../answer.php?ans_ok=ok");
// header("Location: ../answer.php?txtData=" . urlencode($txtData) . "&htmData=" . urlencode($htmData) . "&csvData=" . urlencode($csvData));

// $config = include 'config.php';

// $to = $_POST["Itm_8_00_8"];
// $subject = 'PIETEIKUMA ANKETA';
// $message =  print_r($txtData, true) . "\n";

// $headers = 'From: ' . $config['from_email'] . "\r\n" .
//     'Reply-To: ' . $config['from_email'] . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// // Отправка электронной почты
// $mailResult = mail($to, $subject, $message, $headers);

// // Проверка результата отправки
// if ($mailResult) {
//     echo 'Электронное письмо успешно отправлено.';
// } else {
//     echo 'Ошибка при отправке электронного письма.';
// }
/// работающая система почты