<?php
session_start();
$to = 'vikixim164@syinxun.com'; // адрес получателя
$subject = 'Успешная покупка'; // тема письма
$message = 'Уважаемый(ая) покупатель(ница), ваша покупка была успешно завершена. Спасибо за использование нашего сайта!'; // текст письма
$headers = 'From: vikixim@syinxun.com' . "\r\n" .
           'Reply-To: vikixim@syinxun.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers); // отправка письма

$mysqli -> close();
?>