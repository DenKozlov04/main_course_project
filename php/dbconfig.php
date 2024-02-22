<?php
// Глобальные переменные для подключения к базе данных
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "airflightsdatabase";

// Создаю соединение
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$mysqli = new mysqli($servername, $dbusername, $dbpassword, $dbname);
$mysql = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if (!class_exists('DatabaseConfig')) {
    class DatabaseConfig {
        public static $servername = "localhost";
        public static $dbusername = "root";
        public static $dbpassword = "";
        public static $dbname = "airflightsdatabase";
    }
}

$host = $servername;
$user = $dbusername;
$password = $dbpassword;
$database = $dbname;

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
// Проверяю соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

