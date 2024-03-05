<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['price']) && isset($_POST['id'])) {
    $price = $_POST['price'];
    $id = $_POST['id'];
    echo $price;
    echo $id;
    // Теперь у вас есть $price и $id, которые были переданы с предыдущей страницы через AJAX запрос
}
?>
