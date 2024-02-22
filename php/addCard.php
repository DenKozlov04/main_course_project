<?php
session_start();

$city = $_POST['city'];
$price = $_POST['price'];
$arrival_city = $_POST['arrival_city'];
// проверка на то загружен ли файлд
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = file_get_contents($_FILES['image']['tmp_name']);

    // весит ли 2 МB
    $maxFileSize = 2 * 1024 * 1024; // 2 МB в байты 
    if (strlen($image) <= $maxFileSize) {
        include 'dbconfig.php';

        if ($mysqli->connect_error) {
            die("Connect ERROR: " . $mysqli->connect_error);
        }

        
        $stmt = $mysqli->prepare("INSERT INTO countrycards (city, arrival_city, price, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $city, $arrival_city, $price, $image);

        if ($stmt->execute()) {
            echo "Record successfully added to the table.";
            header("Location: ../php/adminPage.php");

            exit; 
        } else {
            echo "ERROR: " . $stmt->error;
        }

        $mysqli->close();
    } else {
        echo "Error: File size exceeds the allowed limit (2 MB)";
    }
} else {
    die("Error: The image was not uploaded");
}
?>

