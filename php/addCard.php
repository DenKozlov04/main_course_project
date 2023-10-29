<?php
session_start();

$city = $_POST['city'];
$price = $_POST['price'];
$arrival_city = $_POST['arrival_city'];
// Проверяем, что файл изображения был загружен
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = file_get_contents($_FILES['image']['tmp_name']);

    // Проверяем размер файла (не более 2 МБ)
    $maxFileSize = 2 * 1024 * 1024; // 2 МБ в байтах
    if (strlen($image) <= $maxFileSize) {
        $mysqli = new mysqli('localhost', 'root', '', 'airflightsdatabase');

        if ($mysqli->connect_error) {
            die("Ошибка подключения: " . $mysqli->connect_error);
        }

        // Используем параметры для безопасной вставки бинарных данных
        $stmt = $mysqli->prepare("INSERT INTO countrycards (city, arrival_city, price, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $city, $arrival_city, $price, $image);

        if ($stmt->execute()) {
            echo "Запись успешно добавлена в таблицу.";
            header("Location: ../php/adminPage.php");

            exit; 
        } else {
            echo "Ошибка: " . $stmt->error;
        }

        $mysqli->close();
    } else {
        echo "Ошибка: Размер файла превышает допустимый предел (2 МБ).";
    }
} else {
    die("Ошибка: изображение не было загружено.");
}
?>

