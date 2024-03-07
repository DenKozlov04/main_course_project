<?php
session_start();
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['price']) && isset($_POST['id'])) {
    $price = $_POST['price'];
    $id = $_POST['id'];
    // echo $id;
    // echo $price;

    // echo $id;
    // $result1 = 25 /
    $price = preg_replace('/[^0-9.]/', '', $price); //убираю символ для вычислений
    $price = floatval($price);
    ///бронзовая карточка
    $result = (25 * $price) / 100;
    $result1 = number_format($result + $price, 2);//вывод с десятичным значением
    // echo $result1;

    ///серебрянная карточка
    $result = (45 * $price) / 100;
    $result2 = number_format($result + $price, 2);

    // echo $result2;

    ///золотая карточка
    $result = (65 * $price) / 100;
    $result3 = number_format($result + $price, 2);
    
    // echo $result3;

    ////Вывод данных


    $sql = "SELECT `Airline`, `airport_name`, `ITADA`, `City`, `country`, `T_price`, `arrival_date`, `departure_date`, `arrival_time`, `departure_time`,`id` 
    FROM `airports/airlines` 
    WHERE  `id` = ?";

    $stmt = $conn->prepare($sql);


    if ($stmt) {

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    while ($row = $result->fetch_assoc()) {
            $airport_name = $row['airport_name'];
            $ITADA = $row['ITADA'];
            $City = $row['City'];
            $country = $row['country'];
            $T_price = $row['T_price'];
            $arrival_date = $row['arrival_date'];
            $departure_date = $row['departure_date'];
            $dateObject = new DateTime($departure_date);
            $formattedDepartDate = $dateObject->format('j M');
            $arrival_time = date('H:i', strtotime($row['arrival_time']));
            $departure_time = date('H:i', strtotime($row['departure_time']));
    }
}
?>