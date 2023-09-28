<?php

// Подключение к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'airflightsdatabase');

// Проверка подключения
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Получение данных из формы
$city = $_POST["city"];
$price = $_POST["price"];

// Генерация имени файла изображения
$imageName = $_FILES["image"]["name"];
$imageTmpName = $_FILES["image"]["tmp_name"];
$imageType = $_FILES["image"]["type"];
$imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
$allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

if (in_array($imageExt, $allowedTypes)) {
  // Сохранение файла на сервере
  $imagePath = 'uploads/'.$imageName;
  move_uploaded_file($imageTmpName, $imagePath);

  // Сохранение данных в базе данных
  $sql = "INSERT INTO products (departure_city, price, image) VALUES ('$city', '$price', '$imagePath')";
  if (mysqli_query($conn, $sql)) {

    header("Location: ../index.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
} else {
  echo "Invalid file type";
}

// Закрытие подключения к базе данных
mysqli_close($conn);

?>