<?php
session_start();

// Устанавливаем значение 'user_id' в сессии равным 0
$_SESSION['user_id'] = 0;

// Перенаправляем пользователя на index.php
header("Location: index.php");
exit;
?>