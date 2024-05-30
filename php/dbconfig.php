<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "airflightsdatabase";

$mysqli = new mysqli($servername, $dbusername, $dbpassword, $dbname);


if (!class_exists('DatabaseConfig')) {
    class DatabaseConfig {
        public static $servername = "localhost";
        public static $dbusername = "root";
        public static $dbpassword = "";
        public static $dbname = "airflightsdatabase";
    }
}

?>

